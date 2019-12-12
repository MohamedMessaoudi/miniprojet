<div class="login">

    <?php
    
    echo "<div class='logconnect'>";
    echo "<strong>Veuillez-vous connecter !</strong>";
    echo "</div>";



    ?>



    <form action ="index.php?action=connexion" method ="post">

    <div class="container-login">
    <label for="login"><b>Login :</b></label>
    <input type="text" placeholder="Login..." name="login">    

    <label for="mdp"><b>Mot de Passe :</b></label>
    <input type="password" placeholder="Mot de passe..." name="mdp" >

    <button type="submit">Se connecter</button>
    <label>
    <input type="checkbox" name="remember" value ="1" > Se souvenir de moi
    </label>
  </div>
        

    </form>

    <nav>

<?php
    if (!isset($_SESSION['id'])) {
      
        echo "<a href='index.php?action=formulairecreationcompte'><strong>Vous n'avez pas de compte ?<br>Créer votre compte ici !</strong></a>";
    }
?>

</nav>

</div>