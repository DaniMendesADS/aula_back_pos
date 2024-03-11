<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusão de Consulta</title>
</head>
<body>
    <h1>Inclusão de Consulta</h1>
    <form action="inc_consulta.php" method="POST">
        <label for="id_paciente">Paciente:</label>
        <select name="id_paciente" id="id_paciente">
            <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "clinica";

            $conn = new mysqli($servername, $username, $password, $dbname);

            
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            $sql = "SELECT id, nome FROM paciente";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nome"] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum paciente encontrado</option>";
            }

            $conn->close();
            ?>
        </select><br><br>

        <label for="id_medico">Médico:</label>
        <select name="id_medico" id="id_medico">
            <?php
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            $sql = "SELECT id, nome FROM medico";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nome"] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum médico encontrado</option>";
            }

            $conn->close();
            ?>
        </select><br><br>

        <label for="data">Data da Consulta:</label>
        <input type="date" id="data" name="data" required><br><br>

        <input type="submit" value="Incluir">
        <input type="reset" value="Limpar">
    </form>
</body>
</html>
