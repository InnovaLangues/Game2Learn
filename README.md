Game2Learn, test de tcpdf
=========================
Principe
--------
Le but ici était de générer un fichier PDF contenant un SVG via PHP en utilisant la librairie TCPDF.
Foncitonnement
--------------
Un objet TCPDF est crée, auquel on ajoute une page contenant un fichier SVG identifié par son nom. On génère ensuite un fichier PDF.
Problèmes connus
----------------
Le PDF ne supporte pas les éléments flowRoot et flowPara de SVG (ne s'affichent pas).
Aussi, il n'est visiblement pas possible d'ajouter une police utilisée par le SVG dans le PDF.
