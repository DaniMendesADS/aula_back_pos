<?php
    include_once("conexao.php");
    $pesq_1 = $_POST['especialidade'];
    $pesq_2 = $_POST['sigla'];
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
        <h2><p align="center">Pesquisa de Especialidade</h2>
        <table border = "1" width="100%">
            <tr>
                <th>ID</th>
                <th>Especialidade</th>
                <th>Sigla</th>
              
            </tr>
    <?php
        if (empty($pesq_1)&&(empty($pesq_2))){
            $sql = "SELECT * FROM especialidade ORDER BY especialidade";
        }elseif(!empty($pesq_1)&&(empty($pesq_2))){
            $sql = "SELECT * FROM especialidade WHERE especialidade like '%$pesq_1%' ORDER BY especialidade";
        }elseif(empty($pesq_1)&&(!empty($pesq_2))){
            $sql = "SELECT * FROM especialidade WHERE sigla = '$pesq_2' ORDER BY especializada";
        }else{
            $sql = "SELECT * FROM especialidade WHERE especialidade like '%$pesq_1%' or sigla = '$pesq_2' ORDER BY especialidade";
        }
        $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados!");
    while ($registro = mysqli_fetch_array($resultado)){
        $id = $registro['id'];
        $especialidade = $registro['especialidade'];
        $sigla = $sigla['sigla'];
        echo"<tr>";
        echo "<td>".$id."</td>";
        echo "<td>".$especialidade."</td>";
        echo "<td>".$sigla."</td>";
        echo "</tr>";
    }
    mysqli_close($con);
    echo "</table>";
    ?>
    <br><a href="consulta_especialidade.php">Voltar</a><br>
</body>
</html>