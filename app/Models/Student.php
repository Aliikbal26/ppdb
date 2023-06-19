<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'nim', 'gender', 'email', 'jurusan', 'foto', 'status', 'no_pendaftaran'];

    public function email()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateNoPendaftaran()
    {
        $lastNo =  self::orderBy('id', 'desc')->first();
        //$lastNo = iteration;
        if ($lastNo) {
            $last = $lastNo->id;
            $nextId = $last + 1;
        } else {
            $nextId = 1;
        }

        $noPendaftaran = 'PDF-' . str_pad($nextId, 8, '0', STR_PAD_LEFT);
        return $noPendaftaran;
    }
    public static function generateNim()
    {
        $lastNo =  self::orderBy('id', 'desc')->first();
        //$lastNo = iteration;
        if ($lastNo) {
            $last = $lastNo->id;
            $nextId = $last + 1;
        } else {
            $nextId = 1;
        }

        $noPendaftaran = str_pad($nextId, 8, '41200000', STR_PAD_LEFT);
        return $noPendaftaran;
    }
}
