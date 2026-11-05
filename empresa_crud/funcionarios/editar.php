<?php
require_once "../conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(400);
    exit("ID de funcionário inválido.");
}

$stmt = mysqli_prepare($conexao, "SELECT id, nome, email, cargo, salario, data_admissao FROM funcionarios WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$funcionario = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($stmt);

if (!$funcionario) {
    http_response_code(404);
    exit("Funcionário não encontrado.");
}

function escapar($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar funcionário</title>
</head>
<body>
    <?php include "../menu.php"; ?>
    <main>
        <h1 style="margin-bottom: 16px;">Editar funcionário</h1>
        <form action="atualizar.php" method="post" style="width: 100%;">
            <input type="hidden" name="id" value="<?= (int) $funcionario["id"] ?>">

            <label for="nome" style="display: inline-block; margin-bottom: 6px;">Nome:</label><br>
            <input type="text" id="nome" name="nome" maxlength="100" value="<?= escapar($funcionario["nome"]) ?>" required style="box-sizing: border-box; margin-bottom: 14px; padding: 10px 14px; width: 100%;"><br>

            <label for="email" style="display: inline-block; margin-bottom: 6px;">E-mail:</label><br>
            <input type="email" id="email" name="email" maxlength="200" value="<?= escapar($funcionario["email"]) ?>" style="box-sizing: border-box; margin-bottom: 14px; padding: 10px 14px; width: 100%;"><br>

            <label for="cargo" style="display: inline-block; margin-bottom: 6px;">Cargo:</label><br>
            <input type="text" id="cargo" name="cargo" maxlength="50" value="<?= escapar($funcionario["cargo"]) ?>" required style="box-sizing: border-box; margin-bottom: 14px; padding: 10px 14px; width: 100%;"><br>

            <label for="salario" style="display: inline-block; margin-bottom: 6px;">Salário:</label><br>
            <input type="number" id="salario" name="salario" min="0" step="0.01" value="<?= escapar($funcionario["salario"]) ?>" required style="box-sizing: border-box; margin-bottom: 14px; padding: 10px 14px; width: 100%;"><br>

            <label for="data_admissao" style="display: inline-block; margin-bottom: 6px;">Data de admissão:</label><br>
            <input type="date" id="data_admissao" name="data_admissao" value="<?= escapar($funcionario["data_admissao"]) ?>" required style="box-sizing: border-box; margin-bottom: 14px; padding: 10px 14px; width: 100%;"><br>

            <button type="submit" style="margin-right: 8px; padding: 10px 14px;">Salvar alterações</button>
            <a href="listar.php" style="padding: 10px 14px;">Cancelar</a>
        </form>
    </main>
</body>
</html>