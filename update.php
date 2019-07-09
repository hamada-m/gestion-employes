<?php
include_once('includes/header.php');
include_once('database/functions.php');
$errors=[];
$message='';
$id =$_GET['id'];
$result=get_emp_by_id($con,$id);
if(isset($_POST['submit'])){
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $age = htmlentities($_POST['age']);
    $service = htmlentities($_POST['service']);
    $matricule = htmlentities($_POST['matricule']);
    if(empty($nom)){
        $errors = 'veuillez entrer le nom';
    }
    elseif(empty($prenom)){
        $errors = 'veuillez entrer le prenom';
    }
    elseif(empty($age)){
        $errors = 'veuillez entrer l\'age';
    }
    elseif(empty($service)){
        $errors = 'veuillez entrer le service';
    }
    elseif(empty($matricule)){
        $errors = 'veuillez entrer le matricule';
    }
    else{
        $values = array(
            'nom'=>$nom,
            'prenom'=>$prenom,
            'age'=>$age,
            'service'=>$service,
            'matricule'=>$matricule
        );
        if(emp_update($con, $id, $values)){
           header("location: index.php?updated=Employé modifié avec succés");
        }else{
            echo '<div class="alert alert-danger">Une erreur est survenue'.mysqli_error($con).'</div>';
        }
    }
   
}
?>

            <?php 
               
               while($row = $result->fetch_assoc()): 
            ?>
     <div class="container">
        <div class="row ">
            <div class="col-md-8 mx-auto mt-4">
               <div class="card">
                  <div class=" card-body">
                     <form class="form-horizontal" id="form" method="post" action="update.php?id=<?php echo $row['id'];?>">
                      <fieldset>
                      <legend><h3 class="text-info text-center">Modifier un employé</h3></legend>
                      <hr>
                      <div class="form-group">
                         <label for="nom" class="col-lg-2 control-label">Nom</label>
                      <div class="col-lg-10">
                          <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo $row['nom'];?>">
                       </div>
                       </div>
                       <div class="form-group">
                           <label for="prenom" class="col-lg-2 control-label">Prénom</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo $row['prenom'];?>">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="age" class="col-lg-2 control-label">Age</label>
                        <div class="col-lg-10">
                             <input type="number" class="form-control" id="age" name="age" placeholder="Age" value="<?php echo $row['age'];?>">
                        </div>
                        </div>
                        <div class="form-group">
                             <label for="service" class="col-lg-2 control-label">Service</label>
                        <div class="col-lg-10">
                                <input type="text" class="form-control" id="service" name="service" placeholder="Service" value="<?php echo $row['service'];?>">
                        </div>
                        </div>
                        <div class="form-group">
                                <label for="matricule" class="col-lg-2 control-label">Matricule</label>
                        <div class="col-lg-10">
                                <input type="number" class="form-control" id="matricule" name="matricule" placeholder="Matricule" value="<?php echo $row['matricule'];?>">
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary" id="submit" name="submit">Valider</button>
                        </div>
                        </div>
                   </fieldset>
                </form>
             <?php 
                endwhile;
            ?>
          </div>
        </div>
    </div>
</div>
</div>
<?php
  include_once('includes/footer.php');
?>