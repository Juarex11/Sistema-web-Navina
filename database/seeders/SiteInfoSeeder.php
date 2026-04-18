<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SiteInfo::create([
            'localizacion' => 'Calle Principal #123, Ciudad',
            'telefono' => '+1 234 567 890',
            'correo' => 'contacto@ejemplo.com',
            'horario' => 'Lunes a Viernes: 9:00 AM - 6:00 PM',
        ]);
    }
}
