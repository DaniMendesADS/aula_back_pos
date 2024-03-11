<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pesquisa de Pacientes</title>
    </head>
    <body>
        <h3>Pesquisa de pacientes</h3><br>
        <form action="pesquisa_resultado_paciente.php" method="POST">
            <label>Nome:</label><input type="text" name="nome" size="100"/>
            <label>CPF:</label><input type="text" name="cpf" maxlength="11"/>
            <p><input type="submit" name="enviar" value="Enviar"/> <input type="reset" name="limpar" value="Limpar"/>
        </form>
    </body>
</html>