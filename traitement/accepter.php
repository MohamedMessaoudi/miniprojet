<?php
 
    $sql ="UPDATE lien SET etat='ami' WHERE idUtilisateur2=? AND idUtilisateur1=? AND etat='attente'";
    $query = $pdo->prepare($sql);
    $query->execute(array($_SESSION["id"],$_GET["id"]));

    header('Location:index.php?action=amis');

?>