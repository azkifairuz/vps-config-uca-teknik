<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gejala extends Model
{
    use HasFactory;
    protected $table = "gejala";
    protected $fillable = [
        'kode_gejala',
        'nama_gejala',
        'bobot',
    ];
}
