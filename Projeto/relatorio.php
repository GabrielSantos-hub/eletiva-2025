<?php
require("cabecalho.php");
require("conexao.php");

try {


    $sqlFaturamento = "SELECT SUM(t.valor) FROM pedido p JOIN tipo_servico t ON p.tipo_servico_id = t.id";
    $totalFaturamento = $pdo->query($sqlFaturamento)->fetchColumn();


    $totalPedidos = $pdo->query("SELECT COUNT(*) FROM pedido")->fetchColumn();
    $totalClientes = $pdo->query("SELECT COUNT(*) FROM cliente")->fetchColumn();
    $totalItens = $pdo->query("SELECT COUNT(*) FROM item_roupa")->fetchColumn();


    $sqlServicos = "SELECT t.nome, COUNT(p.id) as qtd, SUM(t.valor) as total 
                        FROM tipo_servico t 
                        LEFT JOIN pedido p ON p.tipo_servico_id = t.id 
                        GROUP BY t.id 
                        ORDER BY total DESC";
    $relatorioServicos = $pdo->query($sqlServicos)->fetchAll();


    $sqlClientes = "SELECT c.nome, COUNT(p.id) as qtd, SUM(t.valor) as total 
                        FROM cliente c 
                        JOIN pedido p ON p.cliente_id = c.id 
                        JOIN tipo_servico t ON p.tipo_servico_id = t.id 
                        GROUP BY c.id 
                        ORDER BY total DESC 
                        LIMIT 5";
    $topClientes = $pdo->query($sqlClientes)->fetchAll();
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>Erro ao gerar relatório: " . $e->getMessage() . "</div>";
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-primary m-0">Relatório Geral do Sistema</h2>
    <button onclick="window.print()" class="btn btn-secondary no-print"> Imprimir Relatório</button>
</div>

<div class="row mb-4 g-3">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-3 text-center" style="background-color: #e3f2fd;">
            <h5 class="text-secondary">Faturamento Total</h5>
            <h2 class="text-primary fw-bold">R$ <?= number_format($totalFaturamento ?? 0, 2, ',', '.') ?></h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-3 text-center">
            <h5 class="text-secondary">Total de Pedidos</h5>
            <h2 class="text-dark fw-bold"><?= $totalPedidos ?></h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-3 text-center">
            <h5 class="text-secondary">Clientes Cadastrados</h5>
            <h2 class="text-dark fw-bold"><?= $totalClientes ?></h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0">
                <h5 class="text-primary mb-0">Desempenho por Serviço</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Serviço</th>
                            <th class="text-center">Qtd. Pedidos</th>
                            <th class="text-end">Total Gerado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($relatorioServicos as $s): ?>
                            <tr>
                                <td><?= $s['nome'] ?></td>
                                <td class="text-center"><?= $s['qtd'] ?></td>
                                <td class="text-end">R$ <?= number_format($s['total'] ?? 0, 2, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0">
                <h5 class="text-primary mb-0">Top Clientes </h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Cliente</th>
                            <th class="text-center">Pedidos</th>
                            <th class="text-end">Total Gasto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($topClientes) > 0): ?>
                            <?php foreach ($topClientes as $c): ?>
                                <tr>
                                    <td><?= $c['nome'] ?></td>
                                    <td class="text-center"><?= $c['qtd'] ?></td>
                                    <td class="text-end text-success fw-bold">R$ <?= number_format($c['total'], 2, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center p-3">Nenhum dado disponível.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <h5 class="text-secondary mb-3">Resumo da Infraestrutura</h5>
        <div class="row text-center">
            <div class="col-md-4">
                <p class="mb-0">Tipos de Serviços Oferecidos</p>
                <strong class="fs-5"><?= count($relatorioServicos) ?></strong>
            </div>
            <div class="col-md-4 border-start border-end">
                <p class="mb-0">Tipos de Itens Cadastrados</p>
                <strong class="fs-5"><?= $totalItens ?></strong>
            </div>
            <div class="col-md-4">
                <p class="mb-0">Média de Faturamento por Pedido</p>
                <strong class="fs-5 text-primary">
                    <?php
                    $media = ($totalPedidos > 0) ? ($totalFaturamento / $totalPedidos) : 0;
                    echo "R$ " . number_format($media, 2, ',', '.');
                    ?>
                </strong>
            </div>
        </div>
    </div>
</div>

<?php require("rodape.php"); ?>