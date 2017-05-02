<?php
	include('session.php');
	//include("server.php");
	
   
	  
	
   		$message_bienvenue = " Bienvenue ";
   		$message_bienvenue.= $login_session;
   		print_r($message_bienvenue);

		//echo "<h1>Bienvenue ".'$login_session'." </h1>";


		echo "<a href='deconnexion.php'>Se deconnecter</a>";


echo "<html>";
echo "<head>";

echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';

echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>';

echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
//echo '<script type="application/javascript" src="../js/test.js"></script>';

    
?>
</head>
<body>

 

<header id="header">
<h1>Page Produit 1 </h1>
<a href="#">Se connecter</a>
<a href="#">S'inscrire</a>
<a href="#">Se Déconnecter </a>

</header>


<div  class="sidenav">
	<button id = "option" type="button" class="btn btn-default btn-sm">
	        <span class="glyphicon glyphicon-th-list"></span> Th List
	</button>
  <a href="#">Profil</a>
  <a href="#">Planning </a>
  <a href="#">Machines</a>
  <a href="#">Espaces</a>
  <a href="#">Formation</a>
</div>

<div>
	<a href="#">Produit/service1</a>
	<a href="#">Produit/service2</a>
	<a href="#">Produit/service3</a>
	<a href="#">Produit/service4</a>
	
</div>
<a href="bienvenue.php">retour sur la page d'acceuil</a>
</body>
</html> 
