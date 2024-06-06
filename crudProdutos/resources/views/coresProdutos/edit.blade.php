<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Alterar cor</title>
</head>

<body>

  <div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        <h3>Atualizar Cor</h3>
        <form action="{{ route('cores.update', $cor->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $cor->nome }}" required>
          </div>

          <button type="submit" class="btn mt-3 btn-primary">Alterar dados</button>
        </form>
      </div>
    </div>
  </div>
</body>


</html>