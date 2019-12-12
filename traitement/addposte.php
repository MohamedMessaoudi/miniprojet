<?php

echo "<div class=post>";

if(isset($_POST['titre'])&&isset($_POST['contenu'] )&&!empty($_POST['titre'])&&!empty($_POST['contenu'] )){ 
            
       
$sql= "INSERT INTO ecrit (titre, contenu, dateEcrit, idAuteur, idAmi) VALUES (?, ?, now(), ?, ?)";
    
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['titre'],$_POST['contenu'],$_SESSION['id'],$_POST["idMur"]));

header('Location: index.php?action=accueil');
             }else{
    echo "champs vides";
}
echo "</div>";