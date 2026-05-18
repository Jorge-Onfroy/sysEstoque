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

<form onsubmit="return validarForm()" action="salvar.php" method="POST">

    <input
        type="text"
        name="produto"
        class="form-control mb-3"
        placeholder="Produto"
        required
    >

    <input
        type="text"
        name="categoria"
        class="form-control mb-3"
        placeholder="Categoria"
        required
    >

    <input
        type="number"
        name="quantidade"
        class="form-control mb-3"
        placeholder="Quantidade"
        min="0"
        required
    >

    <input
        type="number"
        name="preco"
        class="form-control mb-3"
        placeholder="Preço"
        min="0"
        required
    >

    <button class="btn btn-success">
        Salvar
    </button>
    
    <script>

function validarForm(){

    let quantidade = document.getElementsByName('quantidade')[0].value;

    let preco = document.getElementsByName('preco')[0].value;

    if(quantidade < 0){

        alert('Quantidade não pode ser negativa');

        return false;

    }

    if(preco < 0){

        alert('Preço não pode ser negativo');

        return false;

    }

    return true;

}

</script>

</form>

</body>
</html>