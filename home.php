<?php
session_start();

// Redirect to login page if user is not authenticated
if (!isset($_SESSION['identifier']) || $_SESSION['identifier'] !== "ok") {
    header("Location: login.php");
    exit();
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ent";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL query to retrieve user information
if (isset($_SESSION["mail"])) {
    $user_email = $_SESSION["mail"];
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $user_row = $result->fetch_assoc();
        $user_name = htmlspecialchars($user_row['full_name']); // Replace 'full_name' with your database column name
        $etat = htmlspecialchars($user_row['status']); // Replace 'status' with your database column name
    } else {
        // Handle case where user is not found in database
        $user_name = "Utilisateur inconnu";
        $etat = "État inconnu";
    }

    $stmt->close();
} else {
    // Handle case where session data is not set
    $user_name = "Utilisateur inconnu";
    $etat = "État inconnu";
}

$conn->close();

// Function to check if a tab is active
function isActive($tab, $currentTab)
{
    return $tab === $currentTab ? 'active' : '';
}

// Determine the active tab
$onglet_actif = isset($_GET['onglet']) ? $_GET['onglet'] : 'acceuil';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home ISTA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 20px;
    }

    .navbar-brand h3 {
        color: #18ef3c;
    }

    .navbar .btn {
        background-color: #18ef3c;
        color: white;
    }

    .btn-deconnexion {
        background-color: #dc3545;
        color: white;
    }

    .sidebar {
        height: 100vh;
        background-color: #343a40;
        color: white;
        padding: 10px;
    }

    .sidebar a {
        color: white;
        text-decoration: none;
    }

    .sidebar a:hover {
        background-color: #495057;
        border-radius: 5px;
        padding-left: 10px;
    }

    .content {
        padding: 20px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h3>Technolab-ISTA</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="navbar-text me-3">
                            <?php echo htmlspecialchars($etat) . " : " . htmlspecialchars($user_name); ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-deconnexion" href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h4 class="mt-3">Menu</h4>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a class="nav-link active <?php echo isActive('acceuil', $onglet_actif); ?>"
                            href="home.php?onglet=acceuil">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-house" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 3.293l6 6V13.5A1.5 1.5 0 0 1 12.5 15h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zM7 13.5v-4h2v4h2.5a.5.5 0 0 0 .5-.5V9.5h1v4a.5.5 0 0 0 .5.5h2.5A1.5 1.5 0 0 0 16 13.5v-4.793a.5.5 0 0 0-.146-.354l-7-7a.5.5 0 0 0-.708 0l-7 7A.5.5 0 0 0 1 8.707V13.5A1.5 1.5 0 0 0 2.5 15H7v-1.5H4a.5.5 0 0 0-.5.5v.5H7v-1.5z">
                                </path>
                            </svg>
                            Acceuil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo isActive('cours', $onglet_actif); ?>"
                            href="home.php?onglet=cours">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-easel2-fill"
                                viewBox="0 0 16 16" width="16" height="16">
                                <path
                                    d="M8.447.276a.5.5 0 0 0-.894 0L7.19 1H2.5A1.5 1.5 0 0 0 1 2.5V10h14V2.5A1.5 1.5 0 0 0 13.5 1H8.809z" />
                                <path fill-rule="evenodd"
                                    d="M.5 11a.5.5 0 0 0 0 1h2.86l-.845 3.379a.5.5 0 0 0 .97.242L3.89 14h8.22l.405 1.621a.5.5 0 0 0 .97-.242L12.64 12h2.86a.5.5 0 0 0 0-1zm3.64 2 .25-1h7.22l.25 1z" />
                            </svg>
                            Cours
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active <?php echo isActive('classe', $onglet_actif); ?>"
                            href="home.php?onglet=classe">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-backpack-fill"
                                viewBox="0 0 16 16" width="16" height="16">
                                <path d="M5 13v-3h4v.5a.5.5 0 0 0 1 0V10h1v3z" />
                                <path
                                    d="M6 2v.341C3.67 3.165 2 5.388 2 8v5.5A2.5 2.5 0 0 0 4.5 16h7a2.5 2.5 0 0 0 2.5-2.5V8a6 6 0 0 0-4-5.659V2a2 2 0 1 0-4 0m2-1a1 1 0 0 1 1 1v.083a5.999 5.999 0 0 0-2 0V2a1 1 0 0 1 1-1z" />
                            </svg>
                            Classe
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-10 content">
                <?php
                // Include the appropriate content based on the active tab
                switch ($onglet_actif) {
                    case 'cours':
                        include ('cours.php');
                        break;
                    case 'classe':
                        include ('classe.php');
                        break;
                    default:
                        include ('acceuil.php');
                        break;
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>