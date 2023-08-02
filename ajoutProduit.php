<?php ob_start(); ?>
<?php
require"bdd.php";
               $query = "SELECT * FROM types";
                 $stmt = $pdo->prepare($query);
                $stmt->execute();
                $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
?>
<div class="container">
       <div class="class row ">
           <div class="col-md-8 mt-4">
               <div class="card">
                  <div class="card-header">
                     <h4>Ajout d'un  de produt</h4>
                  </div>
                  
                <div class="card-body">
                    <form method="POST" action="code.php" >
                        <div class="form-group">
                            <label for="nom">Libelle : </label>
                            <input type="text" class="form-control" name="nom">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description :</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="type">Type produits</label>
                            <select class="form-control" name="libelle_type">
                                <?php foreach($resultat as $res) :?>
                                <option value="<?=$res['idType'];?>"><?=$res['libelle'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <button type="submit" name="ajout_produit" class="btn btn-primary m-3">Valider</button>
                        <a class="btn btn-success m-3" href="produit.php" role="button">Liste Produit</a>
     </form>
    </div>
</div>
</div>


<?php
$content = ob_get_clean();
require"template.php";
?>