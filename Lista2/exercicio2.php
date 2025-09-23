<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 2</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exercício 2</h1>
<form method="post">
<div class="col-4 mb-3">
              <label for="valor1" class="form-label">Informe o valor</label>
              <input type="number" id="valor1" name="valor1" class="form-control" required="">
            </div><div class="col-4 mb-3">
              <label for="valor2" class="form-label">Informe o valor</label>
              <input type="text" id="valor2" name="valor2" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Valor1 = $_POST['valor1'];
        $Valor2 = $_POST['valor2'];

        if($Valor1 == $Valor2){
            $soma = $Valor1 + $Valor2;
            $triplo = $soma * 3;
            echo"<p> O triplo dos valores somados é de: {$triplo}</p>";
        }
        else{
            echo"Os valores somados ficam: ". $Valor1 + $Valor2;
        }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>