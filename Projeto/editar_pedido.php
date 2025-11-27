<?php
require("cabecalho.php");
require("conexao.php");

//Carregar listas para os 
try {
    $clientes = $pdo->query("SELECT * FROM cliente ORDER BY nome ASC")->fetchAll();
    $servicos = $pdo->query("SELECT * FROM tipo_servico ORDER BY nome ASC")->fetchAll();
    $itens = $pdo->query("SELECT * FROM item_roupa ORDER BY nome ASC")->fetchAll();
} catch (Exception $e) {
    die("Erro ao carregar listas: " . $e->getMessage());
}

//Buscar os dados do Pedido atual 
$pedido = null;
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM pedido WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$pedido) die("<div class='alert alert-danger'>Pedido não encontrado.</div>");
}

//Salvar ou Excluir
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $acao = $_POST['acao'];

    try {
        if ($acao == 'salvar') {
            $sql = "UPDATE pedido SET cliente_id=?, tipo_servico_id=?, item_roupa_id=?, data_pedido=?, observacao=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_POST['cliente'],
                $_POST['servico'],
                $_POST['item'],
                $_POST['data'],
                $_POST['obs'],
                $id
            ]);
            header('location: pedidos.php');
        } else if ($acao == 'excluir') {
            $stmt = $pdo->prepare("DELETE FROM pedido WHERE id=?");
            $stmt->execute([$id]);
            header('location: pedidos.php');
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Erro ao processar: " . $e->getMessage() . "</div>";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="mb-4">Editar Pedido #<?= $pedido['id'] ?></h2>

        <form method="post" class="card p-4 border-0 shadow-sm">
            <input type="hidden" name="id" value="<?= $pedido['id'] ?>">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Cliente</label>
                    <select name="cliente" class="form-select" required>
                        <?php foreach ($clientes as $c): ?>
                            <option value="<?= $c['id'] ?>"
                                <?= ($c['id'] == $pedido['cliente_id']) ? 'selected' : '' ?>>
                                <?= $c['nome'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Data</label>
                    <input type="date" name="data" class="form-control" value="<?= $pedido['data_pedido'] ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tipo de Serviço</label>
                    <select name="servico" class="form-select" required>
                        <?php foreach ($servicos as $s): ?>
                            <option value="<?= $s['id'] ?>"
                                <?= ($s['id'] == $pedido['tipo_servico_id']) ? 'selected' : '' ?>>
                                <?= $s['nome'] ?> (R$ <?= $s['valor'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Item (Roupa)</label>
                    <select name="item" class="form-select" required>
                        <?php foreach ($itens as $i): ?>
                            <option value="<?= $i['id'] ?>"
                                <?= ($i['id'] == $pedido['item_roupa_id']) ? 'selected' : '' ?>>
                                <?= $i['nome'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Observações</label>
                <textarea name="obs" class="form-control" rows="3"><?= $pedido['observacao'] ?></textarea>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="pedidos.php" class="btn btn-secondary">Voltar</a>
                <div>
                    <button type="submit" name="acao" value="excluir" class="btn btn-danger me-2" onclick="return confirm('Tem certeza que deseja excluir este pedido permanentemente?');">Excluir Pedido</button>
                    <button type="submit" name="acao" value="salvar" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require("rodape.php"); ?>