<?php
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=catalogue', "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            
            
        }catch(PDOException $e){
            echo "Connexion echoué !".$e->getMessage()."</br>";
        }
?>
      
    