<?php
    if(isset($_SESSION["id"]   )) {
          
    
$sql = "SELECT * FROM lien WHERE (idUtilisateur1=? AND idUtilisateur2=?) OR (idUtilisateur1=? AND idUtilisateur2=?)";
        
        
        $amitié = false ;
        
         $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['idUtilisateur1'] , $_SESSION['idUtilisateur2'] , $_SESSION['idUtilisateur2'] , $_SESSION['idUtilisateur1']));
        
        

    
    }


    
    ?>