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
		if ($key != "file_name" && $key != "font_size" ) {
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
			$query = "//svg:rect[@g2lid=\"".$col[0]."\"]";
			// echo $col[0];
			$rectList = $xpath->query($query);
			// echo $rectList->length;

			$rect = $rectList->item(0);

			//Génération du texte
				//Préparation de la chaine
					//Récupération de la longueur/hauteur maximum d'une chaine en px
			$attr = $rect->attributes;
			$width = $attr->getNamedItem('width')->nodeValue;
			$height = $_POST['font_size']; 
					//Récupération du tableau de mots
			$words = explode(' ',$col[1][$j]);
				//génération de l'élément text
					//Récupération des coordonnées
			$x = $attr->getNamedItem('x')->nodeValue;
			$y = $attr->getNamedItem('y')->nodeValue;
					//génération du style de texte
			$style = 'font-size: '.$_POST['font_size'].'px; color: black; font-family: Courier;';
					//Génération de l'élément text
			$text = $docSVG->createElement('text');
			$text->setAttribute('x',$x);
			$text->setAttribute('y',$y);
			$text->setAttribute('style',$style);
			// $text->setAttribute('textLength',$width);

				//Génération des tspans
			$tspan = $docSVG->createElement('tspan');
			$tspan->setAttribute('x',$x);
			$tspan->setAttribute('dy',$height);
			$lengthLine = 0;
			$wordLine = '';
			$totalLine = 1;
			foreach ($words as $word) {
				//On vérifie que la ligne de mots rentre dans le cadre
				
				$lengthLine = $lengthLine + ($_POST['font_size']*strlen($word))/2;
				//echo $lengthLine." ".$width."<br>";
				//echo "lengthLine : ".$lengthLine."; width : ".$width."\n";
				if ($lengthLine<$width) {
					//Si ça rentre, on ajoute le mot à la ligne actuelle
					$wordLine = $wordLine.$word.' ';
				}
				else {
					//Sinon, on rajoute la ligne telle quel au tspan courrant...
					$tspan->appendChild($docSVG->createTextNode($wordLine));
					$text->appendChild($tspan);
					// echo "tspan size: ".$tspan->getAttribute('offsetWidth')."<br>";
				//	echo "Wordline : ".$wordLine."<br>";
					//... On réinitialise la ligne avec le mot courant...
					$lengthLine = ($_POST['font_size']*strlen($word))/2;
					$wordLine = $word.' ';
					$totalLine++;
					//... Et on crée un nouveau tspan
					$tspan = $docSVG->createElement('tspan');
					$tspan->setAttribute('x',$x);
					$tspan->setAttribute('dy',$height);
				}
			}
			//On force les derniers mots à faire la darnière ligne
			$tspan->appendChild($docSVG->createTextNode($wordLine));
					$text->appendChild($tspan);


			//Insertion du text dans le document
			$parent = $rect->parentNode;
			$parent->appendChild($text);

			//Ajout du texte correspondant dans la zone
			// $rect->appendChild($docSVG->createTextNode($col[1][$j]));			
		}
		$generateName = "data/".$j."_".$colonnes['file_name'];
		$docSVG->save($generateName);
		$contenu = fread(fopen($generateName,'r'), filesize($generateName));
		echo $contenu; 
	}





?>