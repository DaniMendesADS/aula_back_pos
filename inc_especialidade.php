<?php
$descricao = $_POST['especialidade'];
$sigla = $_POST['sigla'];

// Inclua o arquivo de conexão
include('conexao.php');

// Query SQL corrigida
$query = "INSERT INTO especialidade (especialidade, sigla) VALUES ('$descricao', '$sigla')";
$resultado = mysqli_query($con, $query);

// Verifica se a inserção foi bem-sucedida
if ($resultado) {
    // Verifica se algum registro foi afetado
    if (mysqli_affected_rows($con) > 0) {
        echo "Inclusão realizada com sucesso!!";
    } else {
        echo "Erro: Nenhum registro foi afetado.";
    }
} else {
    // Se houver erro na execução da query
    echo "Erro ao executar a query: " . mysqli_error($con);
}

// Fecha a conexão com o banco de dados
mysqli_close($con);
?>
