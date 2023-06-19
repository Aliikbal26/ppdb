<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Barryvdh\DomPDF\PDF;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Student $student)
    {
        //
        $jumlah = Student::count();
        $jumlahL = Student::where('gender', 'Laki-Laki')->count();
        $jumlahP = Student::where('gender', 'Perempuan')->count();
        $student = Student::all();
        // dd($jumlahL);
        //exit;
        return view('student.dashboard', [
            'mahasiswa' => $student,
            'jumlahMhs' => $jumlah,
            'jumlahMhsLaki' => $jumlahL,
            'jumlahMhsPerempuan' => $jumlahP,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $student = Student::all();

        return view('student.create', [
            'title' => 'tambah data',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = ($request->all());
        $file = $request->file('foto')->getClientOriginalName();
        $path = $request->file('foto')->storeAs('foto/students', $file, 'public');
        $data['foto'] = $file;
        Student::create([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'jurusan' => $request['jurusan'],
            'foto' => $data
        ]);
        // Student::create($data);

        return redirect('/student/create')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::find($id);
        $mhs = Student::find($id);
        return view('student.show', [
            'student' => $student,
            'email' => $mhs->email,


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = Student::find($id);
        return view('student.edit', [
            'title' => "Edit",
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->nama = $request->nama;
            $student->nim = $request->nim;
            $student->gender = $request->gender;
            $student->jurusan = $request->jurusan;

            // Periksa apakah ada file foto yang diunggah
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                Storage::delete('public/foto/students' . $student->foto);

                // Upload foto baru
                $fileName = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->storeAs('public/foto/students', $fileName);

                // Simpan nama file foto ke dalam atribut 'foto' pada model siswa
                $student->foto = $fileName;
            }
            // Simpan perubahan ke dalam database
            $student->save();
            // dd($student);
            // exit;

            // Berikan respons sukses atau lakukan tindakan lain yang sesuai
            return redirect('student')->with('success', 'Mahasiswa berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::find($id);

        $student->delete();
        return redirect('/student')->with('success', 'Berhasil Di hapus');
    }


    //funtion tambahan mahasiswa

    public function updateStatus(Request $request, String $id)
    {
        $student = Student::find($id);
        $student->status = $request->status;

        $student->save();
        return redirect('/student');
        // dd($student);
        // exit;
    }
    public function mahasiswa()
    {
        //
        $student = Student::all();
        return view('mahasiswa.index', [
            'title' => 'tambah data',
            'mahasiswa' => $student
        ]);
    }
    public function AllMahasiswa()
    {
        //
        $student = Student::all();
        $mhs = Student::paginate(10);
        return view('student.index', [
            'title' => 'tambah data',
            'mahasiswa' => $student,
            'users' => $mhs
        ]);
    }


    //fiture download

    public function daftarMhsUser($email)
    {
        $students = Auth::user($email);
        $student = Student::where('email', $students->email)->first();
        $mhs = Student::where('email', $students->email)->first();

        // dd($students);
        // exit;

        return view('mahasiswa.mhsUser', [
            'title' => 'tambah data',
            'mahasiswa' => $student,
            'student' => $student,
            'mhs' => $mhs
        ]);

        // $student->delete();
        // return redirect('/student')->with('success', 'Berhasil Di hapus');
    }

    public function daftarMhs()
    {
        //
        $student = Student::all();
        $mhsPigination = Student::paginate(10);
        //$this->serchMhs($student);
        return view('mahasiswa.show', [
            'title' => 'tambah data',
            'mahasiswa' => $student,
            'users' => $mhsPigination
        ]);
    }

    public function daftarShow()
    {
        //
        $student = Student::all();
        return view('mahasiswa.create', [
            'title' => 'tambah data',
            'mahasiswa' => $student,

        ]);
    }
    public function daftarPost(Request $request)
    {
        //
        $nim = Student::generateNim();
        $status = 'pending';
        $data = ($request->all());
        $file = $request->file('foto')->getClientOriginalName();
        $path = $request->file('foto')->storeAs('foto/students', $file, 'public');
        $data['foto'] = $file;
        $no_pendaftaran = Student::generateNoPendaftaran();
        Student::create([
            'nama' => $request['nama'],
            'nim' => $nim,
            'no_pendaftaran' => $no_pendaftaran,
            'email' => $request['email'],
            'gender' => $request['gender'],
            'jurusan' => $request['jurusan'],
            'foto' => $data['foto'],
            'status' => $status
        ]);
        //Student::create($data);

        return redirect('/mahasiswa/create')->with('success', 'data berhasil ditambahkan');
    }

    public function downloadPDF($email)
    {
        $student = Student::where('email', $email)->first();

        if ($student) {
            // set_time_limit(120); // Atur waktu maksimum eksekusi menjadi 120 detik (2 menit)

            $pdf = app('dompdf.wrapper');
            $pdf->loadView('mahasiswa.pdf', compact('student'));
            return $pdf->download('mahasiswa.pdf');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }

    public function serchMhs(Request $request)
    {
        $query = $request->input('query');

        $results = User::where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->get();

        return view('mahasiswa.show', compact('results', 'query'));
    }
}
