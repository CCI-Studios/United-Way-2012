(function (window, document) {
	window.addEvent('domready', function () {
		if (Modernizr.input.placeholder) {
			return;
		}

		$$('input[placeholder], textarea[placeholder]').each(function (input) {
			var placeholder = input.getProperty('placeholder');

			input.addEvents({
				focus: function () {
					if (input.value === placeholder) {
						input.value = '';
					}
				},
				blur: function () {
					if (input.value === '') {
						input.value = placeholder;
					}
				}
			});
			
			input.value = placeholder;
		});
	});
}(this, this.document));
