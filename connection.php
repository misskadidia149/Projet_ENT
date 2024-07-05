<?php
session_start();
$bd = new PDO('mysql:host=localhost;dbname=ent', 'root');
$eleve=$bd->prepare('SELECT * FROM `etudiant` WHERE contact = ?');
$eleve->execute([$_POST['contact']]);
$eleve=$eleve->fetch();

if(isset($_POST['contact'])){
    $_SESSION["nom"]=$_POST['nom'];
    $_SESSION["prenom"]=$_POST['prenom'];
    $_SESSION["contact"]=$_POST['contact'];
    $_SESSION["etat"]=$_POST['etat'];
}

if(isset($_POST["email"])){
    
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
    <title>Connection</title>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
	<script src="jquery.min.js"></script>

</head>
<body>
<header>
      <img src="image/logo-TECHNOLAB-ISTA.jpg" alt="">
        <h1>Technolab ISTA</h1>
 </header>
<?php  ?>
<?php 
//La partie controle des parents apres la base de donnée
            if($_POST['etat']=="Parent"){
                if(!empty($eleve)){
                    echo "Bonjour Monsieur".$eleve["nom"];
                }
                else{
                    header("location:index.php");
                    exit;
            }
            }
?>
<section>
    <div class="form">
        <form action="connection.php" method="post">
                <h2>Creer un compte</h2>
                <div class="inputbox">
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                </div>

                <?php 
                if($_POST['etat']=="Etudiant"){
                ?>
                <div class="inputbox">
                    <input type="text" name="matricule" required>
                    <label for="">Matricule</label>
                </div>
                <div class="inputbox">
                    <input type="number" name="parent" required>
                    <label for="">num parental</label>
                </div>
                <?php 
                }
                   if($_POST['etat']=="Administrateur"||$_POST['etat']=="Enseignant"){
                  ?>
        
                <div class="inputbox">
                    <input type="text" name="privilage" required>
                    <label for="">Code de permission</label>
                </div>
                <?php  } ?>
                <div class="inputbox">
                    <input type="text" name="password" required>
                    <label for="">Password</label>
                </div>

                <div class="inputbox">
                    <input type="text" name="confirmation" required>
                    <label for="">confirme</label>
                </div>
                <?php ?>
            <button>Envoyer</button>
        
        </form>
    </div>
</section>
    
</form>
    
</body>
</html>