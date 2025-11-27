<?php
require("cabecalho.php");
require("conexao.php");
//segue a lógica crud
try {
    // Query com JOIN para trazer os nomes em vez dos IDs
    $sql = "SELECT p.id, p.data_pedido, c.nome as cliente, t.nome as servico, t.valor, i.nome as item 
                FROM pedido p
                INNER JOIN cliente c ON p.cliente_id = c.id
                INNER JOIN tipo_servico t ON p.tipo_servico_id = t.id
                INNER JOIN item_roupa i ON p.item_roupa_id = i.id
                ORDER BY p.data_pedido DESC";
    $stmt = $pdo->query($sql);
    $pedidos = $stmt->fetchAll();
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>Erro ao carregar pedidos: " . $e->getMessage() . "</div>";
}

// Feedback visual se vier redirecionado de um cadastro
if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'true') {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Pedido realizado com sucesso!
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
              </div>";
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-primary m-0">Controle de Pedidos</h2>
    <a href="novo_pedido.php" class="btn btn-primary no-print">Novo Pedido</a>
</div>

<div class="card p-3 border-0 shadow-sm">
    <table class="table table-hover table-striped align-middle">
        <thead>
            <tr>
                <th>Data</th>
                <th>Cliente</th>
                <th>Serviço</th>
                <th>Item</th>
                <th>Valor</th>
                <th class="no-print" width="100px">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($pedidos) > 0): ?>
                <?php foreach ($pedidos as $p): ?>
                    <tr>
                        <td><?= date('d/m/Y', strtotime($p['data_pedido'])) ?></td>
                        <td><?= $p['cliente'] ?></td>
                        <td><?= $p['servico'] ?></td>
                        <td><?= $p['item'] ?></td>
                        <td>R$ <?= number_format($p['valor'], 2, ',', '.') ?></td>
                        <td class="no-print">
                            <a href="editar_pedido.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">Nenhum pedido registrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require("rodape.php"); ?>