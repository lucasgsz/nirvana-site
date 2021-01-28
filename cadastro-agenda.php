<?php
include('verifica-login.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <title>Login - Nirvana</title>
    <link rel="stylesheet" href="css/style-login.css" />
  </head>
  <body>
    <form action="inserir-agenda.php" method="POST">
      <div class="login">
        <div class="blocoLogin">
          <a>Cadastro Agenda</a>
          <input name="cidade" type="text" placeholder="Cidade:" />
          <input name="data" type="date" placeholder="Data:" />
          <input name="horario" type="time" placeholder="Horario:" />
          <button type="submit">Cadastrar</button>
        </div>
      </div>
    </form>
  </body>
</html>
