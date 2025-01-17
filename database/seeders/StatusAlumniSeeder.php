<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan baris ini

class StatusAlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_status_alumni')->insert([
            ['status' => 'Aktif'],
            ['status' => 'Lulus'],
            ['status' => 'Menganggur'],
        ]);
    }
}
