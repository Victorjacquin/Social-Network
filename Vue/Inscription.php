<html>
   <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="..\Css.css"/>
   </head>                                                                  <!--Affichage formulaire inscription -->
   <body>
       <h1>Inscription [ <a href="../index.php">Se connecter</a> ]</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="pseudo" placeholder="Pseudo" value="<?php echo $pseudo?>" /><br />
         <input type="text" name="email" placeholder="Email" value="<?php echo $email?>" /><br />
         <input type="password" name="password" placeholder="Mot de passe" value="<?php echo $password?>" /><br />
         <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />
         <input type="radio" name="role" value="user" checked="checked" />Utilisateur<br />
         <input type="radio" name="role" value="pro"  />Professionnel<br />
         <input type="submit" name="valider" value="Valider" />
      </form>
   </body>
</html>


