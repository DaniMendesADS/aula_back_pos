<?php
session_start();
include("conexao.php");

$id = $_POST['id'];
$especialidade = $_POST['especialidade'];
$sigla = $_POST['sigla'];

$result = "UPDATE especialidade SET especialidade = '$especialidade', sigla = '$sigla' WHERE id ='$id'";
$resultado = mysqli_query($con, $result);

if ($resultado) {
    $_SESSION['msg'] = "<p style='color:green;'>Especialidade atualizada com sucesso!</p>";
    header("Location: alter_especialidade.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao atualizar a especialidade: " . mysqli_error($con) . "</p>";
    header("Location: edit_especialidade.php?id=".$id);
}

mysqli_close($con);
?>

