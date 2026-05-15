<?php

include('auth.php');
include('conexao.php');

if($_SESSION['cargo'] != 'admin'){

    die('Acesso negado');

}

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("
    DELETE FROM produtos
    WHERE id = ?
");

$stmt->bind_param("i", $id);

$stmt->execute();

header('Location: index.php');

exit();

?>