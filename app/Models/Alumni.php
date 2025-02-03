<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alumni extends Authenticatable
{
    use HasFactory;

    protected $table = 'tbl_alumni';
    protected $primaryKey = 'id_alumni';
    public $incrementing = true;

    protected $fillable = [

        'user_id',
        'nisn',
        'nik',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'tgl_lahir',
        'tempat_lahir',
        'alamat',
        'no_hp',
        'akun_fb',
        'akun_ig',
        'akun_tiktok',
        'status_login',
        'id_tahun_lulus',
        'id_konsentrasi_keahlian',
        'id_status_alumni', 
        'remember_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel tbl_status_alumni
    public function status()
    {
        return $this->belongsTo(StatusAlumni::class, 'id_status_alumni', 'id_status_alumni');
    }

    // Relasi ke tabel tbl_tahun_lulus
    public function tahunLulus()
    {
        return $this->belongsTo(TahunLulus::class, 'id_tahun_lulus', 'id_tahun_lulus');
    }

    // Relasi ke tabel tbl_konsentrasi_keahlian
    public function konsentrasiKeahlian()
    {
        return $this->belongsTo(KonsentrasiKeahlian::class, 'id_konsentrasi_keahlian', 'id_konsentrasi_keahlian');
    }

}
