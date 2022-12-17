<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteContato::factory()->count(100)->create();
        /*
        SiteContato::create([
            'nome'=> 'Sistema SG',
            'telefone'=> '(11) 99999-8888',
            'email'=> 'contato@dg.com.br',
            'motivo_contato'=> 1,
            'mensagem'=> 'Seja bem vindo ao Sistema Super Gestão'
        ]);
        */
    }
}
