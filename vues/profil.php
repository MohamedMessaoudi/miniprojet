<?php
    
if(isset($_GET['id'])) {
          
    
$sql = "SELECT * FROM user WHERE id = ? ";
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id']));      
$line=$q->fetch(); 






?>
   <div id="mon_profil">
    <h2> Profil de <?php echo $line['nom']." ".$line['prenom']; ?></h2><br><br>

    Pseudo = <?php echo $line['login'] ;?>
    <br>
    Email = <?php echo $line['email']; ?>
    <br>
<?php } ?>  
</div>