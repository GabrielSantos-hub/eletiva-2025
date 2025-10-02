<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 1 - Contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-4">
        <h1 class="mb-4">Exercício 1 - Contatos</h1>

        <form method="post" class="mb-4">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <div class="row g-2 align-items-end mb-2">
                    <div class="col-md-6">
                        <label for="nome<?= $i ?>" class="form-label">Informe o <?= $i ?>º nome</label>
                        <input type="text" id="nome<?= $i ?>" name="nome[]" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telefone<?= $i ?>" class="form-label">Informe o <?= $i ?>º telefone</label>
                        <input type="tel" id="telefone<?= $i ?>" name="telefone[]" class="form-control" required>
                    </div>
                </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomes = $_POST['nome'] ?? [];
            $telefones = $_POST['telefone'] ?? [];
            $contatos = [];

            for ($i = 0; $i < count($nomes); $i++) {
                $nome = $nomes[$i];
                $telefone = $telefones[$i];
                if (array_key_exists($nome, $contatos) || in_array($telefone, $contatos)) {
                    echo "Contato duplicado ignorado: $nome - $telefone<br>";
                    continue;
                } else {
                    $contatos[$nome] = $telefone;
                }
            }
            ksort($contatos);
            if (!empty($contatos)) {
                echo "<h4 class='mt-3'>Lista de Contatos</h4>";
                echo "<ul class='list-group'>";
                foreach ($contatos as $nome => $telefone) {
                    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                    echo "$nome ---- $telefone";
                    echo "</li>";
                }
                echo "</ul>";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>