<?php
require 'bd.php';

?>
<div class="ecran">
    <div class="container" mt-5>
        <?php
        // include ('message.php');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Modification Enseignant
                            <a href="home.php?enseignant=1" class="btn btn-danger float-end">RETOUR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM enseignant WHERE id='$student_id'";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="post">
                                    <input type="hidden" name="student_id" value="<?=$student['id']; ?>" >
                                    <div class="mb-3">
                                        <label for="">Nom</label>
                                        <input type="text" name="nom" value="<?=$student['nom'] ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Prénom</label>
                                        <input type="text" name="designation" value="<?=$student['prenom'] ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Numéro de téléphone</label>
                                        <input type="text" name="year" value="<?=$student['contact'] ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Adresse Email</label>
                                        <input type="text" name="phone" value="<?=$student['email'] ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_studentE" class="btn btn-primary">Mettre à jour</button>
                                    </div>
                                </form>
                                <?php
                            } else {
                                echo "<h4>Aucune source n'a été trouvée</h5>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>