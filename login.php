<!DOCTYPE html>
<html>

<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h1>Login</h1>

<form action="validar.php" method="POST">

    <input 
        type="text" 
        name="usuario"
        class="form-control mb-3"
        placeholder="Email"
    >

    <input 
        type="password" 
        name="senha"
        class="form-control mb-3"
        placeholder="Senha"
    >

    <button class="btn btn-dark">
        Entrar
    </button>

</form>

</body>
</html>