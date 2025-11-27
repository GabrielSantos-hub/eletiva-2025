<?php
require("cabecalho.php");
?>

<div class="row mb-4">
    <div class="col-md-12 text-center">
        <h1 class="display-5 text-primary">Bem-vindo(a), <?= $_SESSION['nome'] ?>!</h1>
        <p class="text-muted">Selecione uma opção abaixo de gerenciamento da lavanderia.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 text-center p-4 border-0 shadow-sm">
            <div class="card-body d-flex flex-column">
                <h4 class="card-title text-secondary"> Pedidos</h4>
                <p class="card-text">Registro de pedidos</p>
                <a href="pedidos.php" class="btn btn-outline-primary w-100 mt-auto">Acessar</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 text-center p-4 border-0 shadow-sm">
            <div class="card-body d-flex flex-column">
                <h4 class="card-title text-secondary"> Clientes</h4>
                <p class="card-text">Base de clientes</p>
                <a href="clientes.php" class="btn btn-outline-primary w-100 mt-auto">Acessar</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 text-center p-4 border-0 shadow-sm">
            <div class="card-body d-flex flex-column">
                <h4 class="card-title text-secondary"> Serviços</h4>
                <p class="card-text">Tabela de preços e tipos de serviços</p>
                <a href="tipos_servico.php" class="btn btn-outline-primary w-100 mt-auto">Acessar</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 text-center p-4 border-0 shadow-sm">
            <div class="card-body d-flex flex-column">
                <h4 class="card-title text-secondary"> Itens</h4>
                <p class="card-text">Cadastro dos itens</p>
                <a href="itens_roupa.php" class="btn btn-outline-primary w-100 mt-auto">Acessar</a>
            </div>
        </div>
    </div>
</div>

<?php
require("rodape.php");
?>