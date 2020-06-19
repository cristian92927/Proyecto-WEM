<?php 
session_start();
$_SESSION['id_user']=null;
session_destroy();
header('Location: ../../index.php');
?>