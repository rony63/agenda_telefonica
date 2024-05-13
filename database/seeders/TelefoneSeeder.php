<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TelefoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('telefones')->insert([
            'numero' => "123456789",
            'contato_id' => 1,
            'tipo' => 0,
        ]);

        DB::table('telefones')->insert([
            'numero' => "123446789",
            'contato_id' => 2,
            'tipo' => 1,
        ]);

        DB::table('telefones')->insert([
            'numero' => "223456789",
            'contato_id' => 3,
            'tipo' => 0,
        ]);
    }
}
