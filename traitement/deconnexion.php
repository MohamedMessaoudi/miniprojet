<?php

setcookie('remember', '', time() - 3600*24);
$sql = "UPDATE  user set remember=NULL where id=?";
$q = $pdo->prepare($sql);
$q->execute(array($_SESSION['id']));
    
session_destroy();
header("Location:index.php");