<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = "pasien";
    protected $fillable = [
        'nim_mahasiswa',
        'nama_mahasiswa',
        'fakultas',
    ];
}
