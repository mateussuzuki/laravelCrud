<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Ver Produtos</title>
</head>

<body>

  <div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        <form action="{{ route('produtos.index') }}">
          @csrf
          <div class="form-group">
            <label for="codigo">Codigo</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $produto->codigo }}" disabled>
          </div>
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}" disabled>
          </div>
          <div class="form-group">
            <label for="descricao">Descricao</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $produto->descricao }}"
              disabled>
          </div>
          <div class="form-group">
            <label for="cor_id">Cor</label>
            <input type="text" class="form-control" id="cor_id" name="cor_id" value="{{ $produto->nomeCor }}"
              disabled>
          </div>
          @if ($produto->imagem)
        <div class="form-group d-flex flex-column my-4">
        <label>Imagem</label>
        <img src="data:{{ $produto->imagem_type }};base64,{{ $produto->imagem }}" alt="Imagem do produto"
          style="max-width: 250px;">
        </div>
      @endif
          <br>
          <button type="submit" class="btn btn-primary">Voltar</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>