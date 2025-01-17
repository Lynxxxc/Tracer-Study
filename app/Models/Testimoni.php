<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'tbl_testimoni';
    protected $primaryKey = 'id_testimoni';

    protected $fillable = [
        'id_alumni',
        'testimoni',
        'tgl_testimoni',
    ];

    // Cast the tgl_testimoni to a Carbon instance
    protected $casts = [
        'tgl_testimoni' => 'datetime', // This will automatically cast it to a Carbon instance
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni');
    }

    // Example of formatting the date
    public function getFormattedDate()
    {
        return $this->tgl_testimoni->format('d-m-Y'); // Format as needed
    }
}
