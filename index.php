<?php

include('auth.php');
include('conexao.php');

$sql = "SELECT * FROM produtos";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Estoque</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>
            Bem vindo <?php echo $_SESSION['usuario']; ?>, como vai?
        </h1>

        <a href="logout.php" class="btn btn-dark">
            Sair
        </a>

    </div>

    <section>

        <a href="adicionar.php" class="btn btn-success mb-3">
            Novo Produto
        </a>

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>

                </thead>

                <tbody>

                    <?php while($produto = mysqli_fetch_assoc($resultado)){ ?>

                    <tr>

                        <td>
                            <?php echo $produto['id']; ?>
                        </td>

                        <td>
                            <?php echo $produto['produto']; ?>
                        </td>

                        <td>
                            <?php echo $produto['categoria']; ?>
                        </td>

                        <td>
                            <?php echo $produto['quantidade']; ?>
                        </td>

                        <td>
                            R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                        </td>

                        <td>

                            <?php

                            if($produto['quantidade'] > 5){

                                echo '
                                <span class="badge bg-success">
                                    Em estoque
                                </span>
                                ';

                            }elseif($produto['quantidade'] > 0){

                                echo '
                                <span class="badge bg-warning text-dark">
                                    Estoque baixo
                                </span>
                                ';

                            }else{

                                echo '
                                <span class="badge bg-danger">
                                    Sem estoque
                                </span>
                                ';

                            }

                            ?>

                        </td>

                        <td>

                            <?php if($_SESSION['cargo'] == 'admin'){ ?>

                                <a href="#" class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <a
                                    href="excluir.php?id=<?php echo $produto['id']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Deseja realmente excluir?')"
                                >
                                    Excluir
                                </a>

                            <?php } ?>

                        </td>

                    </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </section>

</body>

</html> 