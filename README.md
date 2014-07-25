Game2Learn, sprint 2
====================
Principe
--------
Comme pour le sprint précédent, le but ici est de générer des SVG via PHP en utilisant le même principe de marquage avec l'attribut g2lid.
A la différence du premier sprint, les éléments possédant l'attribut g2lid sont des éléments "graphiques" (rect). 
Lors de la génération, un élément SVG text est crée et rattaché à un rect, contenant plusieurs éléments tspan (dont le but est de contenir des noeuds textes rentrant le plus précisément possible dans les dimensions du rect associé).
Fonctionnement
--------------
Comme précédement, le SVG est parcouru en utilisant DOM. Une boucle (assez complexe mais commentée) permet de découper la chaine de mots associés à une zone en plusieurs lignes (plusieurs tspan) et de les placer dans un élément text, lui-même placé aux coordonnées d'un rect correspondant.
Problèmes connus
----------------
Le découpage des lignes est assez approximatif (dépend beaucoup de la police utilisée) et il arrive souvent que les lignes soient trop longues.
