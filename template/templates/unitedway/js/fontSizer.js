window.addEvent('domready', function() {
	var resizer = $$('.module.fontResizer')[0],
		minus = resizer.getElement('.smaller'),
		plus = resizer.getElement('.bigger'),
		content = $('content'),
		current = parseInt(content.getStyle('font-size'), '10');

	if (Cookie.read('font-size')) {
		current = Cookie.read('font-size') || '13px';
		content.setStyle('font-size', current + 'px');
	}
	
	minus.addEvent('click', function(event) {
		current--;
		if (current < 10) {
			current = 10;
		}
		content.setStyle('font-size', current);
		Cookie.write('font-size', current);
		event.preventDefault();
	});
	
	plus.addEvent('click', function(event) {
		current++;
		if (current > 20) {
			current = 20;
		}
		content.setStyle('font-size', current);
		Cookie.write('font-size', current);
		event.preventDefault();
	});

});