<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'tbl_sekolah';

    // Primary key column
    protected $primaryKey = 'id_sekolah';

    // Columns that are mass assignable
    protected $fillable = [
        'npsn',
        'nss',
        'nama_sekolah',
        'alamat',
        'no_telp',
        'website',
        'email',
    ];
}
