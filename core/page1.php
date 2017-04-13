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
 */
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

/*
 * View


 */

// MA PAGE





$socstatic=new Societe($db);

llxHeader("",$langs->trans("Geresa"),"");

("Geresa");


// Show description of content



echo"<html>";
    echo"<head>";
        echo"<title>Accueil</title>";
    echo"</head>";

    echo"<body>";
        echo"Connexion à l espace membre :<br/>";
        echo"<form action='' method='post'>";
            echo"Login : <input type='text' name='login' value=''><br />";
            echo"Mot de passe : <input type='password' name='pass' value=''><br />";
            echo"<input type='submit' name='connexion' value='Connexion'>";
        echo"</form>";
        echo"<a href='inscription.php'>Vous inscrire</a>";
        
    echo"</body>";
echo"</html>";


llxFooter();

$db->close();
?>
