<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = [
        'nim_mhs',
        'nama_mhs',
        'jurusan',
        'alamat',
    ];

    protected $hidden = [];
}
