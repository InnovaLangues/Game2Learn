var doc = new jsPDF('p','mm','a4');
// doc.text(20, 20, 'Hello world.');
// doc.save('Test.pdf');
// var contenu = document.getElementById("contenu");
// contenu.innerHTML = doc;

var svgFile = contenu.innerHTML;
var pdf = svgElementToPdf(svgFile, doc, []);