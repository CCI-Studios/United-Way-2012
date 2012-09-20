// the class
Request.flickr = new Class({
    Extends: Request.JSONP,
    options: {
        url: "http://api.flickr.com/services/rest/?",
        callbackKey: "jsoncallback"
    },
    initialize: function(params, options) {
        this.parent(options);
        this.options.url = this.options.url + Object.toQueryString(params);
    },
    imageURL: function(obj) {
        return "http://farm{farm}.static.flickr.com/{server}/{id}_{secret}.jpg".substitute(obj);
    }
});

window.addEvent('load', function() {
	var galleries = $$('[data-module="flickr-set"]');
	galleries.each(function(gallery) {
		var setID = gallery.get('data-setid');
		new Request.flickr({
	    		format: 'json',
	    		api_key: "a265008382dac7e09153bf32dcd42156",
	    		photoset_id: setID,
	    		method: "flickr.photosets.getPhotos"
			}, {
    		onSuccess: function(data) {
		        var self = this;
		        data.photoset.photo.each(function(el) {
		            new Asset.image(self.imageURL(el), {
		                onload: function() {
		                	var div = new Element('div', {
		                		'class': 'photo'
		                	});
		                	var a = new Element('a', {
		                		'href': this.src,
		                		'class': 'modal',
		                		'rel': "{handler: 'images'}"
		                	});
		                	this.inject(a);
		                    a.inject(div);
		                    div.inject(gallery);

		                    SqueezeBox.assign(a);
		                }
		           });
		        });
	    	}
		}).send();
	});
});