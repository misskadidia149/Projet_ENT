
<?php
session_start();
$bd = new PDO('mysql:host=localhost;dbname=ent', 'root', '');

if (isset($_POST['btn'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['mdp'];
    $contact = $_POST['contact'];
    $etat = $_POST['etat'];

    switch ($etat) {
        case "Administration":
            $req = $bd->prepare('INSERT INTO admin (nom, prenom, email, password, contact) VALUES (?, ?, ?, ?, ?)');
            break;
        case "Enseignant":
            $req = $bd->prepare('INSERT INTO enseignant (nom, prenom, email, password, contact) VALUES (?, ?, ?, ?, ?)');
            break;
        case "Etudiant":
            // Traitez l'inscription des étudiants si nécessaire
            break;
        case "Parent":
            $req = $bd->prepare('INSERT INTO parent (nom, prenom, email, password, contact) VALUES (?, ?, ?, ?, ?)');
            break;
        default:
            // Gérez un cas par défaut si nécessaire
            break;
    }

    if (isset($req)) {
        $req->execute([$nom, $prenom, $email, $password, $contact]);
        $_SESSION['inscription_success'] = true; // Facultatif : utiliser pour un message de confirmation
        header('location: login.php'); // Redirection vers la page de connexion après l'inscription
        exit;
    } else {
        // Gérer les erreurs ou les cas non pris en charge ici
        echo "Erreur lors du traitement de l'inscription.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Environnement Numérique de Travail - Inscription</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .btn-primary {
            background-color: #18ef3c;
            border-color: #18ef3c;
        }

        .btn-primary:hover {
            background-color: #15cc2e;
            border-color: #15cc2e;
        }

        .form-check-label {
            padding-left: 0;
        }

        .a {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Environnement Numérique de Travail</h1>
        <form class="row g-3" action="connection.php" method="POST">
            <div class="col-md-6">
                <label for="inputNom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="inputNom" required>
            </div>
            <div class="col-md-6">
                <label for="inputPrenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="inputPrenom" required>
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="inputPassword" required>
            </div>
            <div class="col-md-6">
                <label for="inputContact" class="form-label">Contact</label>
                <input type="text" class="form-control" name="contact" id="inputContact" required>
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Statut</label>
                <select id="inputState" class="form-select" name="etat" required>
                    <option selected disabled>Choisissez...</option>
                    <option value="Administration">Administration</option>
                    <option value="Enseignant">Enseignant</option>
                    <option value="Etudiant">Etudiant</option>
                    <option value="Parent">Parent</option>
                </select>
            </div>
            <div class="a">
                <a href="login.php">Vous avez déjà un compte? Cliquez ici pour vous connecter.</a>
            </div>
            <div class="col-12">
                <button type="submit" name="btn" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>

    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
