<?php
session_start();
include("conexao.php");

$id = $_POST['id'];
$crm = $_POST['crm'];
$nome = $_POST['nome'];
$tel_celular = $_POST['tel_celular'];
$tel_fixo = $_POST['tel_fixo'];

$result = "UPDATE medico SET crm = '$crm', nome='$nome', tel_celular = '$tel_celular', tel_fixo = '$tel_fixo' WHERE id ='$id'";
$resultado = mysqli_query($con, $result);

if ($resultado) {
    $_SESSION['msg'] = "<p style='color:green;'>Médico alterado com sucesso!!!</p>";
    header("Location: alter_medico.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro na atualização: " . mysqli_error($con) . "</p>";
    header("Location: alter_medico.php");
}

mysqli_close($con);
?>
