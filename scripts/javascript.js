function test()
 {
 alert ('Tests');
 }
 
function imageGalerie()
{
    var active = $('#galerie .active');
     
    var next = (active.next().length > 0) ? active.next() : $('#galerie img:first');
     
       active.fadeOut(function(){
	       active.removeClass('active');
    	   next.fadein().addClass('active');  
       }); 
}
 
setInterval('imageGalerie()',2500);