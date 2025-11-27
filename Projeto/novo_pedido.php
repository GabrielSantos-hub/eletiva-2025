<?php
    require("cabecalho.php");
    require("conexao.php");

    // Carregar dados para os selects
    $clientes = $pdo->query("SELECT * FROM cliente")->fetchAll();
    $servicos = $pdo->query("SELECT * FROM tipo_servico")->fetchAll();
    $itens = $pdo->query("SELECT * FROM item_roupa")->fetchAll();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        try{
            $stmt = $pdo->prepare("INSERT INTO pedido (cliente_id, tipo_servico_id, item_roupa_id, data_pedido, observacao) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$_POST['cliente'], $_POST['servico'], $_POST['item'], $_POST['data'], $_POST['obs']]);
            header("location: pedidos.php?cadastro=true");
        } catch(Exception $e){
            echo "<div class='alert alert-danger'>Erro: ".$e->getMessage()."</div>";
        }
    }
?>

<h2>Novo Pedido</h2>
<form method="post" class="card p-4">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Cliente</label>
            <select name="cliente" class="form-select" required>
                <option value="">Selecione...</option>
                <?php foreach($clientes as $c): ?>
                    <option value="<?= $c['id'] ?>"><?= $c['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Data do Pedido</label>
            <input type="date" name="data" class="form-control" required value="<?= date('Y-m-d') ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Tipo de Serviço</label>
            <select name="servico" class="form-select" required>
                <?php foreach($servicos as $s): ?>
                    <option value="<?= $s['id'] ?>"><?= $s['nome'] ?> (R$ <?= $s['valor'] ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Item (Roupa)</label>
            <select name="item" class="form-select" required>
                <?php foreach($itens as $i): ?>
                    <option value="<?= $i['id'] ?>"><?= $i['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Observações</label>
        <textarea name="obs" class="form-control" rows="2"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Pedido</button>
</form>

<?php require("rodape.php"); ?>