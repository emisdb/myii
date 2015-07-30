	
	$(document).ready(function(){
		$('.accordion').gridAccordion({width:980, height:540, columns:4, distance:8, closedPanelWidth:40, closedPanelHeight:40, alignType:'rightBottom', slideshow:true,
                panelProperties:{
                            0:{captionWidth:400, captionHeight:35, captionTop:30, captionLeft:30},
                            1:{captionWidth:280, captionHeight:280, captionTop:20, captionLeft:30},
                            2:{captionWidth:320, captionHeight:80, captionTop:30, captionLeft:330},
                            3:{captionWidth:300, captionHeight:85, captionTop:30, captionLeft:230},
                            4:{captionWidth:280, captionHeight:235, captionTop:70, captionLeft:70},
                            5:{captionWidth:280, captionHeight:235, captionTop:70, captionLeft:70},
                            8:{captionWidth:380, captionHeight:40, captionTop:30, captionLeft:120},
                            14:{captionWidth:150, captionHeight:100, captionTop:30, captionLeft:30},
                            18:{captionWidth:380, captionHeight:40, captionTop:330, captionLeft:420},
                            20:{captionWidth:150, captionHeight:100, captionTop:280, captionLeft:30},
                            22:{captionWidth:380, captionHeight:40, captionTop:330, captionLeft:420}
                    }});
});
	