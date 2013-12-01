(function($){
	$.fn.validate = function(options){
		var defaults = {
			required:true,
			minChar:0,
			maxChar:0,
			highlight:'focus'
		},
		o = $.extend({},defaults, options);
			var $this=$(this);
			var val = $this.val();
			if(o.required==true && val==''){
				if(o.highlight.length){$this.addClass(o.highlight);}
				return false;
			}else if(o.minChar>0 && val.length < o.minChar ){
				return false;
			}else if(o.maxChar>0 && val.length >o.maxChar ){
				return false;	
			}else{return true;}
			
	}
})(jQuery);

(function($){
	$.fn.countChar = function(options){
		var defaults = {maxChar:0,countElement:''},
		o = $.extend({},defaults, options);
		return this.each(function(){
			var $this=$(this);
			var V;
			var L = $this.val().length;
			$this.bind('keyup keydown paste focus',function(){
				
				L = $this.val().length;
				V = $this.val();
				if(o.maxChar>0 && L > o.maxChar){
					$this.val(V.substr(0,o.maxChar));
					L = $this.val().length;
				}
				$(o.countElement).text(o.maxChar-L);
			});
		});		
	}
})(jQuery);

