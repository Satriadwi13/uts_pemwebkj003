<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    // Jika nama tabel tidak standar (misalnya bukan "beasiswas"), tambahkan ini:
    // protected $table = 'nama_tabel';

    // Field yang bisa diisi secara massal
    protected $fillable = [
        'nama',
        'deskripsi',
        'jenis',
        'tanggal_mulai',
        'tanggal_selesai',
        'syarat',
        'manfaat',
        'link_pendaftaran',
    ];

    // Konversi otomatis kolom tanggal ke instance Carbon
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
}
