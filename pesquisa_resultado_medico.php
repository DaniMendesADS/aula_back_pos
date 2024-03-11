<?php
    include_once("conexao.php");
    $pesq_1 = $_POST['nome'];
    $pesq_2 = $_POST['crm'];
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
        <h2><p align="center">Pesquisa de Paciente</h2>
        <table border = "1" width="100%">
            <tr>
                <th>ID</th>
                <th>CRM</th>
                <th>NOME</th>
                <th>tel_celular</th>
                <th>tel_fixo</th>
              
            </tr>
    <?php
        if (empty($pesq_1)&&(empty($pesq_2))){
            $sql = "SELECT * FROM medico ORDER BY nome";
        }elseif(!empty($pesq_1)&&(empty($pesq_2))){
            $sql = "SELECT * FROM medico WHERE nome like '%$pesq_1%' ORDER BY nome";
        }elseif(empty($pesq_1)&&(!empty($pesq_2))){
            $sql = "SELECT * FROM medico WHERE crm = '$pesq_2' ORDER BY nome";
        }else{
            $sql = "SELECT * FROM medico WHERE nome like '%$pesq_1%' or crm = '$pesq_2' ORDER BY nome";
        }
        $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados!");
    while ($registro = mysqli_fetch_array($resultado)){
        $id = $registro['id'];
        $crm = $registro['crm'];
        $nome = $registro['nome'];
        $tel_celular = $registro['tel_celular'];
        $tel_fixo = $registro['tel_fixo'];
        echo"<tr>";
        echo "<td>".$id."</td>";
        echo "<td>".$crm."</td>";
        echo "<td>".$nome."</td>";
        echo "<td>".$tel_celular."</td>";
        echo "<td>".$tel_fixo."</td>";
        echo "</tr>";
    }
    mysqli_close($con);
    echo "</table>";
    ?>
    <br><a href="consulta_medico.php">Voltar</a><br>
</body>
</html>