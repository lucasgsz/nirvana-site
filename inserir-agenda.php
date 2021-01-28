<?php
include('conexao.php');

 /* Pega as info do form */
 $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
 $data1 = mysqli_real_escape_string($conexao, $_POST['data']);
 $newDate = date("d/m/Y", strtotime($data1));
 $horario = mysqli_real_escape_string($conexao, $_POST['horario']);

 /* Verifica se as variaveis estão vazias */
 if($cidade == null or $data1 == null or $horario == null){
  header("Location: cadastro-agenda.php");
 }else{
   /* Insere na tabela com as var */
  $inserir_agenda = "INSERT INTO agenda (id, cidade, data, horario) VALUES (0, '$cidade','$newDate', '$horario')";
 }

 /* faz a query da conexao com a inserção  */
 $rs =mysqli_query($conexao, $inserir_agenda);

 /* Retorna para o index */
 header("Location: index.php"); 
