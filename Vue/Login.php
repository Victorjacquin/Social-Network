<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="Css.css"/>
   </head>
   <body onLoad="document.fo.login.focus()">
      <h1>Authentification [ <a href="Controller/inscription.php">Créer un compte</a> ]</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="pseudo" placeholder="Pseudo" /><br />
         <input type="password" name="password" placeholder="Mot de passe" /><br />
         <input type="submit" name="valider" value="S'authentifier" />
      </form>
   </body>
</html>