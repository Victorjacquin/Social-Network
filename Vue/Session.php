<?php include("C:\wamp\www\projet\Vue\Header.php"); ?>

<h2><?php echo $bienvenue?></h2>            <!--message de bienvenue-->
      <p>Voici tous les posts :<br> 
      <?php 

foreach($postes as $value){                 #Boucle afficher tous les posts
          ?>
          <form class="post" name="form" method="post" action="">
               <input id="IDPost" name="IDPost" type="hidden" value=<?php echo $value['ID_Post']?>></input>     <!--Recupérer chaque id des posts affichés -->
              <?php 
               echo "Libellé : ".$value['Libelle']." Date :".$value['Date']." de ".$value['Pseudo']."<br>";
               $veriff = $verif->getOneLike($_SESSION["ID"], $value['ID_Post']);                                #Vérifier si like existe deja
              if (!$veriff){?>                                                                                  <!-- si non, afficher bouton like -->
               <img src="..\Images\Likefalse.png" height ="55" width="65"/><br>
              <input class="favorite styled" type="submit" name="like" value="Like">
                
              </input><?php }
              else {?>                                                                                          <!--SI like existe deja, afficher bouton retirer like-->
              <img src="..\Images\Like.png" height ="80" width="80"/><br>
               <input class="favorite styled" type="submit" name="retirerlike" value="Retirer like">
                
              </input>
             
              <?php }?>
          </form>
<?php   }
?>
      </p>
<br>
      [ <a href="deconnexion.php">Se déconnecter</a> ]
   </body>
</html>
  

