<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Cor;

use IlluminateSupportFacadesRoute;
use AppHttpControllersPostController;

class ProdutoController
{

    public function index()
    {
        $produtos = Produto::join('cores_produtos', 'produtos.cor_id', '=', 'cores_produtos.id')
        ->select('produtos.*', 'cores_produtos.nome as nomeCor')
        ->get();
        return view('index', compact('produtos'));
    }

    public function create()
    {
        $cores = Cor::all();
        return view('create', compact('cores'));
    }

    public function edit($id)
    {
        $produto = Produto::find($id);
        $cores = Cor::all();
        return view('edit', compact('produto', 'cores'));
    }


    public function store(Request $request)
    {
        $this->validarRequestProduto($request);
        $produto = [
            'codigo' => $request->codigo,
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'cor_id' => $request->cor_id,
            'imagem' => $request->imagem,
        ];
        $produto['imagem'] = $this->converterImagemRequest($request);


        Produto::create($produto);
        return redirect()->route('produtos.index')
            ->with('success', 'Produto adicionado com sucesso.');
    }


    public function update(Request $request, string $id)
    {
        $this->validarRequestProduto($request);

        $produto = Produto::find($id);

        $produto->descricao = $request->descricao;
        $produto->nome = $request->nome;
        $produto->cor_id = $request->cor_id;
        

        $img = $this->converterImagemRequest($request);
        if($img !== null) {
            $produto->imagem = $img;
        }

        $produto->save();
        return redirect()->route('produtos.index')
            ->with('success', 'Produto alterado com sucesso');
    }

    public function show($id)
    {
        $produto = Produto::join('cores_produtos', 'produtos.cor_id', '=', 'cores_produtos.id')
        ->select('produtos.*', 'cores_produtos.nome as nomeCor')
        ->where('produtos.id', $id)
        ->first();
        return view('show', compact('produto'));
    }


    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('produtos.index')
            ->with('success', 'produto deletado com sucesso');
    }

    private function validarRequestProduto(Request $request)
    {
        $request->validate([
            'codigo' => 'required|digits:13|numeric',
            'nome' => 'required',
            'descricao' => 'required',
        ], [
            'codigo.digits' => 'O campo :attribute deve ter exatamente :digits dígitos.',
        ]);
    }

    private function converterImagemRequest(Request $request)
    {
        if ($request->hasFile('imagem') && $request->imagem->isValid()) {
            $imagempath = base64_encode(file_get_contents($request->imagem));
            return $imagempath;
        }

        return null;
    }
}
