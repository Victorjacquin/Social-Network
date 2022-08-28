<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="../Css.css"/>
      
   </head>
   <body>
        <nav class="menu">        
            <div>
                <ul class="header">
                    <?php if ($_SESSION["Pro"]==false){?>
                    <li class="btnmenu"><a href="Session.php">Actualités</a></li>
                    <?php }
                    else {?>
                    <li class="btnmenu"><a href="Session_pro.php">Actualités</a></li><?php ;}?>
                    <li class="btnmenu"><a href="Allusers">Les utilisateurs</a></li>
                    <li class="btnmenu"><a href="Profil.php">Mon Profil</a></li>
                </ul>
            </div>    
        </nav>