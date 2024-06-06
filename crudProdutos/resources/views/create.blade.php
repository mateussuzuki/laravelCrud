<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Adicionar Produtos</title>
</head>

<body>

  <div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        <h3>Adicione um produto</h3>
        <form action="{{ route('produtos.store') }}" id="form" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="codigo">Codigo</label>
            <input type="text" class="form-control" id="codigo" name="codigo" required>
          </div>
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
          </div>
          <div class="form-group">
            <label for="descricao">Descricao</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="4"></textarea>
          </div>
          <div class="form-group my-3 row">
            <div class="col-11">
              <label for="cor_id">Cor</label>
              <select name="cor_id" id="cor_id" class="form-select">
                @forEach($cores as $cor)
                  <option value="{{ $cor->id }}" >{{ $cor->nome }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-1 d-flex align-items-end justify-content-center">
              <a class="btn btn-primary" href="/cores">
              <i class="bi bi-plus"></i>
              </a>
            </div>

          </div>
          <div class="form-group">
            <label for="imagem">Imagem</label>
            <input type="file" class="form-control" id="imagem" name="imagem">
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Adicionar produto</button>
        </form>
      </div>
    </div>
  </div>

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
</body>

</html>