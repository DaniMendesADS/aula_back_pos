<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}
include("conexao.php");

$id = $_POST['id'];

$verif="SELECT * FROM especialidade WHERE id_especialidade='$id'";
$resu = mysqli_query($con, $verif);
$result = "DELETE FROM especialidade WHERE id='$id'";
$resultado = mysqli_query($con, $result);

    if(mysqli_affected_rows($con)){
       $_SESSION['msg'] = "<p style='color:green;'>Categoria excluída com sucesso!!</p>";
       header("Location: alter_especialidade.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Categoria não foi cadastrada!!</p>";
        header("Location: alter_especialidade.php");
    }

mysqli_close($con);
?>
