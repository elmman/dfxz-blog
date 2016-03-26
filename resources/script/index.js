$(function(){
	$("section").each(function(){
		$(this).mouseover(function(){
  			$(this).css('box-shadow','6px 6px 4px #888888');
		});

		$(this).mouseout(function(){
	  		$(this).css('box-shadow','');
		});
	});
});
