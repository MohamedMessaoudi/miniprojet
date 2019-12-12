<?php


// avant de demander quelqu'un en ami 
// verifier si :
// le lien d'amitie n'exite pas
$verif=true;
$sql="SELECT * FROM lien WHERE (idUtilisateur1=? AND idUtilisateur2=?) OR (idUtilisateur2=? AND idUtilisateur1=?)";
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION["id"],$_GET["id"],$_SESSION["id"],$_GET["id"]));
                  $line = $query->fetch();


            if($line !=false){
                $verif = false;
                echo "demande deja faite";
                echo "</br>";
                echo "<a href='index.php'>Retour</a>";
            }
                else{
                    
              
                
    
    
    $sql ="INSERT INTO lien VALUES(NULL,?,?,'attente')";
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION["id"],$_GET["id"]));

                    
               header('Location:index.php?action=amis');     
              message("Demande envoyé !");      

//echo "votre demande a bien ete envoyée";
  }
?>



