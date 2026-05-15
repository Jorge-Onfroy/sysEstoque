<?php

include('auth.php');
include('conexao.php');

$produto = $_POST['produto'];
$categoria = $_POST['categoria'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];

$sql = "INSERT INTO produtos
(produto, categoria, quantidade, preco)

VALUES

('$produto', '$categoria', '$quantidade', '$preco')
";

mysqli_query($conn, $sql);

header('Location: index.php');

?>