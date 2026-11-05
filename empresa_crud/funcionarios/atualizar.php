<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Método não permitido.");
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$cargo = trim($_POST["cargo"] ?? "");
$salario = $_POST["salario"] ?? "";
$dataAdmissao = $_POST["data_admissao"] ?? "";

if (!$id || $id < 1 || $nome === "" || $cargo === "" || !is_numeric($salario) || !is_finite((float) $salario) || (float) $salario < 0 || $dataAdmissao === "") {
    http_response_code(400);
    exit("Preencha os campos corretamente para atualizar o funcionário.");
}

require_once "../conexao.php";

$stmt = mysqli_prepare(
    $conexao,
    "UPDATE funcionarios SET nome = ?, email = ?, cargo = ?, salario = ?, data_admissao = ? WHERE id = ?"
);
mysqli_stmt_bind_param($stmt, "sssdsi", $nome, $email, $cargo, $salario, $dataAdmissao, $id);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) < 0) {
    mysqli_stmt_close($stmt);
    http_response_code(500);
    exit("Não foi possível atualizar o funcionário.");
}

mysqli_stmt_close($stmt);
header("Location: listar.php?atualizado=1");
exit;