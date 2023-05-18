<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'principal']);
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos']);
Route::get('/contato', [ContatoController::class, 'contato']);
Route::get('/login', function (){return "login";});

//Agrupando rotas para separar rotas públicas de privadas
Route::prefix('/app')->group(function (){
    Route::get('/clientes', function (){return "Clientes";});
    Route::get('/fornecedores', [FornecedorController::class, 'index']);
    Route::get('/produtos',  function (){return "Produtos";});
});

Route::get('/teste/{nome}/{idade}', [TesteController::class, 'teste']);

//Caso o usuário tente acessar qualquer rota inexistente no sistema
Route::fallback(function(){
    echo 'A página que você está tentando acessar não existe, <a href="/">clique aqui</a> para retornar para a página inicial.';
});

/*
//Rota que estará recebendo parâmetros: Nome, Categoria, Assunto, Mensagem, Estado (opcional)
Route::get('/contato/{nome}/{categoria_id?}',
 function (
    string $nome,
    int $categoria_id = 1
    ) {
        echo "Olá $nome, o motivo do seu contato é $categoria_id";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');  //Validação com expressão regular (RegEx)
*/