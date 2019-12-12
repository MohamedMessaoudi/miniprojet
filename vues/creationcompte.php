<?php

if(isset($_SESSION["id"])) {
        
        message("Vous êtes déja inscrit !");
        header("Location:index.php?action=accueil");
    }




?>




<div class="creationcompte">

<?php


echo "<p><strong>Création de compte :</strong></p>"


?>



<div class="creationcompteform">

<form action ="index.php?action=creationcompte" method ="post">

<div class="container-creationcompte">

<label for="nom"><b>Nom :</b></label>
<input type="text" placeholder="Nom..." name="nom" >

<label for="prenom"><b>Prénom :</b></label>
<input type="text" placeholder="Prénom..." name="prenom">

<label for="login"><b>Login :</b></label>
<input type="text" placeholder="Login..." name="login">

<label for="email"><b>Email :</b></label>
<input type="email" placeholder="E-mail..." name="email">

<label for="confemail"><b>Confirmer email :</b></label>
<input type="email" placeholder="Confirmer e-mail..." name="confemail">

<label for="mdp"><b>Mot de Passe :</b></label>
<input type="password" placeholder="Mot de passe" name="mdp">

<label for="nom"><b>Confirmer Mot de Passe :</b></label>
<input type="password" placeholder="Confirmer mot de passe" name="confmdp" >
    
<label>
    <input type="checkbox" name="remember" value ="1" > Resté connecté
</label>
<button type="submit" name="forminscription">S'inscrire</button> 

</div>

</form>

</div>



<?php
   
    echo "<div class='creationcompteid'>";
    echo "<a href='index.php?action=login'><strong>Vous avez déja un compte ?<br>Identifiez-vous ici.</strong></a>";
    echo "</div>";

?>

</div>


