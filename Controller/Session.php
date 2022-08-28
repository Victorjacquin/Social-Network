<?php

   include"../Modele/PostPDO.php"; 
   include"../Modele/Like_PDO.php";
   
   session_start();
   
   #Revenir page login si autorisation pas donnée
   
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   
   #Message bienvenue
   
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["Pseudo"].
      " dans votre espace personnel";
      
      #Bouton like et retirer like
      
       $like=filter_input(INPUT_POST,'like');                   
       $retirerlike=filter_input(INPUT_POST,'retirerlike');
       
       #Obtenir tous les posts
           
       $mesposts = New PostPDO();
       $postes = $mesposts->getPost();
       
       #Obtenir ID du post précis 
       
       $IDPost= filter_input(INPUT_POST,'IDPost');
       
       #Si clique sur bouton like, ajouter base de données
       
       if (isset($like)){
        $monlike = New Like_PDO();
        $ajouterlike = $monlike->addLike($IDPost);
       }
       
       #Si clique sur bouton retirerlike, retire de base de données le like du post
       
       if (isset($retirerlike)){
        $suplike = New Like_PDO();
        $supplike = $suplike->deleteLike($IDPost);
       }
       
       #Verifier si client a liké pour afficher bouton et image 
          
       $verif = new Like_PDO();     
      
   include ("../Vue/Session.php");
?>