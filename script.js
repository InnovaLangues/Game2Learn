$(document).ready(function() {

	// var tabG2lid = $("text[g2lid]");
	// console.log(tabG2lid);
	// for (var i = tabG2lid.length - 1; i >= 0; i--) {
	// 	var zone = '<span>'+tabG2lid[i]+'</span>';
	// 	console.log(zone);
	// 	$('p.contenu').append(zone);
	// };

	$("text[g2lid]").each(function(){
		var zone = '<input type=\'text\' name=\''
		+$(this).attr('g2lId')
		+'\' value=\''
		+$(this).children('tspan').html()
		+'\' data-g2l>';
		console.log(zone);
		$('p.contenu').append(zone);
	});

	$("input[data-g2l]").change(function(){
		var zone = $(this).attr('name');
		console.log($("text[g2lid=\'"+zone+"\']").html());/**/
		var newX = $("text[g2lid=\'"+zone+"\']").attr('x');
		var newY = $("text[g2lid=\'"+zone+"\']").attr('y');

		var texte = '<tspan id=tspan3122 x='+newX+' y='+newY+' sodipodi:role="line">'+$(this).val()+'</tspan>';
		var texteModif = texte.replace("\n","</tspan><tspan>");


		//$("text[g2lid=\'"+zone+"\']").html(texteModif);
		var elt = $("text[g2lid=\'"+zone+"\']")[0];
		console.log("elt", elt);
		var tspan = elt.createElementNS("http://www.w3.org/2000/svg", "tspan");
		tspan.setAttributeNS(null, "id", "tspan3122");
		tspan.setAttributeNS(null, "x", newX);
		tspan.setAttributeNS(null, "y", newY);
		tspan.setAttributeNS("sodipodi", "role", "line");
		tspan.createTextNode($(this).val());


		console.log($("text[g2lid=\'"+zone+"\']").html(), "(après)");/**/


	});

// var attr = $('text').attr('g2lId');

// // For some browsers, `attr` is undefined; for others,
// // `attr` is false.  Check for both.
// if (typeof attr !== typeof undefined && attr !== false) {
//     console.log($('text').html());
// }

	// var inp = "<input type=\'text\' >"
	// $('p.contenu').add(inp).attr('type','text');
	// html($("text[g2lid]").children('tspan').html());
});