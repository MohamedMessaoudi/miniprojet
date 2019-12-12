<?php
 $sql="SELECT * FROM user WHERE login like ?" ;
        $query = $pdo->prepare($sql); // Etpae 1 : On prépare la requête
	                              //  et celle-ci a un paramètre optionnel
	
	
	    $query->execute(array('%'.$_GET['recherche'].'%')); // Etape 2 :On l'exécute. 
	                                        // On remplace le ? par l'année donnée 
	
	
	while($line = $query->fetch()) { // Etape 3 : on parcours le résultat
		
        
        $sql1 = "SELECT * FROM lien WHERE etat='ami'AND ((idUtilisateur1=? AND idUtilisateur2=?) OR (idUtilisateur2=? AND idUtilisateur1=?))";

        $query1 = $pdo->prepare($sql1); // Etpae 1 : On prépare la requête
	                              //  et celle-ci a un paramètre optionnel
	
	
	    $query1->execute(array($line["id"],$_SESSION["id"],$line["id"],$_SESSION["id"])); // Etape 2 :On l'exécute. 
	                                        // On remplace le ? par l'année donnée 
        $l = $query1->fetch();
            if($l !=false){
                echo "<a href='index.php?action=accueil&id=".$line['id'] . "'>" .  $line['login']."</a><br />";
                echo $line['email']."<br />";
                echo "<a href='index.php?action=accueil&id=".$line['id'] . "'>" .  'Vous êtes déjà amis'."</a><br />";
                
                
            }else{
                echo "<a href='index.php?action=accueil&id=".$line['id'] . "'>" .  $line['login']."</a><br />";
                echo $line['email']."<br />";
                echo "<a href='index.php?action=demandeAmi&id=" . $line['id'] . "'>Demander</a></br>" ;
                
            };

        
        
     
        
        
         
         // le paramètre  est le $id
    }
?>