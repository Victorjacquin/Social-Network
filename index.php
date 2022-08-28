<?php

   include_once"Modele/User_ClientPDO.php";
   include_once"Modele/User_ProfessionalPDO.php";
   
   
   session_start();
   
 
   
   #Formulaire pour se connecter
   
   $pseudo=filter_input(INPUT_POST, 'pseudo');
   $password=filter_input(INPUT_POST, 'password');
   $valider=filter_input(INPUT_POST, 'valider');
   $erreur="";
   
   
   
   #Si clique bouton valider
   
   if(isset($valider)){
       
      $User = new User_ClientPDO();
      
      $login = $User->Login($pseudo,md5($password));        #Chercher utilisateur client qui correspond
      
      
      if($login){                                           #Si corresponds, mettre à jour les données session                  
         $_SESSION["Pseudo"]=($login["Pseudo"]);                                  
         $_SESSION["ID"]=$login["ID"];
         $_SESSION["Email"]=$login["Email"];
         $_SESSION["Pro"]=False;
         $_SESSION["autoriser"]="oui";  
         header("location:Controller/session.php");         #Diriger vers session
      }
      
      else{                                                 #Si pas trouvé 
          
          $Userpro = new User_ProfessionalPDO();
         
          
          $login2= $Userpro->Login($pseudo, md5($password))  ;   #Chercher utilisateur pro corresponds
  
          if($login2){                                           #Si pro existe, mettre à jour données session
              $_SESSION["Pseudo"]=($login2["Pseudo"]);
              $_SESSION["ID"]=$login2["ID"];
              $_SESSION["Email"]=$login2["Email"];
              $_SESSION["Pro"]=True;
              $_SESSION["autoriser"]="oui";
              header("location:Controller/session_pro.php");
          }
          else{                                                   #Si aucun compte ne correspond, afficher message 
            $erreur="Mauvais login ou mot de passe !"; 
          }
      }
      
      
   }
   
   
   include ("C:\wamp\www\projet\Vue\Login.php");
   ?>
   