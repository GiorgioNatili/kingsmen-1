//$(function(){
//	$.fn.fitSize = function(target_object){
//		return this.each(function(){
//			var $this=$(this);	
//			var fake_height = $this.outerHeight(true)-$this.height();
//			$this.height(target_object.height()-fake_height);
//			var fake_width = $this.outerWidth(true)-$this.width();
//			$this.width(target_object.width()-fake_width);
//		}); 
//    };
//});

//call
//$('.wantedToFit').fitSize({
// 	target:$(".role_model"),
// 	fitWidth:true,
// 	fitHeight:true
// });

(function($){
	$.fn.fitSize = function(options){
		var defaults = {
			target:'',
			fitWidth: true,
			fitHeight: true
		},
		settings = $.extend({},defaults, options);
		
		return this.each(function(){
			
			var $this=$(this);
			if(settings.fitWidth == true) {
				var fakeWidth = $this.outerWidth(true)-$this.width();
				$this.width($(settings.target).width()-fakeWidth);
			}
			if(settings.fitHeight == true){
				var fakeHeight = $this.outerHeight(true)-$this.height();
				$this.height($(settings.target).height()-fakeHeight);
			}
		});
	}
})(jQuery);