<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsentrasiKeahlian extends Model
{
    use HasFactory;

    protected $table = 'tbl_konsentrasi_keahlian'; // Nama tabel konsentrasi keahlian di database
    protected $primaryKey = 'id_konsentrasi_keahlian'; // Primary key pada tabel ini
    protected $fillable = ['id_program_keahlian', 'kode_konsentrasi_keahlian', 'konsentrasi_keahlian'];

    public $timestamps = false; // jika tidak menggunakan timestamps

    // Relasi ke Alumni
    public function alumni()
    {
        return $this->hasMany(Alumni::class, 'id_konsentrasi_keahlian', 'id_konsentrasi_keahlian');
    }

    // Relasi ke Program Keahlian
    public function programKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_program_keahlian');
    }
}
