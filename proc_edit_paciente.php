<?php
session_start();
include("conexao.php");

// Recupera os dados do formulário
$id = $_POST['id'];
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$tel_celular = $_POST['tel_celular'];
$tel_fixo = $_POST['tel_fixo'];

// Atualiza os dados do paciente no banco de dados
$result = "UPDATE paciente SET cpf = '$cpf', nome='$nome', tel_celular = '$tel_celular', tel_fixo = '$tel_fixo' WHERE id ='$id'";
$resultado = mysqli_query($con, $result);

// Verifica se a atualização foi realizada com sucesso
if ($resultado) {
    $_SESSION['msg'] = "<p style='color:green;'>Paciente alterado com sucesso!!!</p>";
    header("Location: alter_paciente.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro na atualização: " . mysqli_error($con) . "</p>";
    header("Location: alter_paciente.php");
}

mysqli_close($con);
?>
