<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'nomor_surat',
        'jenis_surat',
        'tanggal_ajuan',
        'penduduk_id',
        'berkas_pendukung',
    ];

    protected $casts = [
        'tanggal_ajuan' => 'date',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
