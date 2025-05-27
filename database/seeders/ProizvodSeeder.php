<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proizvod;

class ProizvodSeeder extends Seeder
{
    public function run(): void
    {
        Proizvod::create([
            'naziv' => 'Muška košulja',
            'opis' => 'Elegantna muška košulja dugih rukava.',
            'cena' => 3499.00,
            'slika' => 'kosulja.jpg',
            'featured' => true,
            'tip' => 'košulja',  // Dodali smo tip proizvoda
        ]);

        Proizvod::create([
            'naziv' => 'Ženske pantalone',
            'opis' => 'Moderni kroj, udobne i pogodne za svakodnevnu upotrebu.',
            'cena' => 4199.00,
            'slika' => 'pantalone.jpg',
            'featured' => true,
            'tip' => 'pantalone',  // Dodali smo tip proizvoda
        ]);

        Proizvod::create([
            'naziv' => 'Muški sako',
            'opis' => 'Klasičan sako pogodan za poslovne prilike.',
            'cena' => 7999.99,
            'slika' => 'sako.jpg',
            'featured' => true,
            'tip' => 'sako',  // Dodali smo tip proizvoda
        ]);

        Proizvod::create([
            'naziv' => 'Letnja haljina',
            'opis' => 'Lagana haljina idealna za tople dane.',
            'cena' => 5599.00,
            'slika' => 'haljina.jpg',
            'featured' => false,
            'tip' => 'haljina',  // Dodali smo tip proizvoda
        ]);

        Proizvod::create([
            'naziv' => 'Suknja sa faltama',
            'opis' => 'Moderan dizajn sa visokim strukom.',
            'cena' => 2999.00,
            'slika' => 'suknja.jpg',
            'featured' => false,
            'tip' => 'suknja',  // Dodali smo tip proizvoda
        ]);
    }
}
