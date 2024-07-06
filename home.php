<?php
session_start();
if (empty($_SESSION["identifier"])) {
    header('location:login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home ISTA</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="contenaire">
        <div class="header" data-bs-theme="dark">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <h3 style="color: rgb(24, 239, 60)"  >
                            Technolab-ISTA
                        </h3>
                    </a>
                    <button class="btn" name="btnP">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                        <!-- Administrateur -->
                        <?php
                        echo ($_SESSION["etat"]);
                        ?>
                    </button>
                </div>
            </nav>
        </div>
        <div class="BigContainer">
            <div class="navbarL">

                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="home.php?acceuil=1" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-house-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                                </svg>
                                Acceuil
                            </a>
                        <li class="nav-item ">
                            <a class="nav-link dropdown-toggle" href="home.php?cours=1" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor"
                                    class="bi bi-easel2-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8.447.276a.5.5 0 0 0-.894 0L7.19 1H2.5A1.5 1.5 0 0 0 1 2.5V10h14V2.5A1.5 1.5 0 0 0 13.5 1H8.809z" />
                                    <path fill-rule="evenodd"
                                        d="M.5 11a.5.5 0 0 0 0 1h2.86l-.845 3.379a.5.5 0 0 0 .97.242L3.89 14h8.22l.405 1.621a.5.5 0 0 0 .97-.242L12.64 12h2.86a.5.5 0 0 0 0-1zm3.64 2 .25-1h7.22l.25 1z" />
                                </svg>
                                Cours
                            </a>
                        <li class="nav-item ">
                            <a class="nav-link dropdown-toggle" href="home.php?classe=1" role="button" name="btnClasse"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-backpack-fill"
                                    viewBox="0 0 16 16">
                                    <path d="M5 13v-3h4v.5a.5.5 0 0 0 1 0V10h1v3z" />
                                    <path
                                        d="M6 2v.341C3.67 3.165 2 5.388 2 8v5.5A2.5 2.5 0 0 0 4.5 16h7a2.5 2.5 0 0 0 2.5-2.5V8a6 6 0 0 0-4-5.659V2a2 2 0 1 0-4 0m2-1a1 1 0 0 1 1 1v.083a6 6 0 0 0-2 0V2a1 1 0 0 1 1-1m0 3a4 4 0 0 1 3.96 3.43.5.5 0 1 1-.99.14 3 3 0 0 0-5.94 0 .5.5 0 1 1-.99-.14A4 4 0 0 1 8 4M4.5 9h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5" />
                                </svg>
                                Classes
                            </a>
                        <li class="nav-item ">
                            <a class="nav-link dropdown-toggle" href="home.php?paiement=1" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-currency-exchange" viewBox="0 0 16 16">
                                    <path
                                        d="M0 5a5 5 0 0 0 4.027 4.905 6.5 6.5 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05q-.001-.07.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.5 3.5 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98q-.004.07-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5m16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0m-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674z" />
                                </svg>
                                Paiement
                            </a>

                    </ul>
                    <!-- <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> -->
                    <!-- <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form> -->
                </div>

            </div>

            <div class="ecran">

                <?php
                if (isset($_GET["classe"])) {
                    include ("classe.php");
                }
                if (isset($_GET["paiement"])) {
                    include ("paiement.php");
                }
                if (isset($_GET["acceuil"])) {
                    include ("acceuil.php");
                }
                if (isset($_GET["cours"])) {
                    include ("cours.php");
                }
                if (isset($_GET["enseignant"])) {
                    include ("enseignant.php");
                }
                if (isset($_GET["ajouterClasse"])) {
                    include ("ajouterclasse.php");
                }
                if (isset($_GET["modifierClasse"])) {
                    include ("modifierClasse.php");
                }
                if (isset($_GET["modifierEnseignant"])) {
                include ("modifierEnseignant.php");
            }
            if (isset($_GET["ajouterEnseignant"])) {
                include ("ajouterEnseignant.php");
            }
                ?>
        
            </div>
        </div>
    </div>

    <script>
        //      let classe= document.getElementById("classe");
        //  let hide= document.getElementById("list");
        //  classe.addEventListener('click',()=>{
        //  hide.style.display="block";
        //  }
        //  )
    </script>
</body>

</html>