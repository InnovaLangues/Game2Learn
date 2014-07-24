
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Up</title>
</head>
<body>
	<?php
		$nom = "model_".md5(uniqid(rand(), true)).$_FILES['imageSVG']['name'];
		$resultat = move_uploaded_file($_FILES['imageSVG']['tmp_name'],"data/".$nom);
		$contenu = fread(fopen("data/".$nom,'r'), filesize("data/".$nom));
		echo $contenu; 
		//Récupéraiton du document
		$docSVG = new DOMDocument();
		$docSVG->load("data/".$nom);
	?>
	<form action="generate.php" method="post">
		<input type="hidden" name="file_name" value=<?php echo $nom; ?>>
	<?php
		//Récupération des flowRoot
		$flowRoots = $docSVG->getElementsByTagName('flowRoot');

		//Parcours des flowRoots récupérés
		foreach ($flowRoots as $flowRoot) {
			//Récupération de la liste d'attributs
			$attr = $flowRoot->attributes;
			//On isole ceux ayant l'attribut g2lid
			if ($attr->getNamedItem('g2lid')!= NULL) {
				//Génération des colonnes
				$g2lid = $attr->getNamedItem('g2lid')->nodeValue;
				?>
					<h3><?php echo $g2lid ?></h3>
					<textarea name=<?php echo $g2lid ?> id="" cols="30" rows="10"></textarea>
				<?php
			}
		}
	?>
	<input type="submit" value="Générer">
	</form>
	<p class="contenu">
		
	</p>

</body>
</html>