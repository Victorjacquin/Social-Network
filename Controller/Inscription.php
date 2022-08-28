<?php

   include_once"../Modele/User_ClientPDO.php";
   include_once"../Modele/User_ProfessionalPDO.php";
        
   #Formulaire en POST;

   $pseudo= filter_input(INPUT_POST, 'pseudo');
   $email= filter_input(INPUT_POST, 'email');
   $password=filter_input(INPUT_POST, 'password');
   $repass=filter_input(INPUT_POST, 'repass');
   $role = filter_input(INPUT_POST, 'role');
   $valider=filter_input(INPUT_POST,'valider');
   $erreur="";
   
   
   #Verification validation inscription 
   
   if(isset($valider)){
      if(empty($pseudo)) {$erreur="Pseudo laissé vide!";}
      elseif(empty($email)) {$erreur="Email laissé vide!";}
      elseif(empty($password)) {$erreur="Mot de passe laissé vide!";}
      elseif($password!=$repass) {$erreur="Mots de passe non identiques!";}
      
      
      #Vérifier pseudo disponible
      
      else{
          if ($role == "user"){                                                         #Verifiction utilisateur user
            $User = new User_ClientPDO($pseudo,$email,$password);
            $verif = $User->getUtilisateurByPseudo($pseudo); 
            
            if($verif){                                                             #Si tableau non vide, pseudo deja utilisé 
               $erreur="Login existe déjà!";}

            #Pseudo existe pas donc peut créer compte
            else{
               
               $Ajout = $User->addUtilisateur($pseudo, md5($password), $email);                                           #Envoyer vers login
                header("location:../index.php");
            }   
         }   
         else{                                                                              #Utilisateur Pro
            
               $Userpro = new User_ProfessionalPDO($pseudo,$email,$password);
               $verif=$Userpro->getUtilisateurByPseudo($pseudo);
               
               if($verif){                                                             #Si tableau non vide, pseudo deja utilisé 
                  $erreur="Login existe déjà!";}

               #Pseudo existe pas donc peut créer compte
               else{
                  $AjoutPro = $Userpro->addUtilisateur($pseudo, md5($password), $email);                                    #Envoyer vers login
                  header("location:../index.php");
               
      }
      
   }
      }
   }
   include ("../Vue/Inscription.php");
?>

