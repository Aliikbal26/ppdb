<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $student = Student::all();
        return view('student.index', [

            'mahasiswa' => $student
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('student.create', [
            'title' => 'tambah data'
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
        Student::create($data);

        return redirect('/student/create')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('student.show', [
            'student' => $student
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
    public function daftarMhs()
    {
        //
        $student = Student::all();

        return view('mahasiswa.show', [
            'title' => 'tambah data',
            'mahasiswa' => $student

        ]);
    }
    public function daftarShow()
    {
        //
        $student = Student::all();

        return view('mahasiswa.create', [
            'title' => 'tambah data',
            'mahasiswa' => $student

        ]);
    }
    public function daftarPost(Request $request)
    {
        //
        $status = 'pending';
        $data = ($request->all());
        $file = $request->file('foto')->getClientOriginalName();
        $path = $request->file('foto')->storeAs('foto/students', $file, 'public');
        $data['foto'] = $file;
        Student::create([
            'nama' => $request['nama'],
            'nim' => $request['nim'],
            'jurusan' => $request['jurusan'],
            'foto' => $data['foto'],
            'status' => $status
        ]);
        //Student::create($data);

        return redirect('/mahasiswa/create')->with('success', 'data berhasil ditambahkan');
    }
}
