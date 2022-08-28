<?php
        class Connexion{
            
            public function ConnexionPDO(){
            try {
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                print "Erreur de connexion PDO ";
                die();
            }
        }

}
    
