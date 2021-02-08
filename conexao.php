<?php
define('HOST', '127.0.0.1');
define('USUARIO','admin');
define('SENHA', '123456');
define('DATABASE', 'projeto-nirvana');
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DATABASE) or die('sem conexão com banco de dados');