<?php
    
if(isset($_GET['id'])) {
          
    
$sql = "SELECT * FROM user WHERE id = ? ";
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id']));      
$line=$q->fetch(); 






?>
<h2> Profil de <?php echo $line['nom']." ".$line['prenom']; ?></h2><br><br>

<div id="mon_profil">


<div id="avatar_profil">
 <?php echo $line['avatar']; ?>
    
</div>




   <div id="detail_profil">
    Pseudo = <?php echo $line['login'] ;?>
    <br>
    Email = <?php echo $line['email']; ?>
    <br>
<?php } ?>  
</div>
</div>