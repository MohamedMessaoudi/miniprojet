<?php

if (isset($_POST['forminscription']))
{
   
    if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['login']) 
    and !empty($_POST['email']) 
    and !empty($_POST['confemail']) and !empty($_POST['mdp']) and !empty($_POST['confmdp']))
    {
        $nom = htmlspecialchars('nom');
        $prenom = htmlspecialchars('prenom');
        $login = htmlspecialchars('login');
        $email = htmlspecialchars('email');
        $confemail = htmlspecialchars('confemail');
        $mdp = $_POST['mdp'];
       
        $sql = ("SELECT * FROM user WHERE login = ?");
        $q = $pdo->prepare($sql);
        $q->execute(array($_POST['login']));
        $loginexist = $q->rowCount();
        
        if($loginexist == 0)
        {
        
        
            $sql = ("SELECT * FROM user WHERE email = ?");
            $q = $pdo->prepare($sql);
            $q->execute(array($_POST['email']));
            $mailexist = $q->rowCount();

            if($mailexist == 0)
            {
                
                if($_POST['email']==$_POST['confemail'])
                {

                    if (strlen($_POST['mdp'])>=3)
                    {

                        if ($_POST['mdp']==$_POST['confmdp'])
                        {

                            $sql = ("INSERT INTO user (nom, prenom, login, mdp, email) VALUES (?, ?, ?, PASSWORD('$mdp'), ?)");
                            $q = $pdo->prepare($sql);
                            $q->execute(array($_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['email']));

                            $_SESSION['info'] = "Votre compte a été créer ";

                        }
                        else $_SESSION['info'] = "Les mots de passe ne sont pas identiques";
                    }
                    else $_SESSION['info'] = "Le mot de passe est trop court !";
                }
                else $_SESSION['info'] = "Les deux adresses email doivent être identiques";
            }
            else $_SESSION['info'] = "L'adresse email est déjà utilisé !";
            
        }
        else $_SESSION['info'] = "Le login est déjà utilisé !";

    }
    else $_SESSION['info'] = "Veuillez saisir tous les champs !";
}
header('Location: index.php?action=formulairecreationcompte');
?>