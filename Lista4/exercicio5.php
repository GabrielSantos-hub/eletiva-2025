<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-4">
        <h1 class="mb-4">Cadastro de Livros</h1>

        <form method="post">
            <?php for ($i = 1; $i <= 5; $i++): ?>
            <div class="row mb-3">
                <div class="col-6 mb-3">
                    <label for="titulo<?= $i ?>" class="form-label">Título <?= $i ?></label>
                    <input type="text" id="titulo<?= $i ?>" name="titulo[]" class="form-control" required>
                </div>
                <div class="col-6 mb-3">
                    <label for="est<?= $i ?>" class="form-label">Estoque <?= $i ?></label>
                    <input type="number" id="est<?= $i ?>" name="est[]" class="form-control" required>
                </div>
            </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulos = $_POST['titulo'];
            $estoque = $_POST['est'];

            $livros = [];
            for ($i = 0; $i < count($titulos); $i++) {
                $livros[$titulos[$i]] = (int)$estoque[$i];
            }

            ksort($livros);
            echo "<h4 class='mt-4'>Lista de Livros</h4>";
            echo "<ul class='list-group'>";
            foreach ($livros as $titulo => $qtd) {
                echo "<li class='list-group-item'>";
                echo "$titulo - Estoque: $qtd";
                if ($qtd < 5) {
                    echo "  Baixa quantidade!!";
                }
                echo "</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>