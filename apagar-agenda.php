<?php
session_start();
include("conexao.php");
$idagenda = $_GET['idagenda'];
echo ($idagenda);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$result_usuario = "DELETE FROM agenda WHERE id=$idagenda";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
  if(mysqli_affected_rows($conexao)){
    header("Location: index.php#agenda");
}