<?php
ob_start();
include('db.php');

if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['idx'])){
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
	  header("Location: login.php");
	  exit;
}else{
	$nomex=$_SESSION["nomex"];
	$idx=$_SESSION["idx"];
	$loginx=$_SESSION["loginx"];
	//$departamentox=$_SESSION["departamentox"];	
}
?>