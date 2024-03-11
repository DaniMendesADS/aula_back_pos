<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}
include("conexao.php");
$id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM especialidade WHERE id = '$id'";
$resultado = mysqli_query($con, $result);
$row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Excluir </title>
</head>
<body>
    <h1>Excluir Especialidade</h1>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="proc_del_especialidade.php">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <p><label><b>Especialidade:<?php echo $row['especialidade']; ?></label>
        
        <p><input type="submit" value="Confirma exclusão">
    </form>
    </body>
</html>