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
 * \file    admin/setup.php
 * \ingroup mymodule
 * \brief   Example module setup page.
 *
 * Put detailed description here.
 */
/*
// Load Dolibarr environment
if (false === (@include '../../main.inc.php')) {  // From htdocs directory
	require '../../../main.inc.php'; // From "custom" directory
}

global $langs, $user;

// Libraries
require_once DOL_DOCUMENT_ROOT . "/core/lib/admin.lib.php";
require_once '../lib/mymodule.lib.php';
//require_once "../class/myclass.class.php";
// Translations
$langs->load("geresa@geresa");

// Access control
if (! $user->admin) {
	accessforbidden();
}

// Parameters
$action = GETPOST('action', 'alpha');

/*
 * Actions
 */

/*
 * View
 */

/*
$page_name = "Modification Geresa";
//llxHeader('', $langs->trans($page_name));

// Subheader
$linkback = '<a href="' . DOL_URL_ROOT . '/admin/modules.php">'
	. $langs->trans("BackToModuleList") . '</a>';
print load_fiche_titre($langs->trans($page_name), $linkback);

// Configuration header
$head = mymoduleAdminPrepareHead();
dol_fiche_head(
	$head,
	'settings',
	$langs->trans("Module500000Name"),
	0,
	"geresa@geresa"
);

// Setup page goes here
echo $langs->trans("MyModuleSetupPage");
*/
include("../core/server.php");



/*
* Clique sur création d'une famille	
*
*/
if ( isset($_POST['creation']) ) { 
		

		$erreur =false;
		$labelError ="";


		$label = trim($_POST['label']);
		$label = strip_tags($label);
		$label = htmlspecialchars($label);

		$couleur = trim($_POST['couleur']);
		$couleur = strip_tags($couleur);
		$couleur = htmlspecialchars($couleur);

		$description = trim($_POST['description']);
		$description = strip_tags($description);
		$description = htmlspecialchars($description);

		$sfamille = trim($_POST['sfamille']); // Une sous famille
		$sfamille = strip_tags($sfamille);
		$sfamille = htmlspecialchars($sfamille);

		

		/*
		*
		* Vérification des erreurs de saisies
		*/

		if (empty($label)){ 
			$erreur=true;
			$labelError =  "Veuillez Saisir un label";
		}


		/*
		*
		*
		* Recherche si le Libellé existe déja
		*/
		else{

			$sql = "SELECT `label` FROM `llx_geresa_famille` WHERE `label`='$label'";
				$result = mysqli_query($db,$sql);  
			    $count = mysqli_num_rows($result);
				if($count!=0){
					$erreur = true;
					$labelError = "Ce Label est déja utilisé ! ";
				}

		}

		echo $labelError;
		if ($erreur == false){
			
			if(isset($_POST['sfamille_box']) ){ // Si on a choisi une sous-famille
				$sql='INSERT INTO `llx_geresa_famille`(`label`, `description`,`fk_parent`)
						VALUES("'.$label.'","'.$description.'","'.$sfamille.'");';
				$res = mysqli_query($db,$sql);
			}
			else {

				$sql='INSERT INTO `llx_geresa_famille`(`label`, `description`)
						VALUES("'.$label.'","'.$description.'");';
				$res = mysqli_query($db,$sql);		
			}

		}


	} // fin de la création de la famille


	if (isset($_POST['supprimer'])){ // Supprésion d'une famille

		$sufamille = trim($_POST['sufamille']);
		$sufamille = strip_tags($sufamille);
		$sufamille = htmlspecialchars($sufamille);

		/*
		*	Si une sous famille existe on modifie la clé parent et on met notre famille a la racine
		*
		*/

		$zero = 0;
		$sql='UPDATE `llx_geresa_famille`
							SET `fk_parent` =("'.$zero.'") WHERE `fk_parent` = "'.$sufamille.'"  ;' ; 
		$result= mysqli_query($db,$sql);

		
		/*
		*
		* Supprésion de la clé
		*/

		$sql = 'DELETE FROM `llx_geresa_famille` WHERE `rowid` = "'.$sufamille.'"';
		$res = mysqli_query($db,$sql);



	}
	/*
	*
	* Liaison entre une famille et un service/objet
	*
	*
	*/

	if ( isset($_POST['affectation']) ){ 

		$prod = trim($_POST['prod']);
		$prod = strip_tags($prod);
		$prod = htmlspecialchars($prod);
		
		

		$famille = trim($_POST['famille']);
		$famille = strip_tags($famille);
		$famille = htmlspecialchars($famille);

		
		


		$sql = "SELECT `rowid` AS clefprod FROM `llx_product` WHERE `rowid`='$prod'"; // Clef produit
				$result = mysqli_query($db,$sql);  
			    $count = mysqli_num_rows($result);
			    $row = $result->fetch_array(MYSQLI_ASSOC);
			    $idprod = json_encode($row['clefprod']);
			    $idprod  =json_decode($idprod);
			    
			    
 
		$sql = "SELECT `rowid` AS cleffamille FROM `llx_geresa_famille` WHERE `rowid`='$famille'"; // Clef famille
				$result = mysqli_query($db,$sql);  
			    $count = mysqli_num_rows($result);
			    $row = $result->fetch_array(MYSQLI_ASSOC);
			    $idfamille = json_encode($row['cleffamille']);
			    $idfamille  =json_decode($idfamille);


		$idprod = intval($idprod);
		//echo $idprod;
		$idfamille = intval($idfamille);
		//echo $idfamille;

		
			    
		$sql='INSERT INTO `llx_geresa_famille_product`(`fk_categorie`, `fk_product`) VALUES ("'.$idfamille.'","'.$idprod.'")'; // liaison des 2 dans la nouvelle table
		
				$result = mysqli_query($db,$sql);


	} // fin de l'affectation








        	

			

