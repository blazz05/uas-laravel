<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuTamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku_tamu')->insert([
            [
                'tgl_bertamu' => '2024-02-04 00:03:19', 
                'tamu_id' => 1, 
                'jabatan_id' => 1, 
                'keperluan' => 'Bertamu', 
            ],
            [
                'tgl_bertamu' => '2023-11-14 00:04:08', 
                'tamu_id' => 2, 
                'jabatan_id' => 2, 
                'keperluan' => 'Jenguk Paman',
            ]
        ]);
    }
}
