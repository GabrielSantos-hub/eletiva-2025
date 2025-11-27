<?php
require("cabecalho.php");
require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];

    try {
        $stmt = $pdo->prepare("INSERT INTO tipo_servico (nome, valor) VALUES (?, ?)");
        if ($stmt->execute([$nome, $valor])) {
            header('location: tipos_servico.php');
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4">Cadastrar Novo Serviço</h2>

        <form method="post" class="card p-4 border-0 shadow-sm">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Serviço</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Ex: Lavagem a Seco" required>
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor (R$)</label>
                <input type="number" id="valor" name="valor" class="form-control" step="0.01" placeholder="0.00" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="tipos_servico.php" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar Serviço</button>
            </div>
        </form>
    </div>
</div>

<?php require("rodape.php"); ?>