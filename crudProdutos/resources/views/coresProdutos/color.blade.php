<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href="{{ route('produtos.index') }}">Produtos</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href="{{ route('cores.create') }}">Add Cor</a>
        </div>
      </div>
    </div>
    
  </nav>
  <div class="container-xl mt-5">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-8">
            <h2>
              <b>Cores</b>
            </h2>
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
          </tr>
        </thead>

        <tbody>


          @foreach($cores as $cor)
        <tr>
        <td>{{ $cor->id }}</td>
        <td>{{ $cor->nome }}</td>
        <td>
          <div class="row">
          <div class="col-auto">
            <a href="{{ route('cores.edit', $cor->id) }}" class="btn btn-primary btn-sm">Edit</a>
          </div>
          <div class="col-sm">
            <form action="{{ route('cores.destroy', $cor->id) }}" method="post">
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
