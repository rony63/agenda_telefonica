<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('enderecos')->insert([
            'logradouro' => "Rua 2",
            'numero' => "12",
            'cidade' => "São Cristovão",
            'contato_id' => 1,
        ]);

        DB::table('enderecos')->insert([
            'logradouro' => "Rua 1",
            'numero' => "123",
            'cidade' => "São Cristovão",
            'contato_id' => 2,
        ]);

        DB::table('enderecos')->insert([
            'logradouro' => "Rua 3",
            'numero' => "13",
            'cidade' => "São Cristovão",
            'contato_id' => 3,
        ]);

        DB::table('enderecos')->insert([
            'logradouro' => "Rua 4",
            'numero' => "14",
            'cidade' => "Glória",
            'contato_id' => 4,
        ]);


    }
}
