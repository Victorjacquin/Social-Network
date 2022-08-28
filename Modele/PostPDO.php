<?php

include_once 'C:\wamp\www\projet\Controller\Connexion.php';  
class PostPDO{
    
    public function getPost() {

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");
        $req = $pdo->prepare("select * from post, user_professional where post.ID_professional = user_professional.ID Order by Date desc");
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


    public function getPostByID($ID) {

        try {
            $resultat=null;
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");
            $req = $pdo->prepare("select * from post where ID_Professional=:ID Order by Date desc");
            $req->bindValue(':ID', $ID, PDO::PARAM_INT);
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
    
     public function addPost($libellé) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");

            $req = $pdo->prepare("insert into post(Libelle, ID_Professional) values(:Libelle, :ID_Professional)");
            $req->bindValue(':Libelle', $libellé, PDO::PARAM_STR);
            $req->bindValue(':ID_Professional', $_SESSION['ID'], PDO::PARAM_INT);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}