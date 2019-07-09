 <?php
include('includes/header.php');
include('database/functions.php');
$result = emp_get($con);

?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-4">
            <?php
               if(isset($_GET['message'])){
                    echo '<div class="alert alert-success">'.$_GET['message'].'</div>';
               }else if(isset($_GET['deleted'])){
                    echo '<div class="alert alert-success">'.$_GET['deleted'].'</div>';
               }else if(isset($_GET['updated'])){
                    echo '<div class="alert alert-success">'.$_GET['updated'].'</div>';
               }
            ?>
            <div class=" card">
            <div class=" card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Age</th>
                        <th>Service</th>
                        <th>Matricule</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    
                    while($row = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td><?php echo $row['nom'];?></td>
                        <td><?php echo $row['prenom'];?></td>
                        <td><?php echo $row['age'];?></td>
                        <td><?php echo $row['service'];?></td>
                        <td><?php echo $row['matricule'];?></td> 
                        <td><a href="update.php?id=<?php echo $row['id'];?>"  class="btn btn-warning btn-xs"><i class="fa fa-marker" title="Modifier"></i></a> <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs" title="Supprimer"><i class="fas fa-trash"></i></a></td>
                    </tr>
                <?php 
                    endwhile;
                ?>
                </tbody>
            </table>
            </div>
          </div>
        </div>
    </div>
</div>
<?php
  include_once('includes/footer.php');
?>