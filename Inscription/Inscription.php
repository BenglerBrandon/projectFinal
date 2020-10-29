<?php 

require ('../navBar/navbar.php');

$bdd = new PDO('mysql:host=localhost;dbname=location_bateaux;', 'root', '');
var_dump($_POST);

if(isset($_POST["submit"])){
  
    $name = htmlentities($_POST["nom"]);
    $surname = htmlentities($_POST["prenom"]);
    $email = htmlentities($_POST["email"]);
    $mdp = htmlentities($_POST["mdp"]);

    $passHash = password_hash($mdp, PASSWORD_DEFAULT);

    if(!empty($name) && !empty($surname) && !empty($email) && !empty($mdp)){
        $insert = $bdd->prepare("INSERT INTO user (nom_user, prenom_user, email_user, mdp_user) VALUE(?,?,?,?)");
        $insert->execute([$name, $surname, $email, $passHash]);
    } 
    else{
        echo "veuillez remplir les champs";
    }
}

//verifier si le mail est pris si ces un tableau email deja pris si non on peut s'inscrire

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<form action="" method="post" >
  <div >
    <label for="name"> nom: </label>
    <input type="text" name="nom" id="name" >
  </div>
  <div >
    <label for="name"> prenom </label>
    <input type="text" name="prenom" id="" >
  </div>
  <div >
    <label for="email"> email: </label>
    <input type="email" name="email" id="email" >
  </div>
  <div >
    <label for="password"> mdp: </label>
    <input type="password" name="mdp" id="mdp" >
  </div>
  <div >
    <input type="submit"  name="submit" value="valider!">
  </div>



</form>

    
</body>
</html>