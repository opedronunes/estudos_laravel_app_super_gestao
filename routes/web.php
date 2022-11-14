<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/sobreNos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/login', function(){ return 'Login'; })->name('site.login');

//AGRUPAMENTO DE ROTAS 
Route::middleware('autenticacao:padrao')->prefix('/app')->group(function(){

    Route::get('/clientes', function(){ return 'Clientes'; })->name('app.clientes');

    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');

    Route::get('/produtos', function(){ return 'Produtos'; })->name('app.produtos');

});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para voltar a página inicical.';
});







/*
Route::get('/contato/{nome}/{categoria_id}', function(
        string $nome = 'Desconhecido',
        int $categoria_id = 1 //1 - 'Informação'
    ){
        echo "Estamos aqui: $nome - $categoria_id";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/', function () {
    return view('welcome');
});*/
