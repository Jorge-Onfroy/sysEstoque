<?php

include('auth.php');
include('conexao.php');

$produto = $_POST['produto'];
$categoria = $_POST['categoria'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];

if($quantidade < 0 || $preco < 0){

    die('Valores inválidos');

}

$stmt = $conn->prepare("
    INSERT INTO produtos
    (produto, categoria, quantidade, preco)

    VALUES

    (?, ?, ?, ?)
");

$stmt->bind_param(
    "ssid",
    $produto,
    $categoria,
    $quantidade,
    $preco
);

$stmt->execute();

header('Location: index.php');

?>