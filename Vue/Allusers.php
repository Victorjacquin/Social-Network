<?php include("Header.php");?>
<div class="alluserclient">
    <p>Voici tous les utilisateurs </p><?php            

    foreach($userclientt as $value){                        #Boucle afficher utilisateurs 
               echo "Pseudo : ".$value['Pseudo']."<br>";
           }?>
</div>
<div class="alluserpro">
    <p>Voici tous les utilisateurs professionnel :</p>

    <?php
    foreach($userproo as $value){                          #Boucle afficher utilisateurs pros
        ?>                         

        <form name="userpro" method="post" action="">      

                 <input id="IDpro" name="IDPro" type="hidden" value=<?php echo $value['ID']?>></input>      <!--recuperer id du pro afficher-->
                  <?php 
                  echo "Pseudo : ".$value['Pseudo'];                                                        
                  $veriff = $verif->getOneFollow($_SESSION["ID"], $value['ID']);                            #Vérifier si déjà suivi ou pas
                  if ($_SESSION["Pro"]==false){                                                             #Si utilisateur pas pro
                    if (!$veriff){?>                                                                        <!-- Pro pas suivi -->

                    <input class="favorite styled" type="submit" name="ajouter" value="S'abonner">

                      <img src="..\Images\ajouter_faux.png" height ="80" width="80"/>
                    </input><?php }
                    else {?>                                                                                <!-- Pro suivi -->
                         <input class="favorite styled" type="submit" name="retirer" value="Retirer">

                      <img src="..\Images\ajouter_vrai.png" height ="80" width="80"/>
                    </input>
                  <?php }}?>


        </form>
    <?php }?>
</div>
[ <a href="deconnexion.php">Se déconnecter</a> ]