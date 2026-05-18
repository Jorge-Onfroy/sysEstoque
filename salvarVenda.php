<?php
include('auth.php');
include('conexao.php');

    $produto_id = $_POST['produto_id'];
    $quantidade = $_POST['quantidade_vendida'];
    $pagamento = $_POST['pagamento'];
    $valor = $_POST['total'];


if($quantidade < 0 || $total <0){
    die('Valores invalidos');

}
$stmt = $conn->prepare("

    INSERT INTO vendas
    (produto_id, quantidade_vendida, pagamento, total)
    VALUES
    (?, ?, ?, ?)
");

$stmt->bind_param(
    "iisd",
    $produto_id,
    $quantidade_vendida,
    $pagamento,
    $valor
);

$stmt->execute();

header('Location: index.php');


?>