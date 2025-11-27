<?php
    require("cabecalho.php");
    require("conexao.php");

    if(isset($_GET['id'])){
        $stmt = $pdo->prepare("SELECT * FROM item_roupa WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $acao = $_POST['acao'];

        try {
            if($acao == 'salvar'){
                $stmt = $pdo->prepare("UPDATE item_roupa SET nome=? WHERE id=?");
                $stmt->execute([$_POST['nome'], $id]);
                header('location: itens_roupa.php');
            } else if($acao == 'excluir'){
                $stmt = $pdo->prepare("DELETE FROM item_roupa WHERE id=?");
                $stmt->execute([$id]);
                header('location: itens_roupa.php');
            }
        } catch(Exception $e){
            echo "<div class='alert alert-danger'>Erro: Item em uso em algum pedido.</div>";
        }
    }
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4">Editar Item</h2>
        <form method="post" class="card p-4 border-0 shadow-sm">
            <input type="hidden" name="id" value="<?= $dados['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Nome da Peça</label>
                <input type="text" name="nome" class="form-control" value="<?= $dados['nome'] ?>" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="itens_roupa.php" class="btn btn-secondary">Voltar</a>
                <div>
                    <button type="submit" name="acao" value="excluir" class="btn btn-danger me-2" onclick="return confirm('Excluir este item?');">Excluir</button>
                    <button type="submit" name="acao" value="salvar" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require("rodape.php"); ?>