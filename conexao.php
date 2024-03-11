<?php

// Configurações de acesso ao banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'clinica';

// Conexão com o banco de dados utilizando o MySQLi
$con = new mysqli($host, $user, $password, $database);

// Verifica se houve algum erro na conexão
if ($con->connect_error) {
    die('Erro na conexão: ' . $con->connect_error);
}

// Configura o charset da conexão para utf8
$con->set_charset('utf8');

?>
