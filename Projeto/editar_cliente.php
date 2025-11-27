<?php
require("cabecalho.php");
require("conexao.php");

// verificar se veio um ID na URL 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = ?");
    $stmt->execute([$id]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$dados) die("Cliente não encontrado.");
}

//Processar o formulário 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $acao = $_POST['acao']; //Salvar ou Excluir

    try {
        if ($acao == 'salvar') {
            $sql = "UPDATE cliente SET nome=?, telefone=?, endereco=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_POST['nome'], $_POST['telefone'], $_POST['endereco'], $id]);
            header('location: clientes.php'); // Sucesso
        } else if ($acao == 'excluir') {
            $stmt = $pdo->prepare("DELETE FROM cliente WHERE id=?");
            $stmt->execute([$id]);
            header('location: clientes.php');
        }
    } catch (Exception $e) { //menssagem de erro
        echo "<div class='alert alert-danger'>Erro: Não é possível excluir. Verifique se existem pedidos vinculados a este item.</div>";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4">Editar Cliente</h2>

        <form method="post" class="card p-4 border-0 shadow-sm">
            <input type="hidden" name="id" value="<?= $dados['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Nome Completo</label>
                <input type="text" name="nome" class="form-control" value="<?= $dados['nome'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" value="<?= $dados['telefone'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" value="<?= $dados['endereco'] ?>">
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="clientes.php" class="btn btn-secondary">Voltar</a>
                <div>
                    <button type="submit" name="acao" value="excluir" class="btn btn-danger me-2" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</button>
                    <button type="submit" name="acao" value="salvar" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require("rodape.php"); ?>