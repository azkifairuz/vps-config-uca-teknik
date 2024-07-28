<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class pasien extends Model
{
    use HasFactory;
    protected $table = "pasien";

    protected $fillable = [
        'nama_pasien',
        'usia_pasien',
        'alamat_pasien',
    ];
}
