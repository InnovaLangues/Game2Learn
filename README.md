Game2Learn, sprint 1
====================
Principe
--------
Ce sprint représente le premier essai de génération de cartes à partir d'un modèle via PHP. Le but ici est de parcourir le SVG uploadé et d'y repérer les éléments flowRoot possédant un attribut g2lid. Le SVG uplodé est ensuite stocké dans un répertoire data, et on lui donne un nom unique du type "model_xxx.svg".
Pour chacun de ces flowRoots, un textarea portant le nom contenu dans l'attribut g2lid est généré. Dans ces textareas, l'utilisateur rentre les listes d'éléments qu'il souhaite générer, séparés par un retour à la ligne. Chaque liste doit posséder exactement le même nombre d'éléments pour que la génération foncitonne. 
Les SVG correspondants sont ensuite générés et enregistrés sous un nom unique de la forme "y_model_xxx.svg", puis affichés dans le navigateur els uns à la suite des autres.
Fonctionnement
--------------
Les SVG sont parcourus à l'aide de la librairie PHP DOM (par défaut dans PHP). Une requête xpath permet de repérer les flowPara (éléments SVG pouvant contenir un noeud texte) à l'intérieur des flowRoot possédant l'attribut g2lid.
Problèmes connus
----------------
Bien que les flowRoot/flowPara permettent d'avoir un wrapping du texte correct, ils ne sont pas supporté par tous les navigateurs, et ne s'affiche pas dans les PDFs générés.
