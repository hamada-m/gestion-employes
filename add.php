<?php
include_once('includes/header.php');
include_once('database/functions.php');
$errors = [];
$message="";
?>
 
            <?php 
               
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
                          'matricule'=>$matricule,
                         );
                     }
                        if(emp_insert($con,$values)){
                           redirect('index.php?message=Employé ajouté avec succés');
                        }
                        else{
                            $message ='<div class="alert alert-success">Une erreur est survenue veuiller réessayer!</div>';
                        }
                }
            ?>
              <div class="container">
                 <div class="row ">
                    <div class="col-md-8 mx-auto mt-4">
                     <div class="card">     
                        <legend><h3 class="card-title text-info pt-2 px-3 text-center mb-0" >Ajouter un employé</h3></legend>
                        <hr>
                        <?php
                         if(!empty($errors)){
                             echo '<div class="alert alert-danger">'.$errors.'</div>' ;
                         }
                          else{
                              echo $message;
                          }
                        ?>
                     <div class=" card-body">
                     <form class="form-horizontal" method="post" action="add.php" id="form">
                       <fieldset>
                        <div class="form-group">
                            <label for="nom" class="col-lg-2 control-label">Nom*</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom']:'';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="col-lg-2 control-label">Prénom*</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo isset($_POST['prenom']) ? $_POST['prenom']:'';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age" class="col-lg-2 control-label">Age*</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control" id="age" name="age" placeholder="Age" value="<?php echo isset($_POST['age']) ? $_POST['age']:'';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="service" class="col-lg-2 control-label">Service*</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="service" name="service" placeholder="Service" value="<?php echo isset($_POST['service']) ? $_POST['service']:'';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="matricule" class="col-lg-2 control-label">Matricule*</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="matricule" name="matricule" placeholder="Matricule"value="<?php echo isset($_POST['matricule']) ? $_POST['matricule']:'';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary" id="submit" name="submit">Valider</button>
                            </div>
                        </div>
                    </fieldset>
               </form>
             </div>
            </div>  
        </div>
    </div>
</div>
<?php
  include_once('includes/footer.php');
?>