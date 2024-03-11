<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Especialidade</title>
    </head>
    <body>
        <?php
            if(isset($_SESSION['msg']))
            {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="inc_especialidade.php">
        <p><center><h1>Especialidade</center></h1>
        <table border="1" width="100%">
        <?php
            include ('conexao.php');
            $sql = "SELECT * FROM especialidade order by especialidade";
            $resu = mysqli_query($con, $sql) or die(mysqli_connect_error());
            while($reg = mysqli_fetch_array($resu))
            {
                    echo "<tr><td>".$reg['id']."</td>";
                    echo "<td>".$reg['especialidade']."</td>";
                    echo "<td>".$reg['sigla']."</td>";
                    echo "<td><a href='edite_especialidade.php?id=".$reg['id']."'>Editar</a></td>";
                    echo "<td><a href='del_especialidade.php?id=".$reg['id']."'>Excluir</a></td>";
            }   
        ?>
        </table>
        <p><a href="menu_inicial.html">Home</a>
        </form>
        <?php
            mysqli_close($con);
        ?>
    </body>
</html>
