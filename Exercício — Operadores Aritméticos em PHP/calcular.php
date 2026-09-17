<?php
$n1 = (float)$_POST['num1'];
$n2 = (float) $_POST['num2'];



$soma = $n1 + $n2;
$sub = $n1 - $n2;
$mult = $n1 * $n2;
$pot = $n1**$n2;
if ($n2 == 0){
    $div = 'Não é possível dividir por zero';
    $restdiv = 'Não é possível dividir por zero';
} else {
    $div = $n1 / $n2;
    $restdiv = $n1 % $n2;
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Calculadora PHP</h1>
    <hr>
    <h2><?php echo "A soma de $n1 e $n2 é: $soma"?></h2>
    <h2><?php echo "A subtração de $n1 e $n2 é: $sub"?></h2>
    <h2><?php echo "A multiplicação de $n1 e $n2 é: $mult"?></h2>
    <h2><?php echo "A divisão de $n1 e $n2 é: $div"?></h2>
    <h2><?php echo "O resto da divisão de $n1 e $n2 é: $restdiv"?></h2>
    <h2><?php echo "O potencia entre $n1 e $n2 é: $pot"?></h2>
    <h2><?php echo "A concatenação de $n1 e $n2 é: $n1$n2"?></h2>
   
    
    
    
</body>
</html>