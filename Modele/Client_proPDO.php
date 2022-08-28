<?php

include_once 'C:\wamp\www\projet\Controller\Connexion.php'; 

class Client_proPDO{
    
    function getfollowing() {
        try {
            $resultat=null;             #Eviter bug si aucun résultat
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");

            $req = $pdo->prepare("select * from client_professional,User_professional where client_professional.ID_Professional=User_professional.ID "
                    . "and ID_Client=:ID_Client");
            $req->bindValue(':ID_Client', $_SESSION['ID'], PDO::PARAM_INT);
            $req->execute();
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            
            while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
    
    function getfollowers() {
        try {
            $resultat=null;             #Eviter bug si aucun résultat
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");

            $req = $pdo->prepare("select * from client_professional,user_client where client_professional.ID_Client=user_client.ID "
                    . "and ID_Professional=:ID_Professional");
            $req->bindValue(':ID_Professional', $_SESSION['ID'], PDO::PARAM_INT);
            $req->execute();
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            
            while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
    
function addFollowing($IDPRO) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");

            $req = $pdo->prepare("insert into client_professional(ID_Client, ID_Professional) values(:ID_Client, :ID_Professional)");
            $req->bindValue(':ID_Client', $_SESSION["ID"], PDO::PARAM_INT);
            $req->bindValue(':ID_Professional', $IDPRO, PDO::PARAM_INT);
            
            
            $resultat = $req->execute();
            
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
    
    function Unfollow($IDPRO) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");

            $req = $pdo->prepare("delete from client_professional where ID_Client=:ID_Client and ID_Professional=:ID_Professional");
            $req->bindValue(':ID_Client', $_SESSION["ID"], PDO::PARAM_INT);
            $req->bindValue(':ID_Professional', $IDPRO, PDO::PARAM_INT);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
    
    function getOnefollow($ID_Client, $ID_Professional) {

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet', "root");
            
            $req = $pdo->prepare("select * from client_professional where ID_Client=:ID_Client and ID_Professional=:ID_Professional");
            $req->bindValue(':ID_Client', $ID_Client, PDO::PARAM_INT);
            $req->bindValue(':ID_Professional', $ID_Professional, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);

           
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}