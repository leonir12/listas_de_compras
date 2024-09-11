<?php

namespace Database\Seeders;

use App\Models\Lista;
use Illuminate\Database\Seeder;

class ListasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lista::create([
            'titulo' => 'Lista de Outubro',
        ]);

        Lista::create([
            'titulo' => 'Lista de Novembro',
        ]);

        Lista::create([
            'titulo' => 'Lista de Dezembro',
        ]);
    }
}
