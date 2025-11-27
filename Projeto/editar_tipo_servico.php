<?php
require("cabecalho.php");
require("conexao.php");

$erro = ""; //mensagens de erro

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM tipo_servico WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $acao = $_POST['acao'];

    try {
        if ($acao == 'salvar') {
            $stmt = $pdo->prepare("UPDATE tipo_servico SET nome=?, valor=? WHERE id=?");
            $stmt->execute([$_POST['nome'], $_POST['valor'], $id]);
            header('location: tipos_servico.php');
            exit;
        } else if ($acao == 'excluir') {
            $stmt = $pdo->prepare("DELETE FROM tipo_servico WHERE id=?");
            $stmt->execute([$id]);
            header('location: tipos_servico.php');
            exit;
        }
    } catch (PDOException $e) {
        // Mensagem de erro
        if ($e->getCode() == '23000') {
            $erro = "Não é possível excluir este serviço pois ele já está vinculado a um ou mais <b>Pedidos</b>.<br>Exclua os pedidos relacionados antes de tentar remover este serviço.";
        } else {
            $erro = "Erro ao processar: " . $e->getMessage();
        }
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4">Editar Serviço</h2>

        <?php if (!empty($erro)): ?>
            <div class="alert alert-warning border-0 shadow-sm" role="alert">
                ⚠️ <?= $erro ?>
            </div>
        <?php endif; ?>

        <form method="post" class="card p-4 border-0 shadow-sm">
            <input type="hidden" name="id" value="<?= $dados['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Nome do Serviço</label>
                <input type="text" name="nome" class="form-control" value="<?= $dados['nome'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Valor (R$)</label>
                <input type="number" step="0.01" name="valor" class="form-control" value="<?= $dados['valor'] ?>" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="tipos_servico.php" class="btn btn-secondary">Voltar</a>
                <div>
                    <button type="submit" name="acao" value="excluir" class="btn btn-danger me-2" onclick="return confirm('Excluir este serviço?');">Excluir</button>
                    <button type="submit" name="acao" value="salvar" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require("rodape.php"); ?>