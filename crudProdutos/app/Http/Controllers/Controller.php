<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return view('index', compact('produtos'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|max:13',
            'nome' => 'required',
          ]);
          Produto::create($request->all());
          return redirect()->route('index')
            ->with('success','Produto adicionado com sucesso.');
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = Post::find($id);
        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    
    public function destroy($id)
    {

        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }

    
    public function create()
    {
        return view('posts.create');
    }


    
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }
}
