<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAlumni extends Model
{
    use HasFactory;

    protected $table = 'tbl_status_alumni'; // Specify the table name
    protected $primaryKey = 'id_status_alumni'; // Primary key
    protected $fillable = ['status']; // Fields that can be mass-assigned
}
