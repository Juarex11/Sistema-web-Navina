<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first category (assuming it exists)
        $categoryId = DB::table('categories')->first()?->id ?? 1;

        $blogs = [
            [
                'title' => 'Aceite de Caléndula',
                'category_id' => $categoryId,
                'description' => 'El aceite de caléndula es un ingrediente estrella en la cosmética natural gracias a sus potentes propiedades calmantes, regeneradoras y antiinflamatorias. Se obtiene a partir de los pétalos de la flor Calendula officinalis, reconocida desde la antigüedad por sus efectos curativos sobre la piel. 

Este aceite es ideal para pieles sensibles, irritadas o con afecciones como dermatitis, eccema o quemaduras leves. Su uso regular ayuda a calmar enrojecimientos, acelerar la cicatrización y mejorar la elasticidad de la piel, dejándola suave, nutrida y protegida. 

Es un ingrediente muy valorado en jabones, cremas, ungüentos y productos para bebés, ya que no causa irritación y aporta alivio inmediato en zonas delicadas. Además, es rico en antioxidantes y flavonoides que ayudan a combatir los radicales libres.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Aceite de Coco',
                'category_id' => $categoryId,
                'description' => 'El aceite de coco es uno de los ingredientes más versátiles y apreciados en el mundo de la cosmética natural. Extraído de la pulpa del coco, este aceite vegetal es rico en ácidos grasos esenciales, antioxidantes y vitamina E, lo que lo convierte en un potente hidratante y protector para la piel y el cabello. 

Gracias a sus propiedades humectantes, el aceite de coco penetra profundamente en la piel, ayudando a suavizar, calmar y prevenir la resequedad. También posee acción antimicrobiana, lo que lo hace útil en pieles con tendencia al acné o irritaciones leves. 

En el cuidado capilar, fortalece el cabello desde la raíz, reduce el frizz, aporta brillo natural y ayuda a prevenir la rotura. Además, puede utilizarse como desmaquillante, bálsamo labial, aceite corporal, base para exfoliantes, entre muchos otros usos.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Aceite de Argán',
                'category_id' => $categoryId,
                'description' => 'El aceite de argán, conocido como el "oro líquido de Marruecos", es uno de los ingredientes más valorados en la cosmética natural por su extraordinario poder nutritivo, regenerador y antioxidante. Se extrae de las semillas del árbol de argán (Argania spinosa), y su riqueza en vitamina E, ácidos grasos esenciales y polifenoles lo convierte en un aliado perfecto para la belleza integral. 

Este aceite es ideal para hidratar la piel en profundidad sin dejar sensación grasosa. Ayuda a suavizar arrugas, mejorar la elasticidad, y devolver el brillo natural al rostro. Además, calma irritaciones, favorece la cicatrización y protege frente a agresiones externas como el sol o la contaminación. 

En el cabello, fortalece, da brillo, combate el frizz y previene las puntas abiertas. También es excelente para nutrir el cuero cabelludo y estimular el crecimiento capilar.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('blog')->insert($blogs);
    }
}
