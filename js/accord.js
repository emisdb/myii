/*
 * Accordionza jQuery Plugin
 * Copyright 2010-2012, Geert De Deckere <geert@idoe.be>
 */
 ;(function($)
 {var r='1.1';
 
	$.fn.accordionza=function(q)
	{
		var o=$.extend(true,{},$.fn.accordionza.defaults,q);
		this.each(function(){
			var c=$(this);
			var d=c.children('li');
			var e=d.first();
			var f=d.last();
			d.removeClass(o.classSlideOpened);
			var g=d.eq(o.startSlide-1);
			if(!g.length){g=e}
			var h=c.width();
			var j=c.height();
			var k=(o.slideWidthClosed===false)?e.find('.'+o.classHandle).first().outerWidth():o.slideWidthClosed;
			var l=h-(d.length-1)*k;
			var m;var n;var p=false;
                        c.css({'overflow':'hidden'});
                        if(c.css('position')==='static'){c.css({'position':'relative'})}
                        d.css({'position':'absolute','top':0,'width':l+'px','height':j+'px'});
                        d.each(function(i){$(this).css('left',i*k+'px').data('order',i)});
                        $('.'+o.classCaption,d).css('top',j+'px');
                        function startAutoPlay(){stopAutoPlay();
                            m=setInterval(function(){if(!p){nextSlide().trigger('slide')}},o.slideDelay)}
                        function stopAutoPlay(){clearInterval(m)}
                        function pauseAutoPlay(a)
                        {if(a===undefined){var a=o.autoRestartDelay}
                            stopAutoPlay();if(a===false){return}clearTimeout(n);
                            n=setTimeout(function(){startAutoPlay()},a)}
                        function prevSlide(a)
                        {if(a===undefined){var a=true}var b=g.prev();
                            if(b.length){return b}
                            else if(a){return f}
                            else{return g}}
                        function nextSlide(a){if(a===undefined){var a=true}
                            var b=g.next();
                            if(b.length){return b}
                            else if(a){return e}
                            else{return g}}
                        d.bind(o.slideTrigger,function(){pauseAutoPlay();$(this).trigger('slide')});
                        d.bind('slide',
                        function(){
                            var a=$(this);
                            if(a.hasClass(o.classSlideOpened))
                            {return}
                            g.removeClass(o.classSlideOpened);
                            a.addClass(o.classSlideOpened);
                            d.filter(':gt('+a.data('order')+')').each(function()
                            {$(this).stop(true).animate({left:l+($(this).data('order')-1)*k+'px'},
                                o.slideSpeed,o.slideEasing)}).end().filter(':lt('+(a.data('order')+1)+')').each(function(){$(this).stop(true).animate({left:$(this).data('order')*k+'px'},o.slideSpeed,o.slideEasing)});g.find('.'+o.classCaption).stop(true).animate({top:j+'px'},o.captionSpeed,o.captionEasing);a.find('.'+o.classCaption).stop(true).delay(o.captionDelay).animate({top:j-o.captionHeight+'px'},o.captionSpeed,o.captionEasing);if($.isFunction(o.onSlideClose)){o.onSlideClose.call(g)}if($.isFunction(o.onSlideOpen)){o.onSlideOpen.call(a)}$.event.trigger('accordionza_slide');g=a});d.find('.'+o.classCaptionToggle).click(function(){pauseAutoPlay();var a=$(this).closest('li').find('.'+o.classCaption);if(!g.hasClass(o.classCaptionCollapsed)){a.stop(true).animate({top:j-o.captionHeightClosed+'px'},o.captionSpeed,o.captionEasing)}else{a.stop(true).animate({top:j-o.captionHeight+'px'},o.captionSpeed,o.captionEasing)}g.toggleClass(o.classCaptionCollapsed)});if(o.navKey){$(document.documentElement).keyup(function(a){if(a.which==37){prevSlide().trigger(o.slideTrigger)}else if(a.which==39){nextSlide().trigger(o.slideTrigger)}})}g.trigger('slide');if(o.autoPlay){if(o.pauseOnHover){c.mouseenter(function(){p=true}).mouseleave(function(){p=false})}startAutoPlay()}});return this};
 
 $.fn.accordionza.defaults={autoPlay:false,
     autoRestartDelay:false,
     captionDelay:0,
     captionEasing:'swing',
     captionHeight:50,
     captionHeightClosed:0,
     captionSpeed:500,
     classSlideOpened:'slide_opened',
     classCaption:'slide_caption',
     classCaptionCollapsed:'slide_caption_collapsed',
     classCaptionToggle:'slide_caption_toggle',
     classHandle:'slide_handle',
     navKey:false,
     onSlideClose:null,
     onSlideOpen:null,
     pauseOnHover:false,
     slideDelay:5000,
     slideEasing:'swing',
     slideSpeed:500,
     slideTrigger:'click',
     slideWidthClosed:false,
     startSlide:1}})(jQuery);