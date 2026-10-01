<?php
$nome = $_POST['nome'];
$total = (float) $_POST['total'];
$idade = (int) $_POST['idade'];
if (isset($_POST['cartao']))
    {
        $cartao = "sim";
    }
else
    {
        $cartao = "não";
    }


$descontoIdade = 0;
$descontoCartao = 0;

if ($idade ==  0 )
    {
        $descontoIdade = 0;
    }
else if ($idade == 1)
    {
        $descontoIdade = 5;
    }
else
    {
        $descontoIdade = 7;
    }

if ($cartao == 'sim')
    {
        $descontoCartao = 5;
    }

$valorDescontoIdade = $total * ($descontoIdade/100);
$valorDescontoCartao = $total * ($descontoCartao/100);
$valorFinal = $total - $valorDescontoIdade - $valorDescontoCartao;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia</title>
    <link rel="stylesheet" href="style-farmacia.css">
</head>
<body>
    <h1>Farmácia Paracetaloka</h1>
    <hr>
    <h2><?php echo "Nome: $nome"?></h2>
    <h2><?php echo "Cartão fidelidade: $cartao"?></h2>
    <h2><?php echo "Desconto por idade: $descontoIdade%"?></h2>
    <h2><?php echo "Desconto do cartão: $descontoCartao%"?></h2>
    <h2><?php echo "Valor de pedido: R$$total,00"?></h2>
    <h2><?php echo "Valor com desconto aplicado: R$$valorFinal,00"?></h2>

    <div class="parcelas">
        <h3>Parcelamento (usando for)</h3>
        <?php
        for ($i = 1; $i <= 6; $i++)
            {
                $parcela = $valorFinal / $i;
                echo "<p>{$i}x de R$ " . number_format($parcela, 2, ',', '.') . "</p>";
            }
        ?>
    </div>

    <div class="parcelas">
        <h3>Parcelamento (usando while)</h3>
        <?php
        $j = 1;
        while ($j <= 6)
            {
                $parcela = $valorFinal / $j;
                echo "<p>{$j}x de R$ " . number_format($parcela, 2, ',', '.') . "</p>";
                $j++;
            }
        ?>
    </div>
</body>
</html>