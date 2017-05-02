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
	<a href="prod1.php">Produit/service1</a>
	<?php
		$query ="SELECT `fk_categorie`,`fk_product`FROM `llx_categorie_product`";
		$result= mysqli_query($db,$query);
		//$count = mysqli_num_rows($result);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$clefcateg  = json_encode($row['fk_categorie']);
		$clefcateg  = json_decode($clefcateg);
		//$clefcateg  = intval($clefcateg);
		echo $clefcateg;
		$clefprod  = json_encode($row['fk_product']);
		$clefprod  = json_decode($clefprod);
		//$clefprod  = intval($clefprod);
		echo $clefcateg;

		$query ="SELECT `rowid` AS `IDCLEF` FROM `llx_categorie` WHERE `label` = 'GERESA_P1'" ;
		$result= mysqli_query($db,$query);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$clefP1  = json_encode($row['IDCLEF']);
		$clefP1  = json_decode($clefP1);
		$clefcateg  = intval($clefcateg);
		
		/*SELECT * FROM mytable
WHERE column1 LIKE '%word1%'
   OR column1 LIKE '%word2%'
   OR column1 LIKE '%word3%'*/





	 ?>
</div>
<br>
<div>
	<a href="prod2.php">Produit/service2</a>	
</div>
<br>
<div>
	<a href="prod3.php">Produit/service3</a>
</div>
<br>
<div>
	<a href="prod4.php">Produit/service4</a>
</div>
<br>
</body>
</html> 
