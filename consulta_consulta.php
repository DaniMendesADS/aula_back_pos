<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Vendas por período</title>
</head>
<body>
    <h3>Pesquisa de Vendas por Período</h3><br>
    <form action="pesq_consulta_por_periodo.php" method="POST">
        <label>Data de início:</label><input type="date" name="data_inicio" required/>
        <label>Data do fim:</label><input type="date" name="data_fim" required/>
        <p><input type="submit" name="enviar" value="Enviar"/> <input type="reset" name="limpar" value="Limpar"/>
    </form>