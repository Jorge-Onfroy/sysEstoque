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

    <title>Vendas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

    <h1 class="mb-4">
        Nova Venda
    </h1>

    <form action="salvarVenda.php" method="POST">

        <!-- PRODUTO -->
        <label class="form-label">
            Produto
        </label>

        <select
            name="produto_id"
            id="produto"
            class="form-select mb-3"
            onchange="calcularTotal()"
            required
            >

            <option value="">
                Selecione um produto
            </option>

            <!-- VALUE = ID -->
            <!-- DATA-PRECO = PREÇO -->
            <?php while($produto = mysqli_fetch_assoc($resultado)){ ?>

                <option
                    value="<?php echo $produto['id']; ?>"
                    data-preco="<?php echo $produto['preco']; ?>"
                >

                    <?php echo $produto['produto']; ?>

                </option>

            <?php } ?>
        </select>

        <!-- QUANTIDADE -->
        <label class="form-label">
            Quantidade
        </label>

        <input
            type="number"
            name="quantidade_vendida"
            id="quantidade"
            class="form-control mb-3"
            min="1"
            value="1"
            onkeyup="calcularTotal()"
            required
            >

        <!-- PAGAMENTO -->
        <label class="form-label">
            Forma de pagamento
        </label>

        <select
            name="pagamento"
            class="form-select mb-4"
            required
            >
            <option value="">
                Selecione
            </option>
            <option value="pix">
                PIX
            </option>
            <option value="cartao">
                Cartão
            </option>
            <option value="dinheiro">
                Dinheiro
            </option>
        </select>

        <!-- TOTAL -->
        <div class="alert alert-dark">
            Total da venda:
            <strong id="total">
                R$ 0,00
            </strong>
            <input
            type="hidden"
            name="total"
            id="inputTotal"
            >
        </div>
        <button class="btn btn-success">
            Finalizar Venda
        </button>
        <button class="btn btn-sucess">
            <a href="index.php">Voltar</a>
        </buton>

    </form>

    <script>

        function calcularTotal(){
            let produto = document.getElementById('produto');
            let quantidade = document.getElementById('quantidade').value;
            let preco = produto.options[produto.selectedIndex].dataset.preco;
            let totalElemento = document.getElementById('total');

            if(preco){
                let total = preco * quantidade;
                document.getElementById('inputTotal').value = total;
                totalElemento.innerHTML =
                    'R$ ' + total.toFixed(2);
            }
        }
    </script>

</body>

</html>