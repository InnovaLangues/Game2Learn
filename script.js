jQuery(document).ready(function(){
  
	var name = "data/"+$("#nameSVG").val();
	console.log(name);

  // jQuery.ajax({
  //   type: "GET",
  //   url: name,
  //   dataType: "xml",
  //   success: function(svgXML) {
  //     var root = svgXML.getElementsByTagName('svg')[0];
  //     var width = root.getAttribute('width'),
  //         height = root.getAttribute('height');
  //         console.log(width+" "+height);
  //    var paper = Raphael(0, 0, width, height);
  //     var newSet = paper.importSVG(svgXML);
  //   }
  // });
// function wraptorect(textnode, boxObject, padding, linePadding) {

//     var x_pos = parseInt(boxObject.getAttribute('x')),
//     y_pos = parseInt(boxObject.getAttribute('y')),
//     boxwidth = parseInt(boxObject.getAttribute('width')),
//     fz = parseInt(window.getComputedStyle(textnode)['font-size']);  // We use this to calculate dy for each TSPAN.

//     var line_height = fz + linePadding;

// // Clone the original text node to store and display the final wrapping text.

// var wrapping = textnode.cloneNode(false);       // False means any TSPANs in the textnode will be discarded
// wrapping.setAttributeNS(null, 'x', x_pos + padding);
// wrapping.setAttributeNS(null, 'y', y_pos + padding);

// // Make a copy of this node and hide it to progressively draw, measure and calculate line breaks.

// var testing = wrapping.cloneNode(false);
// testing.setAttributeNS(null, 'visibility', 'hidden');  // Comment this out to debug

// var testingTSPAN = document.createElementNS(null, 'tspan');
// var testingTEXTNODE = document.createTextNode(textnode.textContent);
// testingTSPAN.appendChild(testingTEXTNODE);

// testing.appendChild(testingTSPAN);
//     var tester = document.getElementsByTagName('svg')[0].appendChild(testing);

// var words = textnode.textContent.split(" ");
// var line = line2 = "";
// var linecounter = 0;
//     var testwidth;

// for (var n = 0; n < words.length; n++) {

//       line2 = line + words[n] + " ";
//       testing.textContent = line2;
//       testwidth = testing.getBBox().width;

//     if ((testwidth + 2*padding) > boxwidth)
//     {

//         testingTSPAN = document.createElementNS('http://www.w3.org/2000/svg', 'tspan');
//         testingTSPAN.setAttributeNS(null, 'x', x_pos + padding);
//         testingTSPAN.setAttributeNS(null, 'dy', line_height);

//         testingTEXTNODE = document.createTextNode(line);
//         testingTSPAN.appendChild(testingTEXTNODE);
//         wrapping.appendChild(testingTSPAN);

//         line = words[n] + " ";
//         linecounter++;
//     }
//     else {
//         line = line2;
//     }
// }

// var testingTSPAN = document.createElementNS('http://www.w3.org/2000/svg', 'tspan');
// testingTSPAN.setAttributeNS(null, 'x', x_pos + padding);
// testingTSPAN.setAttributeNS(null, 'dy', line_height);

// var testingTEXTNODE = document.createTextNode(line);
// testingTSPAN.appendChild(testingTEXTNODE);

// wrapping.appendChild(testingTSPAN);

//     testing.parentNode.removeChild(testing);
//     textnode.parentNode.replaceChild(wrapping,textnode);

//     return linecounter;
// }

// document.getElementById('original').onmouseover = function () {

//     var container = document.getElementById('destination');
//     var numberoflines = wraptorect(this,container,20,1);
//     console.log(numberoflines);  // In case you need it
// };
});