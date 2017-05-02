<?php
/* <one line to give the program's name and a brief idea of what it does.>
 * Copyright (C) <year>  <name of author>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * \file    mypage.php
 * \ingroup mymodule
 * \brief   Example PHP page.
 *
 * Put detailed description here.
 */

//if (! defined('NOREQUIREUSER')) define('NOREQUIREUSER','1');
//if (! defined('NOREQUIREDB'))   define('NOREQUIREDB','1');
//if (! defined('NOREQUIRESOC'))  define('NOREQUIRESOC','1');
//if (! defined('NOREQUIRETRAN')) define('NOREQUIRETRAN','1');
// Do not check anti CSRF attack test
//if (! defined('NOCSRFCHECK'))   define('NOCSRFCHECK','1');
// Do not check style html tag into posted data
//if (! defined('NOSTYLECHECK'))   define('NOSTYLECHECK','1');
// Do not check anti POST attack test
//if (! defined('NOTOKENRENEWAL'))  define('NOTOKENRENEWAL','1');
// If there is no need to load and show top and left menu
//if (! defined('NOREQUIREMENU')) define('NOREQUIREMENU','1');
// If we don't need to load the html.form.class.php
//if (! defined('NOREQUIREHTML')) define('NOREQUIREHTML','1');
//if (! defined('NOREQUIREAJAX')) define('NOREQUIREAJAX','1');
// If this page is public (can be called outside logged session)
//if (! defined("NOLOGIN"))     define("NOLOGIN",'1');
// Change the following lines to use the correct relative path
// (../, ../../, etc)

// Load Dolibarr environment
if (false === (@include '../../main.inc.php')) {  // From htdocs directory
  require '../../../main.inc.php'; // From "custom" directory
  require '../../contact/card.php';
  require '../../'
}

global $db, $langs, $user;



// Get parameters
$id = GETPOST('id', 'int');
$action = GETPOST('action', 'alpha');
$myparam = GETPOST('myparam', 'alpha');

echo $id;
print_r($id);
echo "\n";
echo $action;
print_r($action);
echo "\n";
echo $myparam;
print_r($myparam);







/*
    $login = trim($_POST['login']);
    $login = strip_tags($login);
    $login = htmlspecialchars($login);

    $nom = trim($_POST['nom']);
    $nom = strip_tags($nom);
    $nom = htmlspecialchars($nom);

    $prenom = trim($_POST['prenom']);
    $prenom = strip_tags($prenom);
    $prenom = htmlspecialchars($prenom);
    
    $mail = trim($_POST['mail']);
    $mail = strip_tags($mail);
    $mail = htmlspecialchars($mail);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $pass_confirm = trim($_POST['pass_confirm']);
    $pass_confirm = strip_tags($pass_confirm);
    $pass_confirm = htmlspecialchars($pass_confirm);

    $ville = trim($_POST['ville']);
    $ville = strip_tags($ville);
    $ville = htmlspecialchars($ville);

    $zip = trim($_POST['zip']);
    $zip = strip_tags($zip);
    $zip = htmlspecialchars($zip);

    $adresse = trim($_POST['adresse']);
    $adresse = strip_tags($adresse);
    $adresse = htmlspecialchars($adresse);

    $tel = trim($_POST['tel']);
    $tel = strip_tags($tel);
    $tel = htmlspecialchars($tel);

    $tiers = trim($_POST['tiers']);
    $tiers = strip_tags($tiers);
    $tiers = htmlspecialchars($tiers);

    $naissance = trim($_POST['naissance']);
    $naissance = strip_tags($naissance);
    $naissance = htmlspecialchars($naissance);*/

// // Access control
// if ($user->socid > 0) {
//   // External user
//   accessforbidden();
// }

// Default action
if (empty($action) && empty($id) && empty($ref)) {
  $action='create';
}

// Load object if id or ref is provided as parameter
// $object = new MyClass($db);
// if (($id > 0 || ! empty($ref)) && $action != 'add') {
//   $result = $object->fetch($id, $ref);
//   if ($result < 0) {
//     dol_print_error($db);
//   }
// }

/*
 * ACTIONS
 *
 * Put here all code to do according to value of "action" parameter
 */

