<?php
session_start();
$bd=new PDO('mysql:host=localhost;dbname=ent','root','');
// $bd=new PDO('mysql:host=localhost;dbname=insta', 'root','');
// $nom=htmlspecialchars($_POST['nom']);

if(isset($_POST['btn'])){   
    if($_POST['etat']=="Etudiant"){
        $req=$bd->prepare('SELECT * FROM etudiant where email=? and password=?');
    }else if($_POST['etat']=="Enseignant"){
        $req=$bd->prepare('SELECT * FROM enseignant where email=? and password=?');
    }else if($_POST['etat']=="Parent"){
        $req=$bd->prepare('SELECT * FROM parent where email=? and password=?');
    }else{
        $req=$bd->prepare('SELECT * FROM admin where email=? and password=?');
    }
    $req->execute([$_POST['mail'] ,$_POST['password']]);
    $user=$req->fetch();
}
?>






<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECHNOLAB-ISTA</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>

<body>
<?php 
if(!empty($user)){
    $_SESSION["etat"]=$_POST['etat'];
    $_SESSION["identifier"]="ok";
    header('location:home.php');
    exit;
}
else{  if(isset($_POST["mail"])){ ?>
<script>
    alert("L'email ou le mot de passe est invalide !!")
</script>

<?php  } ?>
<div >
    <div id="container_2">
        <h1 class="text-center">Environnement Numérique de Travail</h1>
        <!-- <p>Veuillez remplir tous les champs!</p> -->
        <form id=" survey-form" class="form" method="POST" action="login.php" >
            <label>Profil</label>
            <select class="form-select form-select-sm" class="d-inline-flex p-2" name="etat" aria-label="Small select example" required >
                <option selected>Choisissez votre profil</option>
                <option value="Admninistration">Administration</option>
                <option value="Enseigant">Enseignant</option>
                <option value="Etudiant">Etudiant</option>
            </select>
            <div class="data">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="mail" placeholder="Example@gmail.com" required >
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Mot de passe</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="password" placeholder="Password" required >
                </div>
            </div>
            <a href="inscription.php">Vous n'avez pas de compte?Cliquez ici pour créer un compte</a><br><br>
            <input type="submit" class="btn btn-primary" name="btn" value="Envoyer" >
        </form>
    </div>
    </div>
    <?php }?>
<script src="jquery.min.js">


    
</script>
</body>
</html>