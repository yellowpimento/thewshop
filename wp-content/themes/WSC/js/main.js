(function($) {

	$(document).ready(function(){
		if($('body').hasClass('mobile')) {




		}else{
			$.fn.setAllToMaxHeight = function(){
				return this.height( Math.max.apply(this, $.map( this , function(e){ return $(e).height() }) ) );
			}
		
			$('#topmenu li:not(.lang-item) a').hover(function(){
				$(this).find('span').show();
			},function(){
				$(this).find('span').hide();
			});
		
		
			$('ul.shops:first').css({marginLeft:0});
		
		
			$('.shoplogo').mouseover(function(){
				if($(this).find('img').length>0){
					$(this).find('span').hide();
					$(this).find('img').show();
				}
			});
			$('.shoplogo').mouseout(function(){
				if($(this).find('img').length>0){
					$(this).find('span').show();
					$(this).find('img').hide();
				}		
			});
			$('.contact').setAllToMaxHeight();
		
		
			if($("#feature")){
				var inds = 0;
				$("#feature img").hide();
				$("#feature img:eq(0)").show();
				var timerfeat = $.timer(function(nbss) {
					nbss = $("#feature img").length;
					$("#feature img:eq("+inds+")").stop().fadeOut(800);
					inds++; if(inds >= nbss) inds=0;
					$("#feature img:eq("+inds+")").stop().fadeIn(800);
		        });
		        timerfeat.set({ time : 3000, autostart : true });
			}
		
			if($("#slideshow")){
				var nbs = $(".slide").length;
				var ind = 0;
				$("#slide0").show();
				var timer = $.timer(function() {
					$("#slide"+ind).stop().fadeOut(800);
					$("#hand"+ind).removeClass('on');
					ind++; if(ind >= nbs) ind=0;
					$("#slide"+ind).stop().fadeIn(800);
					$("#hand"+ind).addClass('on');
		        });
		        timer.set({ time : 4000, autostart : true });
		        
		        $('#hands a').hover(function(){
		        	timer.pause();
					$("#hands a").removeClass('on');
					$(this).addClass('on');
					$("#slide"+ind).hide().css({opacity:1});
			        ind = ($(this).attr("id")).substr(4);
					$("#slide"+ind).show().css({opacity:1});
		        },function(){
			        timer.play();
		        }).click(function(){return false;});
			}
		
			if($(".focus")){
				$(".focus a").hover(function(){
					$(this).find("h3").stop().animate({bottom:0},100);
					$(this).find("article").stop().animate({top:0},100);
				},
				function(){
					$(this).find("h3").stop().animate({bottom:20},500);
					$(this).find("article").stop().animate({top:-165},500);
				});
			}
			
		}
	});
})( jQuery );






