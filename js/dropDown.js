//<div id="me">
//	<div class="title">Show me the money</div>
//	<div class="menu">
//		<div>Some thing to show 1</div>
//		<div>Some thing to show 2</div>
//		<div>Some thing to show 3</div>
//		<div>Some thing to show 4</div>
//		<div>Some thing to show 5</div>
//	</div>
//</div>
(function($){
	$.fn.dropDown = function(options){
		var defaults = {
			menu:'',
			title:'',
			afterClick:function(){}
		},
		o = $.extend({},defaults, options);
		return this.each(function(){
			var $this= $(this);
			var that = this;
			var $menu = $this.find(o.menu);
			$this.click(function(){
				$menu.toggle(50);
			});
			$menu.children().click(function(e){
				var code = $(e.target).attr('code');
				var text = $(e.target).text();
				$(o.title).attr('code', code);
				$(o.title).text(text);
				o.afterClick.call(this);
			});	
			$(document).click(function(e){
				if( e.target != that && !$.contains(that, e.target) ){
					$menu.hide(50);
				}
			});	
		});
	}
})(jQuery);