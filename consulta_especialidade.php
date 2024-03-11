<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pesquisa de Especialidades</title>
    </head>
    <body>
        <h3>Pesquisa de especialidades</h3><br>
        <form action="pesquisa_resultado_especialidade.php" method="POST">
            <label>Especialidade:</label><input type="text" name="especialidade" />
            <label>Sigla:</label><input type="text" name="sigla"/>
            <p><input type="submit" name="enviar" value="Enviar"/> <input type="reset" name="limpar" value="Limpar"/>
        </form>
    </body>
</html>