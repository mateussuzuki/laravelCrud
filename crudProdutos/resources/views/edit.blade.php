<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Alterar produto</title>
</head>

<body>

  <div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        <h3>Update Post</h3>
        <form action="{{ route('produtos.update', $produto->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="codigo">Codigo</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $produto->codigo }}" required>
          </div>
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}" required>
          </div>
          <div class="form-group">
            <label for="descricao">Descricao</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"
              required>{{ $produto->descricao }}</textarea>
          </div>
          @if ($produto->imagem)
        <div class="form-group d-flex flex-column my-4">
        <label>Imagem Atual</label>
        <img src="data:{{ $produto->imagem_type }};base64,{{ $produto->imagem }}" alt="Imagem do produto"
          style="max-width: 80px;">
        </div>
      @endif
          <div class="form-group">
            <label for="imagem">Nova Imagem</label>
            <input type="file" class="form-control" id="imagem" name="imagem">
          </div>
          <button type="submit" class="btn mt-3 btn-primary">Update Post</button>
        </form>
      </div>
    </div>
  </div>
</body>
<script>
  document.getElementById('imagem').addEventListener('change', function (event) {
    var fileInput = document.getElementById('imagem');
    var file = fileInput.files[0];
    if (file.size > 10 * 1024 * 1024) {
      fileInput.value = ""
      alert('O tamanho da imagem excedeu o limite');
    }
  });
</script>

</html>