<?php ob_start();?>
<?php session_start(); 
require "bdd.php";
?>
    <?php
        //------------AFFICHAGE DES de donees de notre table types-----------------
        $req = $pdo->prepare("SELECT * FROM types");
        $req->execute();
        $types = $req->fetchAll(PDO::FETCH_ASSOC);

        
       
    ?>
            
     <div class=" container">
       <div class="class row ">
           <div class="col-md-12 mt-4">
            <?php if(isset($_SESSION['message'])): ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message'] ;?></h5> 
                  <?php
                     unset($_SESSION['message']);
                  endif;
                  ?>
               <div class="card">
                  <div class="card-header">
                  <a class="btn btn-primary btn-lg ml-4" href="ajoutTypeProduit.php" role="button">Ajouter type</a>
                  </div>
                  
                <div class="card-body">
    <table class="table table-striped mt-4 ">
			<thead>
				<tr>
					<th>id</th>
					<th>Libelle</th>
					
              </tr>
         </thead>
         <tbody>
             <?php foreach($types as $type) :?>
             <tr>
                 <td><?= $type['idType'];?></td>
                 <td><?= $type['libelle'];?></td>
                 <td > <a href="updateTypeProduit.php?idType=<?= $type['idType'];?>" class="btn btn-primary text-white">Modifier</a>
                </td>
                <td>
                     <form action="code.php" method="POST">
                         <button type="submit" value="<?=$type['idType'];?> " name="delete_type" class="btn btn-danger">Supprimer</button>
                     </form>
                    </td> 
             </tr>
             <?php endforeach; ?>
 </tbody>
    </table>
     </div>  
</div>   
</div>
<?php

$content = ob_get_clean();
require"template.php";
?>