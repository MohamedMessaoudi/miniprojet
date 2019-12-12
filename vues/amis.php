
 <h1> Mes amis</h1>
<div id="mes_amis">
    
   
    <?php
    
      if(isset($_SESSION["id"]   )) 
      
      {
          
        $sql = "SELECT * FROM user WHERE id IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id AND etat='ami' AND idUTilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id AND etat='ami' AND idUTilisateur1=?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['id'] , $_SESSION['id']));
        
        echo "<div id='mes_amis_amis'>Vos amis : </br>";
        
        while($line=$q->fetch()) 
        
        {
        
          echo " <a href='index.php?action=profil&id=" .$line['id'] ."'> ";
          echo $line['login'] ;
          echo "</a> </br> ";
        }
       echo "</div>";
    

        $sql = "SELECT user.* FROM user WHERE id IN(SELECT idUtilisateur2 FROM lien WHERE idUtilisateur1=? AND etat='attente')";
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['id']));
        
        echo "<div id='mes_amis_attente'> Ils ne vous ont pas répondus :";
        
        while($line=$q->fetch()) 
        
        {
          
          echo "</br> <a href='index.php?action=profil&id=" .$line['id'] ."'> ";
          echo $line['login'] ;
          echo "</a> ";
         

        }
    
     echo "</div>";
          
        
        $sql = "SELECT user.* FROM user WHERE id IN(SELECT idUtilisateur1 FROM lien WHERE idUtilisateur2=? AND etat='attente')";
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['id']));
        
        echo "<div id='mes_amis_demande'> Ils vous veulent en ami :";
        
        while($line=$q->fetch()) 
        
        {
            
          echo "</br> <a href='index.php?action=profil&id=" .$line['id'] ."'> ";
          echo $line['login'] ;
          echo " : </a>";
          echo" <a href='index.php?action=accepter&id=".$line['id']."'>" .'Oui  '." </a>";
          echo" <a href='index.php?action=refuser&id=".$line['id']."'>" .'Non'." </a>";
         

        }
     echo "</div>";
          
      }

    ?>
    
 </div>