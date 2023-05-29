<?php

namespace Database\Seeders;
use App\Models\Nilai;
use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nilai::insert([
            'nama' => 'aldi',
            'email' => 'adityaldi16@gmail.com',
            'nilai_x' => 15,
            'nilai_y' => 12,
            'nilai_z' => 6,
            'nilai_w' => 4,
        ]);
    }
}
