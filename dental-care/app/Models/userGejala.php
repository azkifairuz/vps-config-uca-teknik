<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userGejala extends Model
{
    use HasFactory;
    protected $table = "user_gejala";
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'kode_gejala',
        'bobot_user',
    ];
}
