<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diagnosa extends Model
{
    use HasFactory;
    protected $table = "diagnosa";
    protected $fillable = [
        'id_passien',
        'id_penyakit',
        'id_solusi',
        'bobot_user',
    ];
}
