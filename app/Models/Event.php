<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events'; 

    protected $fillable = [
        'judul',
        'cover',
        'status',
        'penerbit',
        'tanggal',
        'deskripsi',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
