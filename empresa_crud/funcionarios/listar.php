<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
    <style>
        .btn-editar {
            background: #ffc107;
            border: none;
            border-radius: 4px;
            color: #000;
            display: inline-block;
            padding: 6px 12px;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-editar:hover {
            background: #e0a800;
        }
        .btn-excluir {
            background: #dc3545;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            margin-left: 6px;
            padding: 6px 12px;
            transition: background 0.2s;
        }
        .btn-excluir:hover {
            background: #b02a37;
        }
    </style>
</head>
<body>
    <?php include '../menu.php'; ?>
    <h1>Funcionários</h1>
    <input type="button" value="Adicionar Funcionário" onclick="window.location.href='adicionar.php'">
    <table border="1" style="border-collapse: collapse; margin-top: 16px; width: 100%;">
        <thead>
            <tr>
                <th style="padding: 10px 14px; text-align: left;">Nome</th>
                <th style="padding: 10px 14px; text-align: left;">Email</th>
                <th style="padding: 10px 14px; text-align: left;">Cargo</th>
                <th style="padding: 10px 14px; text-align: left;">Salário</th>
                <th style="padding: 10px 14px; text-align: left;">Data de Admissão</th>
                <th style="padding: 10px 14px; text-align: left;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
           
            $conexao = new PDO("mysql:host=localhost;dbname=empresa", "root", "");

            $stmt = $conexao->prepare("SELECT * FROM funcionarios");
            $stmt->execute();
            $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach ($funcionarios as $funcionario): ?>
                <tr>
                    <td style="padding: 10px 14px;"><?php echo $funcionario['nome']; ?></td>
                    <td style="padding: 10px 14px;"><?php echo $funcionario['email']; ?></td>
                    <td style="padding: 10px 14px;"><?php echo $funcionario['cargo']; ?></td>
                    <td style="padding: 10px 14px;"><?php echo number_format($funcionario['salario'], 2, ',', '.'); ?></td>
                    <td style="padding: 10px 14px;"><?php echo date('d/m/Y', strtotime($funcionario['data_admissao'])); ?></td>
                    <td style="padding: 10px 14px; white-space: nowrap;">
                        <a href="editar.php?id=<?php echo (int) $funcionario['id']; ?>" class="btn-editar">Editar</a>
                        <form action="remover.php" method="post" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este funcionário?');">
                            <input type="hidden" name="id" value="<?php echo (int) $funcionario['id']; ?>">
                            <button type="submit" class="btn-excluir">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>