<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    public $timestamps = true;
    protected $fillable = [
        'nama',
        'email',
        'nilai_x',
        'nilai_y',
        'nilai_z',
        'nilai_w'
    ];

}
