
<?php include("C:\wamp\www\projet\Vue\Header.php"); ?>
      <h2><?php echo $bienvenue?></h2>                          <!-- Message bienvenue -->
      <div class="erreur"><?php echo $erreur ?></div>           <!-- Erreur post vide -->
      <form name="fo" method="post" action="">                  <!-- Formulaire ecrire post -->
         <input type="text" name="libellé" placeholder="Ecrire un post" value="<?php echo $libellé?>" /><br />
         <input type="submit" name="valider" value="Valider" />
      </form>
      <p>Voici vos posts.<br> <post>
          <?php if ($postes){                                   #Si au moins 1 post du pro
          foreach($postes as $value){ ?>                        <!--Boucle afficher post du pro -->
              <div class="post"><?php
          echo "Libellé : ".$value['Libelle']."<br> Date :".$value['Date']."<br>";
          ?></div><?php
          }} else {echo "Aucun post ";  }                         #Si aucun post du pro, afficher message
          ?></post></p>
<br>
      <a href="deconnexion.php">Se déconnecter</a>
   </body>
</html>
  