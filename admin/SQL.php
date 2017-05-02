<?php 
        include("../core/server.php");
        	$query ="SELECT `label`,`description`,`fk_parent`,`rowid` AS `idfamille` FROM `llx_geresa_famille` ";
			$result= mysqli_query($db,$query);
			$count_famille = mysqli_num_rows($result);
			for($i=0;$i<$count_famille;$i++)
			{

				$row = $result->fetch_array(MYSQLI_ASSOC);
									//printf ("%s \n",,$row["code"],$row["libelle"]);
				$tabidfamille[$i] = $row['idfamille'];					
				$tablibelle[$i] = $row['label'];
				$tabdescription[$i] = $row['description'];
				//$tabidfk_parent[$i] = $row['fk_parent'];

				


			}

			$query ="SELECT `ref`,`rowid` AS `idprod` FROM `llx_product` ";
			$result= mysqli_query($db,$query);
			$count_prod = mysqli_num_rows($result);
			for($i=0;$i<$count_prod;$i++)
			{

				$row = $result->fetch_array(MYSQLI_ASSOC);
									//printf ("%s \n",,$row["code"],$row["libelle"]);
				$tabidprod[$i] = $row['idprod'];					
				$tabrefprod[$i] = $row['ref'];
				
			}
?>