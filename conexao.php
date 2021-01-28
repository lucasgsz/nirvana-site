<?php
define('HOST', '127.0.0.1');
define('USUARIO','root');
define('SENHA', '');
define('DATABASE', 'projeto-nirvana');
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DATABASE) or die('sem conexão com banco de dados');