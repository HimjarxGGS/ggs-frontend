<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendaftar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pendaftars';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'date_of_birth',
        'email',
        'asal_instansi',
        'no_telepon',
        'riwayat_penyakit',
        'registrant_picture',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
