<?php
session_start();
include_once("conexao.php");

// Recupera o id do paciente da URL
$id_medico = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Consulta o paciente pelo id
$result = "SELECT * FROM medico WHERE id = '$id_medico'";
$resultado = mysqli_query($con, $result);

if (isset($resultado) && mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Médico</title>
</head>
<body>
    <h1>Edição de Médico</h1>
    <?php
    if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="proc_edit_medico.php">
        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
        <p>
            <label>CRM:</label>
            <input type="text" name="crm" size="20" value="<?php echo $row['crm']; ?>">
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
    $_SESSION['msg'] = "<p style='color:red;'>Médico não encontrado</p>";
    header("Location: alter_medico.php");
}
?>
