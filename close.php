<?php

// Inicia a sessão
session_start();
 
// Destrói a sessão
session_destroy();
echo "<script>window.location='login.php';</script>";
header('Location: login.php');
?>