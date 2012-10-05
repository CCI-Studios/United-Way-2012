/**
 * @codekit-prepend "menu.js"
 * @codekit-prepend "numbering.js"
 * @codekit-prepend "columns.js"
 * @codekit-prepend "dropmenu.js"
 * @codekit-prepend "html5.js"
 * @codekit-prepend "fontSizer.js"
 * @codekit-prepend "lettering.js"
 * @codekit-prepend "rollover.js"
 * @codekit-prepend "flickr.js"
 */

window.addEvent('domready', function() {
	// image roll overs
	new CCI.Rollover('img.rollover');
	// new CCI.Rollover('li.item-122 img, li.item-105 img', { normal_text: '.', over_text: '_rollover.'});

	// image lettering
	// $$('h1, h2, h3, h4, h5, h6').lettering('words');
});

window.addEvent('load', function () {
	// columns
	new CCI.Columns($('bottom'), '.module div.custom, ul.category-module');
	if ($$(".ie7, .ie8").length == 0){
		new CCI.Columns($('sidebar'), '.module div.custom, ul.category-module');
	}
});