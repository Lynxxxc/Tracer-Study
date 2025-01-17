<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerStudy extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan
    protected $table = 'tbl_tracer_kuliah'; // Pastikan tabel ini sudah ada di database
    protected $primaryKey = 'id_alumni';
    public $timestamps = false;

    // Tentukan kolom-kolom yang dapat diisi
    protected $fillable = [
        'nisn',
        'nik',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'no_hp',
        'email',
        'kampus',
        'status',
        'jenjang',
        'jurusan',
        'linier',
    ];

    // Jika ada hubungan dengan model lain (misalnya model Alumni), dapat didefinisikan di sini
    // public function alumni()
    // {
    //     return $this->belongsTo(Alumni::class, 'nisn', 'nisn');
    // }
}
