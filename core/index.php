<?php
/* Copyright (C) 2001-2005	Rodolphe Quiedeville	<rodolphe@quiedeville.org>
 * Copyright (C) 2004-2010	Laurent Destailleur 	<eldy@users.sourceforge.net>
 * Copyright (C) 2005-2010	Regis Houssin			<regis.houssin@capnetworks.com>
 * Copyright (C) 2014		Charles-Fr Benke		<charles.fr@benke.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 *       \file       htdocs/mylist/core/patastools.php
 *       \brief      Home page for top menu patas tools
 *//*
$res=0;
$res=@include("../../main.inc.php");                    // For root directory
if (! $res && file_exists($_SERVER['DOCUMENT_ROOT']."/main.inc.php"))
    $res=@include($_SERVER['DOCUMENT_ROOT']."/main.inc.php"); // Use on dev env only
if (! $res) $res=@include("../../../main.inc.php");        // For "custom" directory


$langs->load("companies");
$langs->load("other");

// Security check
$socid=0;
if ($user->societe_id > 0) $socid=$user->societe_id;
*/
/*
 * View


 */

// MA PAGE





//llxHeader("",$langs->trans("Geresa"),"");

include("server.php");

// Show description of content
?>


<?php

   session_start();
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $login = mysqli_real_escape_string($db,$_POST['login']);
      $pass = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql="SELECT `login`,`pass` FROM llx_user WHERE `login`= '$login' AND `pass` = '$pass';";
      $result = mysqli_query($db,$sql);
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register($login);
         $_SESSION['login'] = $login;
         /*$cookie_name = $_SESSION['login'];
         $cookie_value = md5($_POST['pass']);
         setcookie($cookie_name,$cookie_value,time() + (86400 * 30), "/");*/
         //print_r($_SESSION['login']);
         header("location: bienvenue.php");
      }
      else {
         echo "Your Login Name or Password is invalid";
      }
      
   }
   
?>

<html>
    <head>
       <!-- <link rel="stylesheet" type="text/css" href="../css/css.css"> -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
       <script type="application/javascript" src="../js/inscription.js"></script>

    </head>

    <body>
        <p>Connexion à l'espace membre :</p><br />
        <form action="" method="post">
            Login : <input type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
            Mot de passe : <input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
            <input type="submit" name="connexion" value="Connexion">
        </form>
        <a href="inscription.php">Vous inscrire</a> <br/>
        <a href="http://localhost/dolibarr-5/htdocs/index.php?mainmenu=home&leftmenu=">Acceuil Dolibarr</a>
        
        

    </body>
</html>

<?php

//printf($error);


//llxFooter();

//$db->close();

?>
