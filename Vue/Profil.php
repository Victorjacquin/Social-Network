<?php include("C:\wamp\www\projet\Vue\Header.php");?>

<p class ="profil">Bienvenue dans votre espace personnel  <?php echo $_SESSION["Pseudo"];?><br>                         <!-- Afficher message -->
    Vous retrouverez ici les informations de votre profil</p>
<p class ="profil">Votre pseudo : <?php echo $_SESSION['Pseudo']?><br> Votre email : <?php echo $_SESSION['Email']?><br>
        <?php if($_SESSION["Pro"]==false){?>
        Nombre de personnes suivies : <?php echo $nb;?> 
        <form name="password" method="post" action="">                                                                      <!--Changer de mot de passe -->
         <input type="text" name="newpassword" placeholder="Changer mot de passe" value="<?php echo $newpassword;?>" /><br />
         <input type="submit" name="valider" value="Valider" />
      </form>
        <?php }
        else{?>
        Nombre de followers : <?php echo $nbpro;}
        
?></p>
<div class="profiluser">
    <?php if($_SESSION["Pro"]==false){?>                                        <!-- Si user client boucle afficher ses abonnements -->
            <p>Utilisateurs suivis</p>
            <?php 
            if ($mesfollowing){
                foreach($mesfollowing as $value){  

                echo "Pseudo : ".$value['Pseudo']."<br>";}
            }
            else {
                echo "Vous ne suivez personne pour l'instant.<br>";}?></div>            <!-- Si pas abonnement ecrire message -->
            <div class="profillike">
            <p >Posts likés</p>
            <?php 
            if ($meslike){                                                      #Boucle Afficher like
                foreach ($meslike as $value2){
                    echo "Libelle : ".$value2['Libelle']."  Date : ".$value2['Date']."<br>";}
                }
            else {
                echo "Vous n'avez aimé aucun post pour l'instant.<br>";         #Si aucun like, afficher message
                }}


        else {?>                                                                <!--Si pro -->    
            <h1 >Abonnés </h1>
    <?php 
    if ($mesfollowers){                                                         #Boucle afficher abonnés
        foreach($mesfollowers as $value){  

        echo "Pseudo : ".$value['Pseudo']."<br>";}
    }
    else {
        echo "Vous n'avez aucun abonné pour l'instant.<br>";}?>                 <!--Si 0 abonnés, ecrire msg -->
    <?php 
        }
        ?></div>

[ <a href="deconnexion.php">Se déconnecter</a> ]
              
