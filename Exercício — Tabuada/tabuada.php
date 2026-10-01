<?php
$n1 = isset($_POST['num1']) ? (int)$_POST['num1'] : 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Resultado da Tabuada</title>
</head>

<body>

    <h1>Tabuada do <?php echo $n1; ?></h1>
    <hr>

    <table border="1">
        <thead>
            <tr>
                <th>Operação</th>
                <th>Resultado</th>
            </tr>
        </thead>

        <tbody>
            <?php

            /*
            for ($i = 1; $i <= 10; $i++) {
                $resultado = $n1 * $i;

                echo "<tr>";
                echo "<td>$n1 x $i</td>";
                echo "<td>$resultado</td>";
                echo "</tr>";
            }
            */

            $i = 1;

            while ($i <= 10) {
                $resultado = $n1 * $i;

                echo "<tr>";
                echo "<td>$n1 x $i</td>";
                echo "<td>$resultado</td>";
                echo "</tr>";

                $i++;
            }

            ?>
        </tbody>
    </table>

    <br>

    <a href="index.html">Voltar</a>

</body>
</html>