/* columns */
var CCI = window.CCI || {};
CCI.Columns = new Class({

	container: null,
	selector: null,
	columns: null,
	height: null,
	
	offset: null,

	initialize: function(container, selector) {
		if (!container) {
			return;
		}
		
		this.container = container;
		this.selector = selector;
		this.columns = this.container.getElements(this.selector);
		
		this._calculate();
		
		if ($$('.ie7').length == 0) {
			window.addEvent('resize', function() {
				this._calculate();
			}.bind(this));
		}
	},
	
	_calculate: function() {
		this.offset = 0;
		this.height = 0;
		
		this.columns.setStyle('height', null);
		
		if (window.getSize().x < 480) {
			return;
		}
		
		var i, _len, height;
		height = 0;
		for (i = 0, _len = this.columns.length; i < _len; i++) {
			height = this.columns[i].getSize().y - this.offset;
			if (height > this.height) {
				this.height = height;
			}
		}
		
		this.columns.setStyle('height', this.height);
	}
	
});