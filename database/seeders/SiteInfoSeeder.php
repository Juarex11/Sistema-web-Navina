<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class SiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_info')->insert([
            'localizacion' => 'Puerto Maldonado/Tambopata',
            'telefono' => '927987259',
            'correo' => 'navinatubelleza@gmail.com',
            'horario' => '9:00 - 18:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
