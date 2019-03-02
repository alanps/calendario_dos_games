(function($) {

    $(document).ready(function(){

        if($(".carousel").length > 0 ) {
            var content = new Carousel($(".carousel"));
        }

    });


    var Carousel =  function(el) {

		el.carousel({
			interval: 10000
		});

	    el.find(".arrow-left").click(function(){
			el.carousel('prev');
	    });

	    el.find(".arrow-right").click(function(){
			el.carousel('next');
	    });

        return this;
    }

})(jQuery);