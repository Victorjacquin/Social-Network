<?php

include_once 'C:\wamp\www\projet\Controller\Connexion.php'; 


class User_ClientPDO{
    
    function getUtilisateurs() {

    try {
         
        $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");
        $req = $pdo->prepare("select * from user_client");
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


    function getUtilisateurByID($ID) {

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");
            $req = $pdo->prepare("select * from user_client where ID=:ID");
            $req->bindValue(':ID', $ID, PDO::PARAM_INT);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getUtilisateurByPseudo($pseudo) {

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");
            $req = $pdo->prepare("select * from user_client where Pseudo=:Pseudo");
            $req->bindValue(':Pseudo', $pseudo, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function Login($pseudo, $password) {

        try {
            
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");
            $req = $pdo->prepare("select * from user_client where Pseudo=:Pseudo and Password=:Password");
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

    function getUtilisateurByEmail($email) {

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");
            $req = $pdo->prepare("select * from user_client where email=:email");
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
    
   

    function addUtilisateur($pseudo, $password, $email) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");

            $req = $pdo->prepare("insert into user_client (Pseudo, Password, Email) values(:Pseudo,:Password,:Email)");
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

        function updatePassword($newpassword) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet',"root");

            $req = $pdo->prepare("update user_client set password=:Password where ID=:ID");
            $req->bindValue(':ID', $_SESSION['ID'], PDO::PARAM_INT);
            $req->bindValue(':Password', $newpassword, PDO::PARAM_STR);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}