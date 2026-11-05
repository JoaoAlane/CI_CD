<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Método não permitido.");
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(400);
    exit("ID de funcionário inválido.");
}

require_once "../conexao.php";

$stmt = mysqli_prepare($conexao, "DELETE FROM funcionarios WHERE ID = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$removido = mysqli_stmt_affected_rows($stmt);
mysqli_stmt_close($stmt);

if ($removido !== 1) {
    http_response_code(404);
    exit("Funcionário não encontrado para exclusão.");
}

header("Location: listar.php?removido=1");
exit;