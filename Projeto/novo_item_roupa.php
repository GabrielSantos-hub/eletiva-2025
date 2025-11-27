<?php
require("cabecalho.php");
require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];

    try {
        $stmt = $pdo->prepare("INSERT INTO item_roupa (nome) VALUES (?)");
        if ($stmt->execute([$nome])) {
            header('location: itens_roupa.php');
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4">Cadastrar Item de Roupa</h2>

        <form method="post" class="card p-4 border-0 shadow-sm">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Peça</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Ex: Edredom King Size" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="itens_roupa.php" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar Item</button>
            </div>
        </form>
    </div>
</div>

<?php require("rodape.php"); ?>