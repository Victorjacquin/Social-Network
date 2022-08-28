<?php

include_once 'C:\wamp\www\projet\Controller\Connexion.php'; 

class User_ProfessionalPDO{
    
    public function Login($pseudo, $password) {

    try {
        
        $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");
        $req = $pdo->prepare("select * from user_professional where Pseudo=:Pseudo and Password=:Password");
        $req->bindValue(':Pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindValue(':Password', $password, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
    
    public function getUtilisateurspro() {

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");
        $req = $pdo->prepare("select * from user_professional");
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


    public function getUtilisateurByID($ID) {

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");
            $req = $pdo->prepare("select * from user_professional where ID=:ID");
            $req->bindValue(':ID', $ID, PDO::PARAM_INT);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getUtilisateurByPseudo($pseudo) {

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");
            $req = $pdo->prepare("select * from user_professional where Pseudo=:Pseudo");
            $req->bindValue(':Pseudo', $pseudo, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getUtilisateurByEmail($email) {

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");
            $req = $pdo->prepare("select * from user_professional where email=:email");
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }



    public function addUtilisateur($pseudo, $password, $email) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");

            $req = $pdo->prepare("insert into user_professional (Pseudo, Password, Email) values(:Pseudo,:Password,:Email)");
            $req->bindValue(':Pseudo', $pseudo, PDO::PARAM_STR);
            $req->bindValue(':Password', $password, PDO::PARAM_STR);
            $req->bindValue(':Email', $email, PDO::PARAM_STR);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}