<?php
session_start();
require'bd.php';

if(isset($_POST['delete_studentC'])){
    $student_id= mysqli_real_escape_string($con,$_POST['id']);
    $query="DELETE FROM classes WHERE id= $student_id";
    $query_run=mysqli_query($con,$query);
    if($query_run){
        $_SESSION['message']="Etudiant supprimer avec succès";
        header("Location:index.php");
        exit(0);
    }else{
        $_SESSION['message']="Etudiant non supprimer";
        header("Location:index.php");
        exit(0);
    }
}

if(isset($_POST['update_studentC']))
{
    $student_id=mysqli_real_escape_string($con,$_POST['student_id']);
    $nom= mysqli_real_escape_string($con, $_POST['nom']);
    $designation= mysqli_real_escape_string($con, $_POST['designation']);
    $year= mysqli_real_escape_string($con, $_POST['year']);
    $niveau= mysqli_real_escape_string($con, $_POST['niveau']);

    $query="UPDATE classes SET nom='$nom', designation='$designation', year='$year', niveau='$niveau' WHERE id='$student_id' ";
    $query_run=mysqli_query($con,$query);
    if( $query_run){
        $_SESSION['message']="Etudiant mis à jour avec succès";
        header("Location: home.php?classe=1");
        exit(0);
    }
    else{
        $_SESSION['message']="Echec! ";
        header("Location: home.php?classe=1");
        exit(0);
    }
}

if(isset($_POST['save_studentC'])){
    $nom= mysqli_real_escape_string($con, $_POST['nom']);
    $designation= mysqli_real_escape_string($con, $_POST['designation']);
    $year= mysqli_real_escape_string($con, $_POST['year']);
    $niveau= mysqli_real_escape_string($con, $_POST['niveau']);

    $query="INSERT INTO classes (nomClasse,designationClasse,anneeScolaire,niveau) 
    VALUES('$nom','$designation','$year','$niveau')";
    $query_run=mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['message']="Etudiant enregistrer avec succès";
        header("Location: home.php?classe=1");
        exit(0);
    }
}
