<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 1</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exercício 1</h1>
<form method="post">
<div class="mb-3">
              <label for="valor1" class="form-label">Informe o valor 1</label>
              <input type="number" id="valor1" name="valor1" class="form-control" required="">
            </div><div class="mb-3">
              <label for="valor2" class="form-label">Informe o valor 2</label>
              <input type="number" id="valor2" name="valor2" class="form-control" required="">
            </div><div class="mb-3">
              <label for="valor3" class="form-label">Informe o valor 3</label>
              <input type="number" id="valor3" name="valor3" class="form-control" required="">
            </div><div class="mb-3">
              <label for="valor4" class="form-label">Informe o valor 4</label>
              <input type="number" id="valor4" name="valor4" class="form-control" required="">
            </div><div class="mb-3">
              <label for="valor5" class="form-label">Informe o valor 5</label>
              <input type="number" id="valor5" name="valor5" class="form-control" required="">
            </div><div class="mb-3">
              <label for="valor6" class="form-label">Informe o valor 6</label>
              <input type="number" id="valor6" name="valor6" class="form-control">
            </div><div class="mb-3">
              <label for="valor7" class="form-label">Informe o valor 7</label>
              <input type="number" id="valor7" name="valor7" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST  "){
    $VALOR1 = $_POST['valor1'];
    $VALOR2 = $_POST['valor2'];
    $VALOR3 = $_POST['valor3'];
    $VALOR4 = $_POST['valor4'];
    $VALOR5 = $_POST['valor5'];
    $VALOR6 = $_POST['valor6'];
    }

    $MENOR = $VALOR1;
    $POSICAO = 1;

    if($VALOR2 < $MENOR){
        $MENOR = $VALOR2;
        $POSICAO = 2;
    }

    if($VALOR3 < $MENOR){
        $MENOR = $VALOR3;
        $POSICAO = 3;
    }

    if($VALOR4 < $MENOR){
        $MENOR = $VALOR4;
        $POSICAO = 4;
    }

    if($VALOR5 < $MENOR){
        $MENOR = $VALOR5;
        $POSICAO = 5;
    }

    if($VALOR6 < $MENOR){
        $MENOR = $VALOR6;
        $POSICAO = 6;
    }
    
    if($VALOR7 < $MENOR){
        $MENOR = $VALOR7;
        $POSICAO = 7;
    }
  
?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>