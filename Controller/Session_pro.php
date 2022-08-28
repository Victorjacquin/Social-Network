<?php

include"../Modele/PostPDO.php"; 

   session_start();
   
   #Revenir page login si autorisation pas donnée 
   
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
   
   #Message bienvenue
   
   
      $bienvenue="Bonjour et bienvenue ".               
      $_SESSION["Pseudo"].
      " dans votre espace personnel."
      ."<br>Vous êtes sur un compte professionnel.";
      
      #Pour ecrire nouveau post
      
      $libellé= filter_input(INPUT_POST, 'libellé');
      $valider=filter_input(INPUT_POST,'valider');
      $erreur="";
      
      
      if(isset($valider)){                  #Si clique sur valider
        if(empty($libellé)){                #Si rien écris
            $erreur="Post vide !";}  
        else{
            $nouveaupost= new PostPDO($libellé);            #Creation post
            $poster =$nouveaupost->addPost($libellé);
        }
      
       }

       $mesposts= New PostPDO();
       $postes = $mesposts->getPostByID($_SESSION["ID"]);          #Obtenir posts du pro
       
       
       
      include ("../Vue/Session_pro.php");
        
?>
    