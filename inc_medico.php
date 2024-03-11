<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}
$crm = $_POST['crm'];
$nome = $_POST['nome'];
$tel_celular = $_POST['tel_celular'];
$tel_fixo = $_POST['tel_fixo'];
$id_especialidade = $_POST['especialidade'];

include('conexao.php');

$query = "INSERT INTO medico (crm, nome, tel_celular, tel_fixo, id_especialidade) 
VALUES ('$crm', '$nome', '$tel_celular', '$tel_fixo', '$id_especialidade')";
$resu = mysqli_query($con, $query);

if ($resu) {
    echo "Inclusão realizada com sucesso!!";
} else {
    echo "Erro ao executar a query: " . mysqli_error($con);
}

// Fecha a conexão com o banco de dados
mysqli_close($con);
?>

