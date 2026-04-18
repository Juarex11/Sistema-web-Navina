<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\AboutUs::create([
            'mision' => 'Nuestra misión es proporcionar productos de alta calidad que cuiden tu piel de forma natural, utilizando ingredientes orgánicos y sostenibles que respeten tanto tu belleza como el medio ambiente.',
            'vision' => 'Nuestra visión es convertirnos en la marca líder de productos naturales para el cuidado de la piel, reconocida por nuestra calidad, innovación y compromiso con la sostenibilidad.',
        ]);
    }
}
