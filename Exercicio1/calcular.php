<?php
// Dados recebidos do formulário
$nome = $_POST['tnome'];
$anoNasc = (int) $_POST['tano'];
$anoAtual = (int) date('Y'); // Obtem o ano do sistema

// Processamento
$idade = $anoAtual - $anoNasc;
$idadeDias = $idade * 365.25;
$idadeHoras = $idadeDias * 24;
$idadeMin = $idadeHoras * 60;
$qtdBatimentos = $idadeMin * 75;
$qtdRespiracao = $idadeMin * 17;
$batimentosRestantes = 3747384000 - $qtdBatimentos;
$repiracoesRestantes = 849407040 - $qtdRespiracao;

if ($batimentosRestantes < 0) {
    $batimentosRestantes = "Você excedeu a expectativa de vida do nosso sistema";
}
if ($repiracoesRestantes < 0) {
    $repiracoesRestantes = "Você excedeu a expectativa de vida do nosso sistema";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempo de vida</title>
</head>
<body>
    <h1>Tempo de vida</h1>
    <hr>
    <h2><?php echo "$nome, sua idade é $idade anos"?></h2>
    <h2><?php echo "Você tem $idadeDias dias, $idadeHoras horas e $idadeMin minutos de vida"?></h2>
    <h2><?php echo "Seu coração já bateu $qtdBatimentos vezes "?></h2>
    <h2><?php echo "Você já respirou $qtdRespiracao vezes"?></h2>
    <h2><?php echo "Batimentos cardiacos restantes: $batimentosRestantes "?></h2>
    <h2><?php echo "Respirações restantes restantes: $repiracoesRestantes "?></h2>
    
    
    
</body>
</html>