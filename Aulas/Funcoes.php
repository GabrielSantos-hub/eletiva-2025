<?php
    $nome = "Cerelepe";
    echo "<p> Todas em máiusculo: " . strtoupper($nome);
    echo "<p> Todas em minusculo: " . strtolower($nome);
    echo "<p> Qtd caracteres: " . strlen($nome);
    $posicao = strpos($nome, "e");
    echo "<p> caractere E na posição: $posicao <p>";

    //date_default_timezone_get("America/Sao_Paulo");
    $data1 = date("d/m/Y");
    $dia = date("d");
    $hora = date("H:i:s");

    echo"<p>Data: $data1</p>";
    echo "<p>Dia: $dia </p>";
    echo "<p>Hora: $hora</p>";

    if(checkdate(2, 30, 2025)){
        echo"<p> A data informada existe (30/02/2025)</p>";
    }
    else
    echo"<p> A data informada não existe (30/02/2025)</p>";

    $valor = -10;
    echo "<p>Valor arredendado: ".abs($valor)."</p>";
    $valor = 5.9;
    echo "<p>Valor arredendado: ".round($valor)."</p>";
    $valor= rand(1, 100);
    echo "<p> Valor aleatório: $valor </p>";
    echo"<p> Raiz quadrada de 16:". round(sqrt(16))."</p>";
    $valor = 13.5;
    echo "<p> Valor formato: R$". number_format($valor, 2, ",", ".")."</p>";

    function exibirsaudacao(){
        echo"<p>Olá Mundo</p>";
    }
    exibirsaudacao();

    function exibirsaudacaoComNome($nome){
        echo"<p> Seja bem-vindo $nome </p>";
    }
    exibirsaudacaoComNome("SCOOBY-DOO");

    function menorValor($valor1, $valor2){
        return min($valor1, $valor2);
    }
    echo"<p>Menor valor entre 4 e 8:". menorValor(8,4)."</p>"; 

    function somarValores(...$numeros){
        return array_sum($numeros);
    }
    $soma = somarValores(1,2,3,4,5,6,7);
    echo"<p> A soma dos valores é de: $soma </p>";



?>