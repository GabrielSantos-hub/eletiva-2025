<?php
require("cabecalho.php");
require("conexao.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO cliente (nome, telefone, endereco) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['nome'], $_POST['telefone'], $_POST['endereco']]);
    header('location: clientes.php');
}
?>
<h2>Novo Cliente</h2>
<form method="post" class="card p-4">
    <div class="mb-3">
        <label class="form-label">Nome Completo</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Endereço</label>
        <input type="text" name="endereco" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
<?php require("rodape.php"); ?>