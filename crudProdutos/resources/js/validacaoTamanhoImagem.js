document.getElementById('imagem').addEventListener('change', function(event) {
  var fileInput = document.getElementById('imagem');
  var file = fileInput.files[0];
  if (file.size > 10 * 1024 * 1024) {
      fileInput.value = ""
      alert('O tamanho da imagem excedeu o limite');
  }
});