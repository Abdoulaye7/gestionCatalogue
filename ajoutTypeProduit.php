<?php ob_start();?>
<?php session_start();?>
   
    <?php
            //-------------------connexion à notre bdd avec PDO---------
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=catalogue', "root", "");
            
            
        }catch(PDOException $e){
            echo "Connexion echoué !".$e->getMessage()."</br>";
        }
    
    ?>
  
   <div class=" container">
       <div class="class row ">
           <div class="col-md-12 mt-4">
               <div class="card">
                  <div class="card-header">
                     <h4>Ajout d'un type de produt</h4>
                  </div>
                  
                <div class="card-body">
                   <form method="POST" action="code.php">
                      <div class="form-group">
                        <label for="nom">Libelle : </label>
                        <input type="text" class="form-control" name="libelle">
                    </div>
                
                    <button type="submit" name="envoyer" class="btn btn-primary m-3">Valider</button>
                    <a class="btn btn-success m-3" href="type.php" role="button">Liste type produit</a>
            </form>
                </div>
            </div>
            </div>

<?php
$content = ob_get_clean();
require"template.php";
?>