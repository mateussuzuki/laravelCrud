<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Posts</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href="{{ route('produtos.index') }}">Crud Produtos</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href="{{ route('produtos.create') }}">Add Produto</a>
          <a class="btn btn-sm btn-success" href="{{ route('cores.index') }}">Cores</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container-xl">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-8">
            <h2>
              <b>Produtos</b>
            </h2>
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>
              Código <i class="fa fa-sort"></i>
            </th>
            <th>Nome</th>
            <th>
              Descrição <i class="fa fa-sort"></i>
            </th>
            <th>cor</th>
            <th>Imagem</th>
          </tr>
        </thead>

        <tbody>


          @foreach($produtos as $produto)
        <tr>
        <td>{{ $produto->id }}</td>
        <td>{{ $produto->codigo }}</td>
        <td>{{ $produto->nome }}</td>
        <td>{{ $produto->descricao }}</td>
        <td>{{ $produto->nomeCor }}</td>
        <td>
          @if ($produto->imagem)
          <img src="data:image/jpg;base64,{{ $produto->imagem }}" alt="Imagem" style="max-width: 100px; max-height: 60px;">
        @endif
        </td>
        <td>
          <div class="row">
          <div class="col-auto">
            <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-primary btn-sm">View</a>
          </div>
          <div class="col-auto">
            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary btn-sm">Edit</a>
          </div>
          <div class="col-sm">
            <form action="{{ route('produtos.destroy', $produto->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </div>
          </div>
        </td>

        </tr>
      @endforeach


        </tbody>
      </table>
    </div>
  </div>
</body>

</html>