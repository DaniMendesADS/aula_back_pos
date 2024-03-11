<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}
include("conexao.php");

$id = $_POST['id'];

$verif="SELECT * FROM paciente WHERE id_paciente='$id'";
$resu = mysqli_query($con, $verif);
$result = "DELETE FROM paciente WHERE id='$id'";
$resultado = mysqli_query($con, $result);

    if(mysqli_affected_rows($con)){
       $_SESSION['msg'] = "<p style='color:green;'>Paciente excluído com sucesso!!</p>";
       header("Location: alter_paciente.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Paciente não foi excluído!!</p>";
        header("Location: alter_paciente.php");
    }

mysqli_close($con);
?>
