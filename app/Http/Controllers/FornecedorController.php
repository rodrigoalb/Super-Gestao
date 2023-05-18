<?php

namespace App\Http\Controllers;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '78.752.631/0001-54',
                'ddd' => '11',
                'numero' => '98675-9040'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => '65.298.364/0001-45',
                'ddd' => '21',
                'numero' => '99876-2349'
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => '23.088.562/0001-34',
                'ddd' => '32',
                'numero' => '98765-2340'
            ]
        ];
        
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
