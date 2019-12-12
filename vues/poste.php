<?php   
if(!isset($_SESSION["id"])) 

    {
        // On n est pas connecté, il faut retourner à la pgae de login
        header("Location:index.php?action=login");
    }

    // On veut affchier notre mur ou celui d'un de nos amis et pas faire n'importe quoi
    $ok = false;

    if(!isset($_GET["id"]) || $_GET["id"]==$_SESSION["id"])
    
    { 

        $id = $_SESSION["id"];
        $ok = true; // On a le droit d afficher notre mur
    }
    
    else 
    
    {
        $id = $_GET["id"];
        // Verifions si on est amis avec cette personne
        $sql = "SELECT * FROM lien WHERE etat='ami'
                AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur2=? AND idUtilisateur1=?)))";

        // les deux ids à tester sont : $_GET["id"] et $_SESSION["id"]
        
        $query = $pdo->prepare($sql); // Etpae 1 : On prépare la requête
	                              //  et celle-ci a un paramètre optionnel
	
	
	    $query->execute(array($_GET["id"],$_SESSION["id"],$_GET["id"],$_SESSION["id"])); // Etape 2 :On l'exécute. 
	                                        // On remplace le ? par l'année donnée 
        $l = $query->fetch();

            if($l !=false)
            
            {

                $ok = true;

            }
 
        // A completer. Il faut récupérer une ligne, si il y en a pas ca veut dire que lon est pas ami avec cette personne
    }
    
    
    if($ok==false) 
    
    {

        echo "Vous n'êtes pas encore ami, vous ne pouvez pas voir son mur !!";      

    } 
    
    else 
    
    {

        //echo "<div class='addpost'>";
        //echo "<form action ='index.php?action=addpost' method = 'post'>";
        //echo " <input type = 'hidden' name='idMur' value='$id'>";
        //echo  "<input type = 'text' name = 'titre' placeholder='Titre'></br></br>";
        //echo "<input type = 'text' name = 'contenu' placeholder='Message'>";
        //echo  "<input type='submit' name='poster' value='Poster'>";
        //echo "</form></br>";
        //echo "</div>";
        
        
        
        
        $sql="SELECT * FROM ecrit WHERE idAmi=? order by dateEcrit DESC";
        $query = $pdo->prepare($sql); // Etpae 1 : On prépare la requête
	                              //  et celle-ci a un paramètre optionnel
	
	
	    $query->execute(array($id)); // Etape 2 :On l'exécute. 
	                                        // On remplace le ? par l'année donnée 
	
	
        while($line = $query->fetch()) 
        
        { // Etape 3 : on parcours le résultat
            echo "<div class='post'>";
            echo $line['titre']."<br />";
            echo $line['contenu']."<br />";
            echo "</br>";
            echo $line['dateEcrit']."<br />";
            echo "</div>";
            echo "</br>";
        
         // le paramètre  est le $id
        }

    }
?>