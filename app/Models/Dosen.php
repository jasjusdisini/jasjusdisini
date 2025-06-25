<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = [
        'nip_dosen',
        'nama_dosen',
        'mata_kuliah',
        'alamat',
    ];

    protected $hidden = [];
}
