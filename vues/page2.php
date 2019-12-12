<?php 
if(!isset($_SESSION["id"])) {
        // On n est pas connecté, il faut retourner à la pgae de login
        message("Veuillez vous connecter !");
        header("Location:index.php?action=login");
    }



    

?>

Bienvenu sur la page 2 du super site.

