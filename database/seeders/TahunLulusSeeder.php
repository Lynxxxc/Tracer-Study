<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunLulusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Hapus data lama
        DB::table('tbl_tahun_lulus')->delete();

        // Tambahkan data baru
        DB::table('tbl_tahun_lulus')->insert([
            ['tahun_lulus' => 2020, 'keterangan' => 'Tahun Lulus Awal'],
            ['tahun_lulus' => 2021, 'keterangan' => 'Tahun Lulus Menengah'],
            ['tahun_lulus' => 2022, 'keterangan' => 'Tahun Lulus Terbaru'],
            ['tahun_lulus' => 2023, 'keterangan' => 'Tahun Lulus Mendatang'],
            ['tahun_lulus' => 2024, 'keterangan' => 'Tahun Lulus Mendatang'],
            ['tahun_lulus' => 2025, 'keterangan' => 'Tahun Lulus Mendatang'],
            ['tahun_lulus' => 2026, 'keterangan' => 'Tahun Lulus Mendatang'],
        ]);
    }
}
