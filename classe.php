<?php
require 'bd.php';
?>
<div class="ecran" id="list">
    <h2 style="color: rgb(24, 239, 60)">GESTION DES CLASSES</h2>
    <div class="classe"></div>
    <div class="tableau">
        <div class="card-body">
            <?php if (isset($_GET['classe'])): ?>
            <div class="card-header">
                <h4>Details Classes
                    <a href="home.php?ajouterClasse=1" class="btn btn-primary float-end">Ajouter</a>
                </h4>
            </div>
            <div class="card-body">
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
                            $query = "SELECT * FROM classes";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $student): ?>
                        <tr>
                            <td><?= htmlspecialchars($student['idClasse']); ?></td>
                            <td><?= htmlspecialchars($student['nomClasse']); ?></td>
                            <td><?= htmlspecialchars($student['designationClasse']); ?></td>
                            <td><?= htmlspecialchars($student['anneeScolaire']); ?></td>
                            <td><?= htmlspecialchars($student['niveau']); ?></td>
                            <td>
                                <a href="home.php?enseignant=1&id=<?= htmlspecialchars($student['idClasse']); ?>"
                                    class="btn btn-info btn-sm">Voir</a>
                                <a href="home.php?modifierClasse=1&id=<?= htmlspecialchars($student['idClasse']); ?>"
                                    class="btn btn-success btn-sm">Modifier</a>
                                <form action="code.php" method="post" class="d-inline">
                                    <input type="hidden" name="idClasse"
                                        value="<?= htmlspecialchars($student['idClasse']); ?>">
                                    <button type="submit" name="delete_studentC"
                                        class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; 
                            } else { ?>
                        <tr>
                            <td colspan="6">Aucune classe trouvée</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <p>Aucune classe sélectionnée</p>
            <?php endif; ?>
        </div>
    </div>
</div>