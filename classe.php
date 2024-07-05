<?php
require'bd.php';
?>
  <div class="ecran" id="list">
    <h2 style="color: rgb(24, 239, 60)"  >GESTION DES CLASSES</h2>
    <div class="classe">
                  </div>
                  <div class="tableau">
                  <div class="card-body">
                    <?php
                    if(isset($_GET['classe'])){ 
                      ?>
                    
                    
                    <div class="card-header">
                        <h4>Details Classes
                            <a href="home.php?ajouterClasse=1" class="btn btn-primary float-end">Ajouter</a>
                        </h4>
                    </div>
                    <div class="card-body"  >
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom de la classe</th>
                                    <th>Désignation</th>
                                    <th>Année scolaire</th>
                                    <th>Niveau</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $query = "SELECT * FROM classes ";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach($query_run as $student) {
                                        // echo $student['name'];
                                        ?>
                                        <tr>
                                            <td><?= $student['idClasse']; ?></td>
                                            <td><?= $student['nomClasse']; ?></td>
                                            <td><?= $student['designationClasse']; ?></td>
                                            <td><?= $student['anneeScolaire']; ?></td>
                                            <td><?= $student['niveau']; ?></td>
                                            <td>
                                                <a href="home.php?enseignant=1?id=<?= $student['idClasse']; ?>"
                                                    class="btn btn-info btn-sm">Voir</a>
                                                <a href="home.php?modifierClasse=1?id=<?= $student['idClasse']; ?>"
                                                    class="btn btn-success btn-sm">Modifier</a>
                                                    <form action="code.php" method="post" class="d-inline" >
                                                    <button type="submit" name="delete_studentC " method="POST"   class="btn btn-danger btn-sm" >Supprimer</button>
                                                    </form>
                                            </td>
                                            <?php 
                }
                                  } 
              
                 
                ?>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <?php 
              
                 }
                ?>

                  </div>
                  
