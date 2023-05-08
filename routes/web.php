<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SobreNosController;
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

//Rota que estará recebendo parâmetros: Nome, Categoria, Assunto, Mensagem, Estado (opcional)
Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem}/{estado?}',
 function (
    string $nome,
    string $categoria,
    string $assunto,
    string $mensagem,
    string $estado = 'Estado não informado.'
    ) {
        echo "Olá $nome, o motivo do seu contato é $categoria, Assunto: $assunto, Sua mensagem: $mensagem Estado: $estado";
});

