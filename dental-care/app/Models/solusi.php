<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solusi extends Model
{
    use HasFactory;
    protected $table = "solusi";
    protected $fillable = [
        'kode_solusi',
        'solusi'
    ];
}
