<!DOCTYPE html>
<html>
<head>
    <title>Inclusão de Médicos</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Inclusão de médicos</h1>
    <form action="inc_medico.php" method="POST">
        <label for="crm">CRM:</label>
        <input type="text" id="crm" name="crm" size="20" maxlength="20" required><br><br>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" size="120" required><br><br>

        <label for="tel_celular">Celular:</label>
        <input type="text" id="tel_celular" name="tel_celular" size="20" maxlength="20" required><br><br>

        <label for="tel_fixo">Telefone fixo:</label>
        <input type="text" id="tel_fixo" name="tel_fixo" size="20" maxlength="20" required><br><br>

        <label for="especialidade">Especialidade:</label>
        <select id="especialidade" name="especialidade">
            <option value="">Selecione</option>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "clinica";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            $sql = "SELECT id, especialidade FROM especialidade"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["especialidade"] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhuma categoria encontrada</option>";
            }

            $conn->close();
            ?>
        </select><br><br>

        <input type="submit" value="Incluir">
        <input type="reset" value="Limpar">
        <p><a href="menu_inicial.html">Home</a>
    </form>
</body>
</html>