// if ($action == 'add') {
//   $myobject = new MyClass($db);
//   $myobject->prop1 = $_POST["field1"];
//   $myobject->prop2 = $_POST["field2"];
//   $result = $myobject->create($user);
//   if ($result > 0) {
//     // Creation OK
//   } {
//     // Creation KO
//     $mesg = $myobject->error;
//   }
// }

/*
 * VIEW
 *
 * Put here all code to build page
 */



$form = new Form($db);
?>
<html>
    <head>
       <link rel="stylesheet" type="text/css" href="../css/css.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        
        <script src="../js/jquery-3.2.1.min.js"></script>
        
        
    </head>

    <body>
        <h1>INSCRIPTION GERESA </h1>
        <p>Inscription à espace membres</p>
        <form action="" method="post">
            <table><tbody>

                    <tr>
                        <th>Nom</th>
                        <td><input type="text" name="nom" value="<?php if (isset($_POST['nom'])) echo htmlentities(trim($_POST['nom'])); ?>"></td>
                    </tr>
                    <tr>
                        <th>Prénom</th>
                        <td><input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])) echo htmlentities(trim($_POST['prenom'])); ?>"></td>
                    </tr>
                    <tr>
                        <th>login</th>
                        <td><input type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"></td>
                    </tr>
                <th>Email</th>
                <td><input type="email" name="mail" value="<?php if (isset($_POST['mail'])) echo htmlentities(trim($_POST['mail'])); ?>">
                </td>
                </tr>
                <!-- <tr>
                    <th>Sexe</th>
                    <td><input type="radio" name="sexe" value="Femme">Femme
                        <input type="radio" name="sexe" value="Homme">Homme 
                    </td>
                </tr> -->
                <tr>
                    <th>Type de Tiers</th>
                    <td><select name="tiers">
                      <?php 
                  $query ="SELECT * FROM `llx_c_typent` ";
              $result= mysqli_query($db,$query);
              $count = mysqli_num_rows($result);
              
              for($i=0;$i<$count;$i++)
              {

                  $row = $result->fetch_array(MYSQLI_ASSOC);
                  //printf ("%s \n",,$row["code"],$row["libelle"]);
                  
                  $tabcode[$i] = $row['code'];
                  $tablib[$i] = $row['libelle'];

                  echo "<option value='$tabcode[$i]'>'$tablib[$i]'</option>";
                  if (isset($_POST['tiers'])) echo htmlentities(trim($_POST['tiers']));

              }

            ?>
            </select></td>

                </tr>
                <tr>
                        <th>Ville</th>
                        <td><input type="text" name="ville" value="<?php if (isset($_POST['ville'])) echo htmlentities(trim($_POST['ville'])); ?>"></td>
                </tr>
                <tr>
                        <th>Code postal</th>
                        <td><input type="text" name="zip" value="<?php if (isset($_POST['zip'])) echo htmlentities(trim($_POST['zip'])); ?>"></td>
                </tr>
                <tr>
                        <th>Tel</th>
                        <td><input type="tel" name="tel" value="<?php if (isset($_POST['tel'])) echo htmlentities(trim($_POST['tel'])); ?>"></td>
                </tr>
                <tr>
                        <th>Adresse</th>
                        <td><input type="text" name="adresse" value="<?php if (isset($_POST['adresse'])) echo htmlentities(trim($_POST['adresse'])); ?>"></td>
                </tr>
                <tr>
                        <th>Année de naissance</th>
                        <td><input type="date" name="naissance" value="<?php if (isset($_POST['naissance'])) echo htmlentities(trim($_POST['naissance'])); ?>" placeholder="Format jj//mm/AAAA"></td>
                </tr>


                <tr>
                    <th>Mot de passe : </th>
                    <td><input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>" ></td>
                </tr>

                <tr>
                    <th>Confirmation du Mot de passe : </th>
                    <td><input type="password" name="pass_confirm" value="
<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>"></td>
                </tr>
                <tr><td>
                <form action="https://www.google.com/recaptcha/api/siteverify" method="post">
                <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
                </form>
                </td></tr> 


                <tr><td colspan="2" style="text-align: center; border: none;">
                        <input type="submit" name="inscription" value="inscription"></td>
                </tr>



                </tbody></table>
        </form>
        <a href="index.php">Retour à la page de connexion</a>
        


    </body>
</html>







<?php
// Example 2: Adding links to objects
// The class must extend CommonObject for this method to be available
//$somethingshown = $form->showLinkedObjectBlock($myobject);

// End of page
//llxFooter();

?>