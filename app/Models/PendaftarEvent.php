<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendaftarEvent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pendaftar_events';

    protected $fillable = [
        'approved_by',
        'event_id',
        'pendaftar_id',
        'status',
        'bukti_payment',
        'opsi_payment',
        'bukti_share',
        'kesediaan_hadir',
        'kesediaan_menaati_aturan',
    ];

    // Relasi ke Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Relasi ke Pendaftar
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    // Relasi ke User (yang approve)
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
