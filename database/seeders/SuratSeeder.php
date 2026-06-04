<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Surat;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Surat::create([
            'nomor_surat'   => 'SKD/001/VI/2026',
            'jenis_surat'   => 'Surat Keterangan Domisili',
            'tanggal_ajuan' => '2026-06-01',
            'penduduk_id'   => 1,
        ]);

        Surat::create([
            'nomor_surat'   => 'SKTM/002/VI/2026',
            'jenis_surat'   => 'Surat Keterangan Tidak Mampu',
            'tanggal_ajuan' => '2026-06-02',
            'penduduk_id'   => 2,
        ]);

        Surat::create([
            'nomor_surat'   => 'SKU/003/VI/2026',
            'jenis_surat'   => 'Surat Keterangan Usaha',
            'tanggal_ajuan' => '2026-06-03',
            'penduduk_id'   => 1,
        ]);
    }
}
