<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penduduk;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penduduk::create([
            'nik'    => '3507123456780001',
            'nama'   => 'Budi Santoso',
            'jk'     => 'L',
            'alamat' => 'Jl. Merdeka No. 10, RT 01 RW 01',
        ]);

        Penduduk::create([
            'nik'    => '3507123456780002',
            'nama'   => 'Siti Khotimah',
            'jk'     => 'P',
            'alamat' => 'Jl. Mawar No. 05, RT 02 RW 01',
        ]);
    }
}
