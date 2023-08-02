<?php session_start();
  require"bdd.php";
?>

<?php

        if(isset($_POST['update_type'])){

            $type_id = $_POST['type_id'];
            $libelle = $_POST['libelle'];
           
            try{
                $query ="UPDATE types SET libelle =:libelle WHERE idType=:typ_id Limit 1";
                $stmt = $pdo->prepare($query);
                 $stmt->bindParam(':libelle',$libelle);
                 $stmt->bindParam(':typ_id',$type_id);
                 $query_execute = $stmt->execute();

                 if($query_execute){

                    $_SESSION['message'] =  "Modification réussie avec succès !";
                    header('Location:type.php');
                    exit(0);
    
                }else{

                    $_SESSION['message'] = "Erreur de modification à la base !";
                    header('Location:ajoutTypeProduit.php');
                    exit(0);
                }

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        if(isset($_POST['delete_type'])){

            $type_id = $_POST['delete_type'];

            try{
                  $query = "DELETE FROM types WHERE idType=:id_type";
                  $stmt = $pdo->prepare($query);
                  $data = [
                      ':id_type' =>$type_id
                  ];
                 $query_execute = $stmt->execute($data);
                 if($query_execute){
                    $_SESSION['message'] = "Suppression effectuée !";
                     header('Location: type.php');
                     exit(0);
                 }else{
                    $_SESSION['message'] = "Erreur de suppression modification ";
                    header('Location: index.php');
                    exit(0);
                 }

            }catch(PDOException $se){
                echo $e->getMessage();
            }
        }

        //----------------------Insertion base de données 
        if(isset($_POST['envoyer'])){

            $req = "INSERT INTO types (libelle) VALUES(:libelle)";
            $stmt = $pdo->prepare($req);
            $stmt->bindValue("libelle",$_POST['libelle'],PDO::PARAM_STR);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
            if($resultat>0){
                $_SESSION['message'] =  "Insertion réussi avec succès !";
                header('Location:type.php');
                exit(0);

            }else{
                $_SESSION['message'] = "Erreur d'insertion à la base !";
                header('Location:ajoutTypeProduit.php');
            }
             //-------------fin insertion table types produits-----------------------------
        } 

        if(isset($_POST['ajout_produit'])){

            $nom = $_POST['nom'];
            $desc = $_POST['description'];
            $type = $_POST['libelle_type'];

            try{
                 
               
                $req = "INSERT INTO produits(libelle,descriptio,idType) VALUES(:libelle,:descriptio,:idType)";
                $stmt = $pdo->prepare($req);
                $stmt->bindValue("libelle",$nom,PDO::PARAM_STR);
                $stmt->bindValue("descriptio",$desc,PDO::PARAM_STR);
                $stmt->bindValue("idType",$type);
                $resultat = $stmt->execute();
                 $stmt->closeCursor();

              if($resultat>0){
                $_SESSION['message'] =  "Insertion réussi avec succès !";
                header('Location:produit.php');
                exit(0);

              }else{
                $_SESSION['message'] = "Erreur d'insertion à la base !";
                header('Location:ajoutTypeProduit.php');
             }

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        if(isset($_POST['update_produit'])){

            $produit_id = $_POST['produit_id'];
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $type_produit = $_POST['type_id'];
           
            try{
                $query ="UPDATE produits SET libelle =:libelle,descriptio=:descriptio,idType=:typ_id
                 WHERE id=:produit_id Limit 1";
                  $stmt = $pdo->prepare($query);
                 $stmt->bindParam(':libelle',$libelle,PDO::PARAM_STR);
                 $stmt->bindParam(':descriptio',$description,PDO::PARAM_STR);
                 //Pour modifier  une clé etrangére il faut utiliser le bindValue
                 $stmt->bindValue(':typ_id',$type_produit,PDO::PARAM_INT);
                 $stmt->bindParam(':produit_id',$produit_id,PDO::PARAM_INT);
                 $query_execute = $stmt->execute();

                 if($query_execute){

                    $_SESSION['message'] =  "Modification réussie avec succès !";
                    header('Location:produit.php');
                    exit(0);
    
                }else{

                    $_SESSION['message'] = "Erreur de modification à la base !";
                    header('Location:ajoutTypeProduit.php');
                    exit(0);
                }

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        if(isset($_POST['delete_produit'])){

            $produit_id = $_POST['delete_produit'];

            try{
                  $query = "DELETE FROM produits WHERE id=:idProduit";
                  $stmt = $pdo->prepare($query);
                  $data = [
                      ':idProduit' =>$produit_id
                  ];
                 $query_execute = $stmt->execute($data);
                 if($query_execute){
                    $_SESSION['message'] = "Suppression effectuée !";
                     header('Location: produit.php');
                     exit(0);
                 }else{
                    $_SESSION['message'] = "Erreur de suppression modification ";
                    header('Location: ajoutProduit.php');
                    exit(0);
                 }

            }catch(PDOException $se){
                echo $e->getMessage();
            }
        }
       
        
?>