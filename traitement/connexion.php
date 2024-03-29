
<?php
if(isset($_POST['login']) && isset($_POST['mdp'])) {
$sql = "SELECT * FROM user WHERE login=? AND mdp=PASSWORD(?)";

// Etape 1  : preparation
$q = $pdo->prepare($sql);

// Etape 2 : execution : 2 paramètres dans la requêtes !!
$q->execute(array($_POST['login'], $_POST['mdp']));
// Etape 3 : ici le login est unique, donc on sait que l'on peut avoir zero ou une  seule ligne.

// un seul fetch
$line = $q->fetch();
    
if($line == false) {
    message("Vous êtes pas doué !!");
    header("Location:index.php?action=login");
} else {
    $_SESSION['id'] = $line['id'];
    $_SESSION['login'] = $line['login'];
    
    $key = uniqid("", true);
    setcookie("remember", $key, time ()+3600*24*31);
    
    $sql ="UPDATE user set remember=? WHERE id =?";
    $q = $pdo->prepare($sql);
    $q->execute(array($key, $line['id']));
    
    
    header("Location:index.php");
}
} else {
    header("Location:index.php?action=login");
}

// Si $line est faux le couple login mdp est mauvais, on retourne au formulaire

// sinon on crée les variables de session $_SESSION['id'] et $_SESSION['login'] et on va à la page d'accueil
?>