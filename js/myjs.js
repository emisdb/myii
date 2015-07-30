var steps=1;

function step4()
{
    $("#layer"+steps).fadeTo(2000,0.4,function(){step2();});
}

function step3()
{
    $("#layer"+steps).fadeIn(2000,function(){step4();});
}

function step2()
{
    $("#layer"+steps).fadeOut(2000,function() {step3();});
    if(steps>5) steps=1;
    else    steps=steps+1;
}
function step1()
{
//    $("#layer1").css("height","167px");
    $("#layer1").fadeTo("fast",1,function(){step2();});
}



$(function(){
 		$(document).ready(function(){
 
    		$("li.movable").mouseover(function(){
   				$(this).removeClass("m_inactive");
   				$(this).addClass("m_active");
        		$("li.m_active").animate({ width: "250px"}, 500 );
  //    			$("li.inactive").animate({ width: "100px"}, 500 );
      		});
      		$("li.movable").mouseout(function(){
    			$(this).removeClass("m_active");
   				$(this).addClass("m_inactive");
      			$("li.movable").animate({ width: "45px"}, 500 );
    		});

	// Accordion Demo #1
	$('#accordion1').accordionza({
		autoPlay: true,
		captionDelay: 1000,
		captionEasing: 'easeOutBounce',
		captionHeight: 400,
		captionHeightClosed: 10,
		navKey: true,
		slideDelay: 4000,
		slideTrigger:'mouseover'
		});			
     
  		});

/*
$("#footer").hide();
     */
$("#layer1").fadeTo(1500,0.3,function() {step1();});

});


