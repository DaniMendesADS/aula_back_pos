<?php
session_start();
include_once("conexao.php");

// Recupera o id do paciente da URL
$id_paciente = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Consulta o paciente pelo id
$result = "SELECT * FROM paciente WHERE id = '$id_paciente'";
$resultado = mysqli_query($con, $result);

if (isset($resultado) && mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Paciente</title>
</head>
<body>
    <h1>Edição de Paciente</h1>
    <?php
    if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="proc_edit_paciente.php">
        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
        <p>
            <label>CPF:</label>
            <input type="text" name="cpf" size="11" value="<?php echo $row['cpf']; ?>">
        </p>
        <p>
            <label>Nome:</label>
            <input type="text" name="nome" size="120" value="<?php echo $row['nome']; ?>">
        </p>
        <p>
            <label>Celular:</label>
            <input type="text" name="tel_celular" size="20" value="<?php echo $row['tel_celular']; ?>">
        </p>
        <p>
            <label>Fixo:</label>
            <input type="text" name="tel_fixo" size="20" value="<?php echo $row['tel_fixo']; ?>">
        </p>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
<?php
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Paciente não encontrado</p>";
    header("Location: alter_paciente.php");
}
?>
