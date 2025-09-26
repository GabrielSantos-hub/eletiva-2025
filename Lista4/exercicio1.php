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
<div class="row inline-row mb-3"><div class="col-md-4">
    <?php for($i = 1; $i <= 5;$i++):?>
        <label for="nome" class="form-label">Informe o <?=  $i ?> nome</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <div class="col-md-4">
        <label for="telefone" class="form-label">Informe o<?=  $i ?> Telefone</label>
        <input type="number" id="telefone" name="telefone" class="form-control" required="">
    </div>
</div>

<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $vetNome = $_POST['nome'];
        $vetTelefone = $_POST['telefone'];
        sort($vetor);
        foreach($vetor as $v){
            echo"<p>$v</p>";
        }

    }




?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>