<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Makul extends Model
{
    protected $table = 'makul';
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = [
        'kode_makul',
        'nama_makul',
        'sks',
        'semester',
        'dosen_pengampu',
    ];

    protected $hidden = [];
}
