<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instaciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com .br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'cotato@fornecedor100.com.br';
        $fornecedor->save();

        //Método create - definir método fillable no model
        Fornecedor::create([
            'nome'=> 'Fornecedor 200',
            'site'=> 'fornecedor200.com.br',
            'uf'=> 'DF',
            'email'=> 'contato@fornecedor200.com.br'
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome'=> 'Fornecedor 300',
            'site'=> 'fornecedor300.com.br',
            'uf'=> 'RS',
            'email'=> 'contato@fornecedor300.com.br',
        ]);
    }
}
