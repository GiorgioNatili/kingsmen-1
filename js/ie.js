$(function(){
  
   
    // Detecting IE
    var oldIE;

    if (/MSIE (\d+\.\d+);/.test(navigator.userAgent))
    { 
       var ieversion=new Number(RegExp.$1);
       if (ieversion<=7){
          oldIE = true;
       }
    }

    if (oldIE) {
        //load style to document
        (function(){
            var css = 'body, html {background-color:#92959d; width:100%;height:100%;line-height:30px; color:#b4b7c1; } * {font-family:"Quicksand", helvetica}';
            if ('\v' == 'v') /* ie only */ {
                document.createStyleSheet().cssText = css;
            }
            else {
                var style = document.createElement('STYLE');
                style.type = 'text/css';
                style.innerHTML = css;
                document.getElementsByTagName('HEAD')[0].appendChild(style);
            }
        })();

        // create notice text and suggested donwload link of good browser

        var html = '<div style="width:100%; height:100%; position:relative;">'+
                    '<div style="position:absolute; width:600px; height:50px; text-align:center; top:35%; right:0; bottom:65%; left:0; margin:auto">'+
                        '<h2>Browser Internet Explore Is Not Supported</h2>'+
                        '<p>please use another browser, download link:</p>'+
                        '<a style="color:#ff893a; font-size:40px; line-height:200px; text-decoration:none" href="http://www.mozilla.org/en-US/"><img alt="" src="http://mozorg.cdn.mozilla.net/media/img/firefox/new/header-firefox.png?2013-06" /></a>'+
                    '</div>'+
                '</div>';

        document.body.innerHTML='';            
        document.body.innerHTML = html;
    } 
});
 
