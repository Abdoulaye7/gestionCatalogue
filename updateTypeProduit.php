<?php ob_start();?>
<?php session_start();
  require"bdd.php";
?>
<?php


//-----------Modification de la table type en recuperant l'identifiant------
if(isset($_GET['idType'])){
    $type_id = $_GET['idType'];

    $query = "SELECT * FROM types WHERE idType=? Limit 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1,$type_id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
} 
    ?>

   
    <div class=" container">
       <div class="class row ">
           <div class="col-md-12 mt-4">
               <div class="card">
                  <div class="card-header">
                     <h4>Modification d'un type de produt</h4>
                  </div>
                <div class="card-body">
                    <form method="POST" action="code.php" >
                    <input type="hidden"  class="form-control" name="type_id" value="<?= $data['idType'];?>">
                        <div class="form-group">
                                <label for="nom">Libelle : </label>
                                <input type="text" class="form-control" name="libelle" value="<?= $data['libelle'];?>">
                            </div>
                        
                            <button type="submit" class="btn btn-primary m-3" name="update_type">Modifier</button>
                            <a class="btn btn-success m-3" href="type.php" role="button">Liste</a>
                  </form>
                 </div>
                 </div>
            </div>
        </div>
</div>
<?php

$content = ob_get_clean();
require"template.php";
?>
