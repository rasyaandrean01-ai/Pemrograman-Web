<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiTrainingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pegawai_training')->insert([
            [
                'pegawai_id' => 1,
                'status' => 'Selesai',
                'training_id' => 1,
            ],

            [
                'pegawai_id' => 2,
                'status' => 'Mengikuti',
                'training_id' => 2,
            ],

            [
                'pegawai_id' => 3,
                'status' => 'Terdaftar',
                'training_id' => 3,
            ]
        ]);
    }
}