include("SQL.php");


?>
<!DOCTYPE html>
<html>
<head>
	
<?php


echo'<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>';


echo "<html>";
echo "<head>";

echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';

echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>';

echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
echo'<link rel="stylesheet" type="text/css" href="../css/css.css">';
echo '<script type="application/javascript" src="../js/test.js"></script>';
?>
        <h1>Gestion des libellés Geresa </h1>
        <form action="" method="post" name="form1" >
            <table><tbody>

                    <tr>
                        <th>Nom Libellé</th>
                        <td><input type="text" name="label" value="<?php if (isset($_POST['label'])) echo htmlentities(trim($_POST['label'])); ?>"></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><input type="text" name="description" value="<?php if (isset($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?>"></td>
                    </tr>
                    <tr>
                        <th>Couleur</th>
                        <td><input type="text" name="couleur" value="<?php if (isset($_POST['couleur'])) echo htmlentities(trim($_POST['couleur'])); ?>"></td>
                    </tr>
                    <td>
						<input type="checkbox" name="sfamille_box" value="sfamille_box">Sous famille de : 
						<select name="sfamille">
						<?php
						for ($i=0; $i < $count_famille ; $i++) { 
							//CHOIX des familles
							echo "<option value='$tabidfamille[$i]'>'$tablibelle[$i]'</option>";
						}
						?>
						</select>
					</td>

                
                </td></tr> 


                <tr><td colspan="2" style="text-align: center; border: none;">
                        <input type="submit" name="creation" value="Création du libellé"></td>
                </tr>
            </tbody></table>
            <table><tbody>
            	<tr>
            		<th> Supprimer une famille</th>
            		<td>
            			<select name="sufamille">
							<?php
							for ($i=0; $i < $count_famille ; $i++){ 
							//CHOIX des familles
							 echo "<option value='$tabidfamille[$i]'>'$tablibelle[$i]'</option>";
							}
							?>
						</select>
            		</td>
            	</tr>
            	<tr>
	                <td colspan="2" style="text-align: center; border: none;">
	                        <input type="submit" name="supprimer" value="supprimer une famille"></td>
                </tr>
            	
            
            </tbody></table>
        </form>

        <div style="align: center";>

        

        	<form action="" method="post" name="form2">
			<table><tbody>
				<tr>
					<th>Choix du produit</th>
					<th>Choix de la famille</th>
				</tr>
				<tr>
					<td>
						<select name="prod">
						<?php 
						for ($i=0; $i < $count_prod ; $i++) { 
						// CHOIX des produits/services	
						
						echo "<option value ='$tabidprod[$i]'>'$tabrefprod[$i]'</option> ";
						}?>
						</select>

					</td>
					<td>
						<select name="famille">
						<?php
						for ($i=0; $i < $count_famille ; $i++) { 
						//CHOIX des familles	
						
						 echo "<option value='$tabidfamille[$i]'>'$tablibelle[$i]'</option>";
						}?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="affectation" value="affectation"></td>			
					</td>
				</tr>
			</form>

			
				
			</tbody></table>

			
		<table id = tablib><tbody>
		  	<tr>
				<th>ID Famille</th>
			    <th>Libellé</th>
			    <th>Description</th>
		  	</tr>

		  	
		  	<tr>
		  	<?php 
		  	for ($i=0; $i <$count_famille; $i++) { 
		  		//affichage du tableau famille @parma = ID,libelle,Description
		  		echo"<tr>";
		  			echo"<td>";
		  				echo $tabidfamille[$i];
		  			echo"</td>";

		  			echo'<td class="tab" >';
		  				echo $tablibelle[$i];
		  			echo"</td>";

		  			echo"<td>";
		  				echo $tabdescription[$i];
		  			echo"</td>";
		  			// echo"<td>";
		  			// 	echo $tabidfkparent[$i];
		  			// echo"</td>";

		  		echo"</tr>";
		  	}

		  	?>
			</tr>
		</tbody></table>
			
        <a href="http://localhost/dolibarr-5/htdocs/admin/modules.php?mode=common&page_y=2025"> Retour menu</a>

</body>
</html>