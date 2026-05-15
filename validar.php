<?php

session_start();

include('conexao.php');

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

$stmt = $conn->prepare("
    SELECT * FROM usuarios
    WHERE usuario = ?
    AND senha = ?
");

$stmt->bind_param("ss", $usuario, $senha);

$stmt->execute();

$resultado = $stmt->get_result();

if($resultado->num_rows > 0){

    $dados = $resultado->fetch_assoc();

    $_SESSION['usuario'] = $dados['usuario'];

    $_SESSION['cargo'] = $dados['cargo'];

    header('Location: index.php');

    exit();

}else{

    echo "Login inválido";

}

?>