<?php
	//Récupération du contenu des textareas
	$colonnes = $_POST;
	// var_dump($colonnes);

	//Transformation du contenu en tableaux

	//TODO : vérifier que chaque colonne contient exactement autant d'élément que les autres

	//tableau général
	$tab = array();
	$i = 0;
	foreach ($colonnes as $key => $colonne) {
		if ($key != "file_name") {
			//tableau contenant le nom du champ + le tableau de chaînes associées
			$tab[$i] = array();
			$tab[$i][0] = $key;
			$tab[$i][1] = explode("\n", $colonne);
			$i++;
		}
	}

	//Association des termes
	//Nombre de cartes à créer
	$length = count($tab[0][1]);

	for ($j=0; $j < $length ; $j++) { 
		//Création d'un SVG à partir du modèle
		$docSVG = new DOMDocument();
		$docSVG->load("data/".$colonnes['file_name']);
		// $association = "asso n°".$j." : ";
		foreach ($tab as $col) {
			//Remplissage du nouveau SVG avec les données précédentes 
			//dans les zones correspondantes

			//Recherche de la zone
			$xpath = new DOMXPath($docSVG);
			$query = "//svg:flowRoot[@g2lid=\"".$col[0]."\"]/svg:flowPara";

			$flowParaList = $xpath->query($query);

			$flowPara = $flowParaList->item(0);
			//Ajout du texte correspondant dans la zone
			$flowPara->appendChild($docSVG->createTextNode($col[1][$j]));			
		}
		$generateName = "data/".$j."_".$colonnes['file_name'];
		$docSVG->save($generateName);
		$contenu = fread(fopen($generateName,'r'), filesize($generateName));
		echo $contenu; 
	}





?>