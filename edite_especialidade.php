<?php
session_start();
include_once("conexao.php");

$id_especialidade = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result = "SELECT * FROM especialidade WHERE id = '$id_especialidade'";
$resultado = mysqli_query($con, $result);

if (isset($resultado) && mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Especialidade</title>
</head>
<body>
    <h1>Edição de Especialidade</h1>
    <?php
    if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="proc_edit_especialidade.php">
        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
        <p>
            <label>Especialidade:</label>
            <input type="text" name="especialidade" size="50" value="<?php echo $row['especialidade']; ?>">
        </p>
        <p>
            <label>Sigla:</label>
            <input type="text" name="sigla" size="3" maxlength="3" value="<?php echo $row['sigla']; ?>">
        </p>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
<?php
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Especialidade não encontrada</p>";
    header("Location: alter_especialidade.php");
}
?>
