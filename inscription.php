<?php
session_start();
// $bd=new PDO('mysql:host=localhost;dbname=ent','root','');
// if(isset($_POST['btn']))
// {
//     $nom=htmlspecialchars($_POST['nom']);
//     $prenom=htmlspecialchars($_POST['nom']);
//     $contact=htmlspecialchars($_POST['contact']);
//     $mail=htmlspecialchars($_POST['mail']);
//     $password=htmlspecialchars($_POST['mdp']);
//     // $mdp=sha1($_POST['mdp']);
//     if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['conatct'])   )
//     {
//         $mdpT= strlen($password);
//        if($mdpT<=12)
//        {
//            $insertent=$bd->prepare("INSERT INTO login(nom,prenom,contact,mail,mdp) VALUES(?,?,?,?)");
//            $insertent->execute(array($mail, $nom, $user, $mdp));
//            echo"votre compte a été créer";
//        }
//        else
//        {
//         echo'le mot de passe ne doit pas depasser 12  caractère';
//        }
// }
// else{
//     echo'Tout les champs doivent être remplis';
// }
// }


$bd = new PDO('mysql:host=localhost;dbname=ent', 'root','');
$eleve=$bd->prepare('SELECT * FROM `etudiant` WHERE contact = ?');
$eleve=$eleve->fetch();

if(isset($_POST['contact'])){
    $_SESSION["nom"]=$_POST['nom'];
    $_SESSION["prenom"]=$_POST['prenom'];
    $_SESSION["contact"]=$_POST['contact'];
    $_SESSION["etat"]=$_POST['etat'];
    $eleve->execute([$_POST['contact']]);
}

if(isset($_POST["btn"])){
    
    if($_SESSION['etat']=="Administrateur" && $_POST['privilage']=="MamadouBa"){

        $req=$bd->exec('INSERT INTO `Admin`(`id`, `nom`, `prenom`, `contact`, `email`, `password`) 
        VALUES (null,"'.$_SESSION["nom"].'", "'.$_SESSION["prenom"].'" ,"'.$_SESSION["contact"].'" ,"'.$_POST["email"].'" ,"'.$_POST["password"].'")');
        $valide="ok";

    }else if($_SESSION['etat']=="Enseignant" && $_POST['privilage']=="Kadi"){

        $req=$bd->exec('INSERT INTO `enseignant`(`id`, `nom`, `prenom`, `contact`, `email`, `password`) 
        VALUES (null,"'.$_SESSION["nom"].'", "'.$_SESSION["prenom"].'" ,"'.$_SESSION["contact"].'" ,"'.$_POST["email"].'" ,"'.$_POST["password"].'")');
        $valide="ok";


    }else if($_SESSION['etat']=="Etudiant"){

        $req=$bd->exec('INSERT INTO `etudiant`(`id`, `matricule`, `nom`, `prenom`, `contact`, `email`, `numParent`, `password`) VALUES 
        (null,"'.$_POST["matricule"].'","'.$_SESSION["nom"].'", "'.$_SESSION["prenom"].'" ,"'.$_SESSION["contact"].'" ,"'.$_POST["email"].'","'.$_POST["parent"].'","'.$_POST["password"].'")');
        $valide="ok";


    }else{

        $req=$bd->exec('INSERT INTO `parent`(`id`, `nom`, `prenom`, `numParent`, `email`, `password`) 
        VALUES (null,"'.$_SESSION["nom"].'", "'.$_SESSION["prenom"].'" ,"'.$_SESSION["contact"].'" ,"'.$_POST["email"].'" ,"'.$_POST["password"].'")');
        $valide="ok";


    }
    unset($_SESSION["nom"]);
    unset($_SESSION["prenom"]);
    unset($_SESSION["contact"]);
    $_SESSION["identifier"]="ok";
    if(isset($valide)){
         header("location:home.php");
    exit; 
    }
  
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php 
//La partie controle des parents apres la base de donnée

    if(isset($_POST["etat"])){

        if($_POST['etat']=="Parent"){
                        if(!empty($eleve)){
                            echo "Bonjour Monsieur".$eleve["nom"];
                        }
                        else{
                            header("location:index.php");
                            exit;
                    }
                    }
    }
?>
<h1 class="text-center">Environnement Numérique de Travail</h1>

<form class="row g-3" action="connection.php" method="POST" >
    <div class="data">
        <div class="row g-3">
            <div class="col" class="w-50 p-3">
                <input type="text" class="w-50 p-3" name="nom" class="form-control" placeholder="Nom" aria-label="Nom">
            </div>
            <div class="col">
                <input type="text" class="w-50 p-3" class="form-control" placeholder="Prenom" name="prenom" aria-label="Prenom">
            </div>
        </div>
            <div class="col-md-6" >
                <label for="inputEmail4" class="w-50 p-3" class="form-label">Email</label>
                <input type="email" class="w-50 p-3" name="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <!-- <label for="inputPassword4" class="form-label">Mot de passe</label> -->
                <input type="password" name="mdp" class="w-50 p-3" class="form-control" id="inputPassword4" placeholder="Mot de passe">
            </div>
            <div class="col-md-6">
                <!-- <label for="inputCity" class="form-label">Contact</label> -->
                <input type="text" name="contact" class="w-50 p-3" name="tel" class="form-control" id="inputCity" placeholder="Contact">
            </div>
            <div class="col-md-4" class="w-50 p-3">
                <label for="inputState" class="form-label">Statu</label>
                <select id="inputState" class="form-select" name="etat" >
                    <option selected>Choisissez</option>
                    <option value="Administration" >Administration</option>
                    <option value="Enseignant" >Enseignant</option>
                    <option value="Etudiant" >Etudiant</option>
                    
                </select>
            </div>
            <div class="a">
                <a href="login.php">Vous avez déjà un compte?Cliquez ici pour vous connectez.</a>
            </div>
            <div class="col-12">
                <button type="submit" name="btn" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
</body>

</html>