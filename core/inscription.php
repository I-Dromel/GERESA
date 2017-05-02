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




/*
 * Actions
 */

include("server.php");
//include("servermySQL.php");
/**
* On Clique sur S'incrire
* 
*/ 




			









						
if ( isset($_POST['inscription']) ) {


		function position()// Calcul une position @param $table un String
			{ 
			include("server.php");
			global $pos;
			$sql='SELECT MAX(`rowid`) AS pos FROM `llx_societe`;';
		    $result= mysqli_query($db,$sql);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$data=json_encode($row['pos']); // encodage JSON valeur de $data -> "Valeur"
			$data=json_decode($data);		// decodage JSON valeur de $data -> Valeur
			$data = intval($data);			// STRING en INT 
			$pos = $data;
			$pos++;	
			}

		
		
			
			

			/*
			* Effectue la maj du code Client
			*/
		function majCodeClient($date,$mail){
			include("server.php");

			$sql='UPDATE `llx_societe`
							SET `code_client` = ("'.$date.'") WHERE `email` = "'.$mail.'"  ;' ; 
			$result= mysqli_query($db,$sql); // insertion requete sql dans le code client


		}
		 
		 $nameError = '';	
		 $emailError = '';
		 $passError = '';
		 $zipError = '';
		 $telError = '';
		 $error =false;
		
		// clean user inputs to prevent sql injections
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
		$naissance = htmlspecialchars($naissance);

		

		
		
		// basic nom validation
		if (empty($login || $nom || $prenom)) {
			$error = true;
			$nameError = "login ou nom ou mot de passe est vide !";
		} else if (strlen($login) < 3) {
			$error = true;
			$nameError = "Votre login doit au moins être supérieur a 3 caractères.";
		} 
		
		//basic email validation
		if ( !filter_var($mail,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Votre adresse Email est invalide !";
		} else {
			// check email exist or not
			$sql = "SELECT email FROM llx_user WHERE email='$mail'";
			$result = mysqli_query($db,$sql);  
		    $count = mysqli_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Cette Adresse email est déja utilisé ! ";
			}
		}
		// password validation
		if (empty($pass)){
				$error = true;
				$passError = "Entrez un mot de pass";
		}
		if(strlen($pass) < 6) {
				$error = true;
				$passError = "Le mot de passe doit faire au moins 6 caractères.";
		}
		if($pass != $pass_confirm){
				$error = true;
				$passError = " Les mots de passe ne sont pas identiques ! ";
		}

		if(empty($ville) || empty($zip)){
			$error =true;
			$zipError = "Veuillez saisir une ville et un code postal";
		}
		if(!is_numeric($zip) || strlen($zip)!=5){
			$error = true;
			$zipError = " Veuillez saisir un code zip et une adresse Valide ! ";
		}

		if(!is_numeric($tel)){ // 0699791949
			$error = true;
			$telError = "Veuillez saisir un numéro de teléphone Valide ! ";
		}

		list($jour, $mois, $annee) = split('[/.-]', $naissance); // récupère l'année de naissance !

		$naissSQL =''.$annee.'-'.$mois.'-'.$jour.''; // conversion pour DB
		$naissSQL = strval($naissSQL);



		$date_c = date("Y-m-d H:i:s"); // date de création du compte !

		echo $nameError;	
		echo $emailError;
		echo $passError;
		echo $zipError;
		echo $telError;

		// Si aucune erreur continuer l'inscription
		//
		if($error == false){
			$un = 1;
			$deux = 2; // Prospect par default
			
			//$sql='SELECT `login`,`lastname`, `firstname`, `email`,`pass`,code,libelle FROM llx_user CROSS JOIN llx_c_typent' // todo fk_typent
		

			/*
			* GESTION DE l'id contact people
			*
			*/
			
			




			$sql='INSERT INTO `llx_societe`(`nom`,`address`, `zip`, `town`,`phone`,`email`,`datec`,`client`,`fk_user_creat`,`fk_user_modif`)
					VALUES("'.$nom.'","'.$adresse.'","'.$zip.'","'.$ville.'","'.$tel.'","'.$mail.'","'.$date_c.'","'.$deux.'","'.$un.'","'.$un.'");';
			$res = mysqli_query($db,$sql);

			$sql='SELECT `rowid` AS num FROM `llx_societe`  WHERE `email`= "'.$mail.'" ;';
			$result= mysqli_query($db,$sql);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$idtier=json_encode($row['num']);
			$idtier=json_decode($idtier);		// decodage JSON valeur de $idtier -> Valeur
			$idtier = intval($idtier);
			echo "\n";
			echo $idtier;
			
			
			


			$sql ='INSERT INTO `llx_socpeople`(`datec`,`fk_soc`,`lastname`,`firstname`,`address`,`zip`,`town`,`birthday`,`phone`,`email`,`fk_user_creat`,`fk_user_modif`)
			VALUES("'.$date_c.'","'.$idtier.'","'.$nom.'","'.$prenom.'","'.$adresse.'","'.$zip.'","'.$ville.'","'.$naissSQL.'","'.$tel.'","'.$mail.'","'.$un.'","'.$un.'");';
			$res = mysqli_query($db,$sql);
			

			$sql='SELECT `rowid` AS num FROM `llx_socpeople`  WHERE `email`= "'.$mail.'" ;';
			$result= mysqli_query($db,$sql);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$idpeople=json_encode($row['num']);
			$idpeople=json_decode($idpeople);		// decodage JSON valeur de $idpeople -> Valeur
			$idpeople = intval($idpeople);
			echo "\n";
			echo $idtier;
			echo $idpeople;
			



			$sql='INSERT INTO `llx_user`(`login`,`lastname`, `firstname`, `email`,`pass`,`datec`,`fk_socpeople`,`fk_soc`)
					VALUES("'.$login.'","'.$nom.'","'.$prenom.'","'.$mail.'","'.$pass.'","'.$date_c.'","'.$idpeople.'","'.$idtier.'");';
			$res = mysqli_query($db,$sql);
			echo $idtier;
			echo $idpeople;


			



			




			/*
			*
			* Gesion du Code Client
			*
			*/
			$query ="SELECT `name`,`value`FROM `llx_const` WHERE `name` = 'SOCIETE_CODECLIENT_ADDON' ";
			$result= mysqli_query($db,$query);
			$count = mysqli_num_rows($result);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			//printf ("%s  %s \n",$row["value"],$row["name"]);

			/*
			* Traitement Du code client 
			* Recherche Modèle de génération et contrôle des codes tiers (clients/fournisseurs) dans 
			* Config/configuration des tiers
			*/

			 $date = date("ym");// return yymm collé 1704-2
			
			
			if ($row["value"] == 'mod_codeclient_monkey')// attention aux espaces ! 
			{
				
				
				position();
				
				// en fonction du nombre de clients on a une position  
				if($pos<10)									// entre 1 et 9 puis 10 et 99 etc .. 
					$date = $date."-000".strval($pos);
				if( $pos>=10 && $pos<100)
					$date = $date."-00".strval($pos);
				if($pos>=100 &&$pos<=1000)
					$date = $date."-0".strval($pos);
				if($pos >=1000)
					$date = $date."-".strval($pos);
				// echo strval($pos);
				// echo $date;

				
				// echo "<br  >";
				// echo $date;
				$date = "CU".$date;
			}

			/*
			* Dans les 2 autres cas code libre
			*/

			if ($row["value"]== 'mod_codeclient_leopard' || $row["value"] == 'mod_codeclient_elephant') // attention aux espaces ! 
			{
				position();
				$date = "CU".$date.strval($pos);
				

			}
			majCodeClient($date,$mail); // mise a jour du code client 
			

			echo "<br>";
				
				echo "<br>";	
				
					/**
					* Envoi du message de bienvenue ! 
					*
					*
					*/
				    echo "Vous vous êtes inscrit";
				    $message = "Bienvenue sur Geresa !";
					$titre = "Confirmation adresse mail";
					mail($mail, $titre, $message); // mail ( destinataire,titre du mail, contenu du mail)

					unset($nom); 
					unset($prenom);
					unset($mail);
					unset($pass);
					unset($pass_confirm);
					unset($zip);
					unset($ville);
					unset($adresse);
					unset($tel);

					/*unset($tel);
					unset($tel);
					unset($tel);
					unset($tel);*/
				
		} // Fin de l'inscription! 


		

		
		
		

		

		
		
	}



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
