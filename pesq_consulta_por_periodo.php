<?php
include_once("conexao.php");
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da pesquisa</title>
</head>
<body>
    <h2><p align="center">Pesquisa de Consultas</h2>
    <table border = "1" width="100%">
        <tr>
            <th>ID</th>
            <th>CÓDIGO PACIENTE</th>
            <th>NOME DO PACIENTE</th>
            <th>CÓDIGO MÉDICO</th>
            <th>NOME DO MÉDICO</th> 
            <th>DATA</th>
        </tr>
    <?php
    $sql = "SELECT c.id AS id_consulta, c.id_paciente, p.nome AS nome_paciente, c.id_medico, m.nome AS nome_medico, c.data
            FROM consulta c
            JOIN paciente p ON c.id_paciente = p.id
            JOIN medico m ON c.id_medico = m.id
            WHERE c.data BETWEEN '$data_inicio' AND '$data_fim'
            ORDER BY c.data";

    $resu = mysqli_query($con, $sql) or die(mysqli_error($con));
    while ($registro = mysqli_fetch_array($resu)){
        $id = $registro['id_consulta'];
        $id_paciente = $registro['id_paciente'];
        $nome_paciente = $registro['nome_paciente'];
        $cod_medico = $registro['id_medico'];
        $nome_medico = $registro['nome_medico'];
        $data = $registro['data'];
        echo"<tr>";
        echo "<td>".$id."</td>";
        echo "<td>".$id_paciente."</td>";
        echo "<td>".$nome_paciente."</td>";
        echo "<td>".$cod_medico."</td>"; // Alterado de '$id_medico' para '$cod_medico'
        echo "<td>".$nome_medico."</td>";
        echo "<td>".$data."</td>";
        echo "</tr>";
    }
    mysqli_close($con);
    ?>
    </table>
    <br><a href="consulta_consulta.php">Voltar</a><br>
</body>
</html>
