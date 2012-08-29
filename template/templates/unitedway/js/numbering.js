window.addEvent('domready', function(){
	var elements = $$('#bottom .module:nth-child(1)');
	elements.addClass('first');
	
	var elements = $$('#bottom .module:nth-child(2)');
	elements.addClass('second');
	
	var elements = $$('#bottom .module:nth-child(3)');
	elements.addClass('third');
});