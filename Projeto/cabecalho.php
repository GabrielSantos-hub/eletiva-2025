<?php
session_start();
//REUSO Em todas as páginas 
// Verifica se o usuário está logado
if (!isset($_SESSION['acesso'])) header('location: index.php');
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lavanderia System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f7fbff;
      color: #455a64;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
      background-color: #bbdefb !important;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand,
    .nav-link {
      color: #0d47a1 !important;
      font-weight: 500;
    }

    .btn-primary {
      background-color: #90caf9;
      border: none;
      color: #0d47a1;
    }

    .btn-primary:hover {
      background-color: #64b5f6;
      color: #fff;
    }

    .btn-success {
      background-color: #a5d6a7;
      border: none;
      color: #1b5e20;
    }

    .btn-warning {
      background-color: #ffe082;
      border: none;
      color: #ff6f00;
    }

    .table-striped>tbody>tr:nth-of-type(odd)>* {
      background-color: #e3f2fd;
    }

    h1,
    h2 {
      color: #1565c0;
      margin-bottom: 20px;
    }

    .card {
      border: none;
      background-color: #ffffff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      border-radius: 12px;
    }

    @media print {
      .no-print {
        display: none !important;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg no-print">
    <div class="container">
      <a class="navbar-brand" href="principal.php">🫧 Lavanderia</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link" href="pedidos.php">Pedidos </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="relatorio.php">Relatório Geral</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropCad" role="button" data-bs-toggle="dropdown">
              Cadastros
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="clientes.php">Clientes </a></li>
              <li><a class="dropdown-item" href="tipos_servico.php">Tipos de Serviço </a></li>
              <li><a class="dropdown-item" href="itens_roupa.php">Itens de Roupa </a></li>
            </ul>
          </li>

        </ul>

        <span class="navbar-text me-3 text-muted small">Olá, <?= $_SESSION['nome'] ?></span>
        <a href="logout.php" class="btn btn-sm btn-outline-danger">Sair</a>
      </div>
    </div>
  </nav>
  <div class="container py-4">