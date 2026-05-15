<?php
include('auth.php');
include('conexao.php');
?>

<!DOCTYPE html>
<html>

<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h1>Novo Produto</h1>

<form action="salvar.php" method="POST">

    <input
        type="text"
        name="produto"
        class="form-control mb-3"
        placeholder="Produto"
    >

    <input
        type="text"
        name="categoria"
        class="form-control mb-3"
        placeholder="Categoria"
    >

    <input
        type="number"
        name="quantidade"
        class="form-control mb-3"
        placeholder="Quantidade"
    >

    <input
        type="text"
        name="preco"
        class="form-control mb-3"
        placeholder="Preço"
    >

    <button class="btn btn-success">
        Salvar
    </button>

</form>

</body>
</html>