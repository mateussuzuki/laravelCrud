<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cor;


class CorController extends Controller
{
    public function index()
    {
        $cores = Cor::all(); 
        return view('coresProdutos.color', compact('cores'));
    }

    public function create()
    {
        return view('coresProdutos.create');
    }

    public function store(Request $request)
    {
        $validacaoNome = $request->validate([
            'nome'=> 'required|string',
        ]);

        $request = [
            'nome' => $validacaoNome['nome']
        ];
        
        Cor::create($request);
        return redirect()->route('cores.index')
            ->with('success', 'Produto adicionado com sucesso.');
    }
}
