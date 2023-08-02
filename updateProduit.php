<?php ob_start();?>
<?php
  require"bdd.php";
   //recuperons d'abord les types de produits dans le champ select
    $query = "SELECT * FROM types";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if(isset($_GET['id'])){

    $produit_id = $_GET['id'];
    

    $query = "SELECT * FROM produits WHERE id=? Limit 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1,$produit_id,PDO::PARAM_INT);
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
                    <input type="hidden"  class="form-control" name="produit_id" value="<?= $data['id'];?>">
                        <div class="form-group">
                                <label for="nom">Libelle : </label>
                                <input type="text" class="form-control" name="libelle" value="<?= $data['libelle'];?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Description :</label>
                               <textarea class="form-control" name="description" rows="3" ><?=$data['descriptio'] ;?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="type">Type produits</label>
                                <select class="form-control" name="type_id">
                                    <?php foreach($resultat as $res) :?>
                                    <option value="<?=$res['idType'];?>"><?=$res['libelle'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                        
                            <button type="submit" class="btn btn-primary m-3" name="update_produit">Modifier</button>
                            <a class="btn btn-success m-3" href="produit.php" role="button">Liste</a>
                  </form>
                 </div>
                 </div>
            </div>
        </div>
<?php

$content = ob_get_clean();
require"template.php";
?>
