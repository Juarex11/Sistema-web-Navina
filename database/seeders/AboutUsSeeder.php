<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_us')->insert([
            'mision' => 'En Navi Natubelleza, nos comprometemos a ofrecer productos de belleza y cuidado personal de alta calidad que respetan y realzan la belleza natural de cada persona. Nuestra misión es brindar soluciones innovadoras, accesibles y conscientes que promuevan el bienestar, fortalezcan la autoestima y acompañen a nuestros clientes en su camino hacia el empoderamiento y el amor propio.',
            'vision' => 'Aspiramos a ser la marca líder en el mercado peruano de productos de belleza y cuidado personal, reconocida por nuestra excelencia, innovación y compromiso con la satisfacción del cliente. Nos proyectamos como una empresa que inspira y transforma vidas a través de la belleza, estableciendo estándares de calidad y servicio que nos posicionen como referentes en la industria.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
