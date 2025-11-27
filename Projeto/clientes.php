<?php
require("cabecalho.php");
require("conexao.php");
//segue a lógica crud
try {
    // Busca todos os clientes ordenados pelo nome
    $stmt = $pdo->query("SELECT * FROM cliente ORDER BY nome ASC"); //ASC
    $dados = $stmt->fetchAll();
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>Erro ao carregar clientes: " . $e->getMessage() . "</div>";
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-primary m-0">Clientes</h2>
    <a href="novo_cliente.php" class="btn btn-primary">Novo Cliente</a>
</div>

<div class="card p-3 border-0 shadow-sm">
    <table class="table table-hover table-striped align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th width="100px">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($dados) > 0): ?>
                <?php foreach ($dados as $d): ?>
                    <tr>
                        <td><?= $d['id'] ?></td>
                        <td><?= $d['nome'] ?></td>
                        <td><?= $d['telefone'] ?></td>
                        <td>
                            <a href="editar_cliente.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center text-muted">Nenhum cliente cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require("rodape.php"); ?>