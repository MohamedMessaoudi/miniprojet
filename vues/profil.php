<?php
    
if(isset($_GET['id'])) {
          
    
$sql = "SELECT * FROM user WHERE id = ? ";
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id']));      
$line=$q->fetch(); 






?>
<h2> Profil de <?php echo $line['nom']." ".$line['prenom']; ?></h2><br><br>

<?php
    
    echo "<a href='index.php?action=accueil&id=" .$line['id'] ."'> Aller sur son mur ? </a>";
    
    ?>


<div id="mon_profil">


<div id="avatar_profil">
    <?php echo "<img src='"; ?>
 <?php echo $line['avatar']; ?>
    <?php echo "' style='width: 100%;height: 100%;'  >"; ?>
    
</div>



   <div id="detail_profil">
    Pseudo = <?php echo $line['login'] ;?>
    <br>
    Email = <?php echo $line['email']; ?>
    <br>
<?php } ?>  
</div>
</div>