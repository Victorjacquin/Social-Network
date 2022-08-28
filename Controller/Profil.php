<?php

   include"../Modele/PostPDO.php"; 
   include"../Modele/Like_PDO.php";
   include"../Modele/Client_proPDO.php";
   include"../Modele/User_ClientPDO.php";
   
   session_start();
   
   $following = new Client_proPDO;                  
   $mesfollowing = $following->getfollowing();              #Obtenir les personnes suivies par un client
   
   $follower = new Client_proPDO;
   $mesfollowers = $follower->getfollowers();               #Obtenir les abonnés d'un pro
   
   $postlike= new Like_PDO();
   $meslike = $postlike->getLikeByIDClient();               #Obtenir les likes d'un client      
   
   if ($mesfollowing){                                      #Si le client suit des pro, compter le nombre
   $nb=count($mesfollowing);
   }
   else {$nb=0;};                                           #Sinon nombre=0
  
   if ($mesfollowers){                                      #Si pro a au moins 1 abonné, compter le nombnre
   $nbpro=count($mesfollowers);     
   }
   else {$nbpro=0;};                                        #Sinon 0 abonné
   
   $newpassword = filter_input(INPUT_POST, 'newpassword');  #Formulaire nouveau mot de pass 
   $valider=filter_input(INPUT_POST,'valider');
   
   if(isset($valider)){                                     #Si clique sur valider, changer le mot de passe 
        $password = new User_ClientPDO;
        $passwordd = $password->updatePassword(md5($newpassword));
   }
   include"../Vue/Profil.php";