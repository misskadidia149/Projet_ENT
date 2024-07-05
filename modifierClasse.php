<?php
require 'bd.php';
// $bd=new PDO('mysql:host=localhost;dbname=ent','root','');

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
                        <h4>Modifier une classe
                            <a href="home.php?classe=1" class="btn btn-danger float-end">RETOUR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM classes WHERE id='$student_id'";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="post">
                                    <input type="hidden" name="student_id" value="<?=$student['idClasse']; ?>" >
                                    <div class="mb-3">
                                        <label for="">Nom de la classe</label>
                                        <input type="text" name="nom" value="<?=$student['nomClasse'] ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Désignation</label>
                                        <input type="text" name="designation" value="<?=$student['designationClasse'] ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Année scolaire</label>
                                        <input type="text" name="year" value="<?=$student['anneeScolaire'] ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Niveau</label>
                                        <input type="text" name="phone" value="<?=$student['niveau'] ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_studentC" class="btn btn-primary">Mettre à jour</button>
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