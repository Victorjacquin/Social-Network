<?php

Include ("../Modele/User_ClientPDO.php");
Include ("../Modele/User_ProfessionalPDO.php");
Include ("../Modele/Client_proPDO.php");

session_start();


    $userclient = New User_ClientPDO();             #Obtenir tous les utlisateurs clients
    $userclientt = $userclient->getUtilisateurs();
    
    $userpro = New User_ProfessionalPDO();          #Obtenir tous les utilisateurs professionels 
    $userproo = $userpro->getUtilisateurspro();
        
    $ajouter=filter_input(INPUT_POST,'ajouter');    #Bouton ajouter
    
    $retirer=filter_input(INPUT_POST,'retirer');    #Bouton retirer
    
    $idpro=filter_input(INPUT_POST,'IDPro');        #Obtenir L'idpro précis du bouton
    

    if (isset($ajouter)){                           #Si clique sur bouton ajouter, ajouter à base de donnée
            $newfollowing = New Client_proPDO();
            $ajouterfollowing = $newfollowing->addFollowing($idpro);
            $msg = 'Ajoute';
           }
           
    if (isset($retirer)){                           #Si clique sur bouton retirer, retirer base de donnée
            $newfollowing = New Client_proPDO();    
            $ajouterfollowing = $newfollowing->Unfollow($idpro);
            $msg = 'Retire';
           } 
           
    $verif = new Client_proPDO();                   #Verifier si like existe pour afficher bouton et image

include ("../Vue/Allusers.php");                    