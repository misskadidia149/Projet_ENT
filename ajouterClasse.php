<?php
require'bd.php';
?>
<div class="ecran">
    <div class="container" mt-5>
        <?php
        // include('message.php');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ajouter une classe
                            <a href="home.php?classe=1" class="btn btn-danger float-end" >retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post">
                            <div class="mb-3">
                                <label for="">Nom de la classe</label>
                                <input type="text" name="nom" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Designation</label>
                                <input type="text" name="designation" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Année scolaire</label>
                                <input type="text" name="year" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Niveau</label>
                                <input type="text" name="niveau" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_studentC" class="btn btn-primary" >Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
