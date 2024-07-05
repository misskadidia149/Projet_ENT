<?php ?>
<?php 
session_start();
$bd=new PDO('mysql:host=localhost;dbname=ent','root','');
if(isset($_POST['mail'])){   
    if($_POST['etat']=="Etudiant"){
        $req=$bd->prepare('SELECT * FROM etudiant where email=? and password=?');
    }else if($_POST['etat']=="Enseignant"){
        $req=$bd->prepare('SELECT * FROM enseignant where email=? and password=?');
    }else if($_POST['etat']=="Parent"){
        $req=$bd->prepare('SELECT * FROM parent where email=? and password=?');
    }else{
        $req=$bd->prepare('SELECT * FROM admin where email=? and password=?');
    }
    $req->execute([$_POST['mail'],$_POST['password']]);
    $user=$req->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
	<script src="jquery.min.js"></script>

</head>
<body>
<?php 
if(!empty($user)){
    $_SESSION["etat"]=$_POST['etat'];
    $_SESSION["identifier"]="ok";
    header('location:acceuil.php');
    exit;
}
else{  if(isset($_POST["mail"])){ ?>
<script>
    alert("L'email ou le mot de passe est invalide !!")
</script>

<?php  } ?>


    <!-- partial:index.partial.html -->
 <header>
    <img src="image/logo-TECHNOLAB-ISTA.jpg" alt="">
    <h1>Technolab ISTA</h1>
 </header>
      

<section >
    <div class="form">
        <form action="index.php" method="post" id="part1">
            <h2>Login</h2>
            <div>
            <select name="etat" id="">
                <option value="Etudiant">Etudiant</option>
                <option value="Enseignant">Enseignant</option>
                <option value="Parent">Parent</option>
                <option value="Administrateur">Administrateur</option>
            </select>
            <label for="etat">En tant que</label>
            </div>

            <div class="inputbox">
                <input type="email" name="mail" required >
                <label for="">Email</label>
            </div>

            <div class="inputbox">
                <input type="password" name="password" required>
                <label for="">Password</label>
            </div>

            <div class="forget">

                <label>
                <a href="#">Password oublier?</a>
                </label>
            </div>
        <button>Log in</button>
        <div class="register">
          <p>Nouveau compte ! <a href="#" id="enregistre">connexion</a></p>
        </div>
      </form>


      <form action="connection.php" id="part2" method="post">
            <h2>Creer un compte</h2>
            <div class="inputbox">
                <input type="text" name="nom" required>
                <label for="">Nom</label>
            </div>
            <div class="inputbox">
                <input type="text" name="prenom" required>
                <label for="">Prenom</label>
            </div>
            <div class="inputbox">
                <input type="text" name="contact" required>
                <label for="">contact</label>
                <span id="contact"></span>
            </div>
            <div>
            <select name="etat" id="">
                <option value="Etudiant">Etudiant</option>
                <option value="Enseignant">Enseignant</option>
                <option value="Parent">Parent</option>
                <option value="Administrateur">Administrateur</option>
            </select>
            <label for="etat">En tant que</label>
            </div>
    

        <button>Envoyer</button>
    
      </form>
  </div>
</section>
<?php }
 ?>



<script src="script/script.js"></script>
</body>
</html>