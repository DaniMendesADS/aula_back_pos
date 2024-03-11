<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $tel_celular = $_POST['tel_celular'];
    $tel_fixo = $_POST['tel_fixo'];

    include('conexao.php');

    $query = "INSERT INTO paciente (cpf, nome, tel_celular, tel_fixo) 
              VALUES ('$cpf', '$nome', '$tel_celular', '$tel_fixo')";
    $resu = mysqli_query($con, $query);

    if ($resu) {
        echo "Inclusão realizada com sucesso!!";
    } else {
        echo "Erro ao executar a query: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "O formulário não foi enviado corretamente.";
}
?>
