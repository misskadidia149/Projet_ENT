<?php
require'bd.php';
?>

<div class="ecran">
<a href="home.php?classe=1" class="btn btn-danger float-right">Retour</a><br><br><br>

<div class="tableau">
                  <div class="card-body">
                    <?php
                    // if(isset($_POST['btnClasse'])){ 
                      ?>
                    
                    
                    <div class="card-header">
                        <h4>Details Enseignant
                            <a href="home.php?classe=1" class="btn btn-primary float-end">Ajouter</a>
                        </h4>
                    </div>
                    <div class="card-body"  >
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $query = "SELECT * FROM enseignant ";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                //         // echo $student['name'];
                                        ?>
                                        <tr>
                                            <td><?= $student['id']; ?></td>
                                            <td><?= $student['nom']; ?></td>
                                            <td><?= $student['prenom']; ?></td>
                                            <td><?= $student['contact']; ?></td>
                                            <td><?= $student['email']; ?></td>

                                            <td>
                                                <a href="Enseignant.php?"
                                                    class="btn btn-info btn-sm">Voir</a>
                                                <a href=""
                                                    class="btn btn-success btn-sm">Modifier</a>
                                                    <form action="code.php" method="post" class="d-inline" >
                                                    <button type="submit" name="delete_student " method="POST"   class="btn btn-danger btn-sm" >Supprimer</button>
                                                    </form>
                                            </td>

                                        </tr>
                                        <?php 
                }
                                  } 
              
                 
                ?>
                            </tbody>
                        </table>
                    </div>

                  </div>
                </div>
                <div class="tableau">
                  <div class="card-body">
                    <?php
                    // if(isset($_POST['btnClasse'])){ 
                      ?>
                    
                    <div class="espace">
                    <div class="card-header">
                        <h4>Details Etudiants
                            <a href="home.php?classe=1" class="btn btn-primary float-end">Ajouter</a>
                        </h4>
                    </div>
                    <div class="card-body"  >
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Matricule</th>
                                    <th>Nom </th>
                                    <th>Prenom </th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Date Naissance</th>
                                    <th>Date Inscription</th>
                                    <th>Classe</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $query = "SELECT * FROM etudiant ";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                //         // echo $student['name'];
                                        ?>
                                        <tr>
                                            <td><?= $student['id']; ?></td>
                                            <td><?= $student['matricule']; ?></td>
                                            <td><?= $student['nom']; ?></td>
                                            <td><?= $student['prenom']; ?></td>
                                            <td><?= $student['contact']; ?></td>
                                            <td><?= $student['email']; ?></td>
                                            <td><?= $student['datenaiss']; ?></td>
                                            <td><?= $student['dateInscription']; ?></td>
                                            <td><?= $student['classeETUDIANT']; ?></td>


                                            <td>
                                                <a href="Enseignant.php?"
                                                    class="btn btn-info btn-sm">Voir</a>
                                                <a href=""
                                                    class="btn btn-success btn-sm">Modifier</a>
                                                    <form action="code.php" method="post" class="d-inline" >
                                                    <button type="submit" name="delete_student " method="POST"   class="btn btn-danger btn-sm" >Supprimer</button>
                                                    </form>
                                            </td>

                                        </tr>
                                        <?php 
                }
                                  } 
              
                 
                ?>
                            </tbody>
                        </table>
                    </div>

                  </div>
                </div>
</div>
</div>
