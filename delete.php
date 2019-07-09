<?php
include_once('database/database.php');
$id = htmlentities($_GET['id']);
$query = "DELETE FROM employes WHERE id = '$id'";
if(mysqli_query($con,$query)){
    header("location:index.php?deleted=Employé supprimé avec succés");
}else{
    echo '<div class="alert alert-danger">Une erreur est survenue'.mysqli_error($con).'</div>';
}
?>