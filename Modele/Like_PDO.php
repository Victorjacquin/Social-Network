<?php

include_once 'C:\wamp\www\projet\Controller\Connexion.php'; 
class Like_PDO {

    function getLikes() {

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet', "root");
            $req = $pdo->prepare("select * from like_, post where like_.ID_Post = post.ID");
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

    function getLikeByIDClient() {

        try {
            $resultat = null;               #Eviter bug si aucun resultat
            $pdo = new PDO('mysql:host=localhost;dbname=projet', "root");
            $req = $pdo->prepare("select * from like_, post where like_.ID_Post = post.ID_Post and ID_Client=:ID_Client");
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
    
    function getOneLike($ID_Client, $ID_Post) {

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet', "root");
            
            $req = $pdo->prepare("select * from like_ where ID_Client=:ID_Client and ID_Post=:ID_Post");
            $req->bindValue(':ID_Client', $ID_Client, PDO::PARAM_INT);
            $req->bindValue(':ID_Post', $ID_Post, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);

           
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }


    public function addLike($ID) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet', "root");

            $req = $pdo->prepare("insert into like_(ID_Client, ID_Post) values(:ID_Client, :ID_Post)");
            $req->bindValue(':ID_Client', $_SESSION["ID"], PDO::PARAM_INT);
            $req->bindValue(':ID_Post', $ID, PDO::PARAM_INT);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function deleteLike($ID) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet', "root");

            $req = $pdo->prepare("delete from like_ where ID_Client=:ID_Client and ID_Post=:ID_Post");
            $req->bindValue(':ID_Client', $_SESSION["ID"], PDO::PARAM_INT);
            $req->bindValue(':ID_Post', $ID, PDO::PARAM_INT);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

}
