<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}
include("conexao.php");

$id = $_POST['id'];

$verif="SELECT * FROM medico WHERE id_medico='$id'";
$resu = mysqli_query($con, $verif);
$result = "DELETE FROM medico WHERE id='$id'";
$resultado = mysqli_query($con, $result);

    if(mysqli_affected_rows($con)){
       $_SESSION['msg'] = "<p style='color:green;'>Médico excluído com sucesso!!</p>";
       header("Location: alter_medico.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Médico não foi excluído!!</p>";
        header("Location: alter_medico.php");
    }

mysqli_close($con);
?>
