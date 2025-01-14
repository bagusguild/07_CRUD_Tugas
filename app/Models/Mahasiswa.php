<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; //Model Eloquent


class Mahasiswa extends Model
{
    protected $table = "mahasiswa"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
    public $timestamps = false;
    protected $primaryKey = 'Nim';
    protected $fillable = [
        'Nim',
        'Nama',
        'Email',
        'Kelas', 
        'Jurusan', 
        'No_Handphone',
        'TanggalLahir',
    ];

    public function kelas(){
        return $this->belongsTO(kelas::class);
    }
}