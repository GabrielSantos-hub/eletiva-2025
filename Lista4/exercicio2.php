<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2 - Alunos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-4">
        <h1 class="mb-4">Exercício 2 - Alunos</h1>

        <form method="post" class="mb-4">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Aluno <?= $i ?></h5>
                        <div class="mb-2">
                            <label for="nome<?= $i ?>" class="form-label">Nome</label>
                            <input type="text" id="nome<?= $i ?>" name="nome[]" class="form-control" required>
                        </div>
                        <div class="row g-2">
                            <div class="col">
                                <label for="nota1_<?= $i ?>" class="form-label">Nota 1</label>
                                <input type="number" step="0.01" id="nota1_<?= $i ?>" name="nota1[]" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="nota2_<?= $i ?>" class="form-label">Nota 2</label>
                                <input type="number" step="0.01" id="nota2_<?= $i ?>" name="nota2[]" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="nota3_<?= $i ?>" class="form-label">Nota 3</label>
                                <input type="number" step="0.01" id="nota3_<?= $i ?>" name="nota3[]" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomes = $_POST['nome'] ?? [];
            $notas1 = $_POST['nota1'] ?? [];
            $notas2 = $_POST['nota2'] ?? [];
            $notas3 = $_POST['nota3'] ?? [];

            $alunos = [];

            for ($i = 0; $i < count($nomes); $i++) {
                $nome = $nomes[$i];
                $n1 = (float)$notas1[$i];
                $n2 = (float)$notas2[$i];
                $n3 = (float)$notas3[$i];

                $media = ($n1 + $n2 + $n3) / 3;
                $alunos[$nome] = $media;
            }


            arsort($alunos);

            if (!empty($alunos)) {
                echo "<h4 class='mt-3'>Lista de Alunos por Média</h4>";
                echo "<ul class='list-group'>";
                foreach ($alunos as $nome => $media) {
                    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                    echo "$nome ---". number_format($media, 2, ',', '.'); 
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