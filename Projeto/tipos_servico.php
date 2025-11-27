<?php
require("cabecalho.php");
require("conexao.php");
//segue a lógica crud
try {
    $stmt = $pdo->query("SELECT * FROM tipo_servico ORDER BY nome ASC");
    $dados = $stmt->fetchAll();
} catch (Exception $e) {
    echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Serviços e Preços</h2>
    <a href="novo_tipo_servico.php" class="btn btn-primary">Novo Serviço</a>
</div>

<div class="card p-3 border-0 shadow-sm">
    <table class="table table-hover table-striped align-middle">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th>Descrição do Serviço</th>
                <th>Valor Unitário</th>
                <th width="15%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $d): ?>
                <tr>
                    <td><?= $d['id'] ?></td>
                    <td><?= $d['nome'] ?></td>
                    <td>R$ <?= number_format($d['valor'], 2, ',', '.') ?></td>
                    <td>
                        <a href="editar_tipo_servico.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require("rodape.php"); ?>