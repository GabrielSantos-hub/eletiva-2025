<?php
require("cabecalho.php");
require("conexao.php");
//segue a lógica crud
try {
    $stmt = $pdo->query("SELECT * FROM item_roupa ORDER BY nome ASC");
    $dados = $stmt->fetchAll();
} catch (Exception $e) {
    echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-primary m-0">Itens</h2>
    <a href="novo_item_roupa.php" class="btn btn-primary"> Novo Item</a>
</div>

<div class="card p-3 border-0 shadow-sm">
    <table class="table table-hover table-striped align-middle">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th>Nome do Item</th>
                <th width="100px">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $d): ?>
                <tr>
                    <td><?= $d['id'] ?></td>
                    <td><?= $d['nome'] ?></td>
                    <td>
                        <a href="editar_item_roupa.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require("rodape.php"); ?>