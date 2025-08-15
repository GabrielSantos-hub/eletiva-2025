<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primeiro exemplo
    </title>
</head>
<body>
    <?php //variavel em php começa com cifrão
    $dia = date("d");
    echo "<p>" . $dia . "</p>";


    ?>
    <h1> Hoje é dia <?= $dia?> de Agosto de 2025 </h1>
    
</body>
</html>