<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sprint 2 - up</title>
</head>
<body>
	<?php
		$nom = "model_".md5(uniqid(rand(), true)).$_FILES['imageSVG']['name'];
		$resultat = move_uploaded_file($_FILES['imageSVG']['tmp_name'],"data/".$nom);
		echo "<input type='hidden' value='".$nom."' id='nameSVG'/>";
	?>
	<div id="model">
		<?php 
			$contenu = fread(fopen("data/".$nom,'r'), filesize("data/".$nom));
			echo $contenu; 
		//Récupéraiton du document
		$docSVG = new DOMDocument();
		$docSVG->load("data/".$nom);
	?>
	<form action="generate.php" method="post">
		<input type="hidden" name="file_name" value=<?php echo $nom; ?>>
	<?php
		//Récupération des rect
		$rects = $docSVG->getElementsByTagName('rect');

		//Parcours des rects récupérés
		foreach ($rects as $rect) {
			//Récupération de la liste d'attributs
			$attr = $rect->attributes;
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
	Font size (px) <input type="text" name="font_size">
	<input type="submit" value="Générer">
	</form>
	</div>
	<!-- <input class="color"> -->
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	
	<script src="jscolor/jscolor.js"></script>
	<script src="script.js"></script>
</body>
</html>