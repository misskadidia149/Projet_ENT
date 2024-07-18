<?php
session_start();
$bd = new PDO('mysql:host=localhost;dbname=ent', 'root', '');

if (isset($_POST['btn'])) {
    $etat = $_POST['etat'];
    $email = $_POST['mail'];
    $password = $_POST['password'];

    switch ($etat) {
        case "Etudiant":
            $req = $bd->prepare('SELECT * FROM etudiant WHERE email=? AND password=?');
            break;
        case "Enseignant":
            $req = $bd->prepare('SELECT * FROM enseignant WHERE email=? AND password=?');
            break;
        case "Parent":
            $req = $bd->prepare('SELECT * FROM parent WHERE email=? AND password=?');
            break;
        default:
            $req = $bd->prepare('SELECT * FROM admin WHERE email=? AND password=?');
            break;
    }

    $req->execute([$email, $password]);
    $user = $req->fetch();

    if ($user) {
        $_SESSION["etat"] = $etat;
        $_SESSION["identifier"] = "ok";
        $_SESSION["user_name"] = $user['nom']; // Assuming the 'nom' column exists in your tables
        $_SESSION["user_email"] = $user['email'];
    
        // Redirection en fonction du profil
        switch ($etat) {
            case "Etudiant":
                header('location: etudiant.php'); // Redirige vers la page des étudiants
                exit;
            case "Enseignant":
                header('location: enseignant.php'); // Redirige vers la page des enseignants
                exit;
            case "Parent":
                header('location: parent.php'); // Redirige vers la page des parents
                exit;
            case "Administration":
                header('location: home.php'); // Redirige vers la page de l'administration
                exit;
            default:
                header('location: ok.php'); // Redirection par défaut vers la page d'accueil
                exit;
        }
    } else {
        $error_message = "L'email ou le mot de passe est invalide !!";
    }
    
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECHNOLAB-ISTA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        #container_2 {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 100%;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="container_2">
        <h1>Environnement Numérique de Travail</h1>

        <?php if (isset($error_message)) : ?>
            <div class="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form id="survey-form" class="form" method="POST" action="login.php">
            <label for="etat">Profil</label>
            <select id="etat" class="form-select form-select-sm" name="etat" required>
                <option value="" selected>Choisissez votre profil</option>
                <option value="Administration">Administration</option>
                <option value="Enseignant">Enseignant</option>
                <option value="Etudiant">Etudiant</option>
                <option value="Parent">Parent</option>
            </select>

            <div class="data">
                <div class="mb-3">
                    <label for="mail" class="form-label">Nom d'utilisateur</label>
                    <input type="email" class="form-control" id="mail" name="mail" placeholder="Example@gmail.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
            </div>

            Vous n'avez pas de compte ? <a href="inscription.php">Cliquez ici </a><br><br>
            <input type="submit" class="btn btn-primary" name="btn" value="Envoyer">
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HvwoM2pI4z+gHzsMTaLv7Nl4b/cCkYUUwwKz4qfko3KEvqVxOujpDnjDkIkbfv0s" crossorigin="anonymous"></script>
</body>

</html>
