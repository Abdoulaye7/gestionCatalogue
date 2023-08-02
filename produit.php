<?php ob_start();?> 
  
<?php session_start();

require"bdd.php";
            $req = $pdo->prepare("SELECT * FROM produits");
            $req->execute();
            $produits = $req->fetchAll(PDO::FETCH_ASSOC);

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
                     <a class="btn btn-primary btn-lg" href="ajoutProduit.php" role="button">Ajouter Produit</a>
                  </div>
                  
                <div class="card-body">
    <table class="table text-center table-striped mt-4 ">
			<thead>
				<tr>
					<th>id</th>
					<th>Libelle</th>
					<th>Description</th>
					<th>Type produits</th>
                    <th colspan="2"> Actions</th>
              </tr>
         </thead>
         <tbody>
             <?php foreach($produits as $produit) :?>
             <tr>
                 <td><?= $produit['id'];?></td>
                 <td><?= $produit['libelle'];?></td>
                 <td><?= $produit['descriptio'];?></td>
                 <td><?= $produit['idType'];?></td>
                 <td > <a href="updateProduit.php?id=<?= $produit['id'];?>" class="btn btn-primary text-white">Modifier</a>
                </td>
                <td>
                     <form action="code.php" method="POST">
                         <button type="submit" value="<?=$produit['id'];?> " name="delete_produit" class="btn btn-danger">Supprimer</button>
                     </form>
                    </td> 
             </tr>
             <?php endforeach; ?>
 </tbody>
    </table>
</div>


<?php

$content = ob_get_clean();
require"template.php";
?>