<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produto;

use IlluminateSupportFacadesRoute;
use AppHttpControllersPostController;

class ProdutoController
{

    public function index()
    {
        $produtos = Produto::all();

        return view('index', compact('produtos'));
    }

    public function create()
    {
      return view('create');
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'codigo' => 'required|digits:13|numeric',
            'nome' => 'required',
            'descricao' => 'required',
            'imagem' => 'required|nullable',
        ], [
            'codigo.digits' => 'O campo :attribute deve ter exatamente :digits dígitos.',
        ]);
          Produto::create($request->all());
          return redirect()->route('produtos.index')
            ->with('success','Produto adicionado com sucesso.');
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'codigo' => 'required|max:13',
            'nome' => 'required',
          ]);
          $produto = Produto::find($id);
          $produto->update($request->all());
          return redirect()->route('index')
            ->with('success', 'Produto alterado com sucesso');        
    }


    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('index')
        ->with('success', 'produto deletado com sucesso');
    }
}
