<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$id_paciente = $_POST['id_paciente'];
$id_medico = $_POST['id_medico'];
$data = $_POST['data']; 

include('conexao.php');

$query = "INSERT INTO consulta (id_paciente, id_medico, data) 
VALUES ('$id_paciente', '$id_medico', '$data')";
$resu = mysqli_query($con, $query);

if ($resu) {
    echo "Inclusão realizada com sucesso!!";
} else {
    echo "Erro ao executar a query: " . mysqli_error($con);
}

mysqli_close($con);
?>
