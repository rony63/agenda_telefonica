<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias')->insert([
            'nome' => "Vizinho",
        ]);

        DB::table('categorias')->insert([
            'nome' => "Amigo",
        ]);

        DB::table('categorias')->insert([
            'nome' => "Parentes",
        ]);

        DB::table('categorias')->insert([
            'nome' => "Cônjuge",
        ]);
    }
}
