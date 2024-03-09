<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tamu')->insert([
            [
                'nama' => 'andri', 'gender' => 'Laki-laki', 'no_hp' => '084356545644', 'alamat' => 'Bangka Belitung',
            ],
            [
                'nama' => 'bila', 'gender' => 'Perempuan', 'no_hp' => '085567893456', 'alamat' => 'Jawa Timur',
            ]
        ]);
    }
}
