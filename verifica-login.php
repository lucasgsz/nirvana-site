<?php
session_start();
if(!$_SESSION['usuario']){
  header('Location: fazer-login.php');
  exit();
}else{
 
}