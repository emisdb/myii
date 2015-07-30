
 function openW(mypage,myname,w,h,features) {
		  if(screen.width){
		  var winl = (screen.width-w)/2;
		  var wint = (screen.height-h)/2;
		  }else{winl = 0;wint =0;}
		  if (winl < 0) winl = 0;
		  if (wint < 0) wint = 0;
		  var settings = 'height=' + h + ',';
		  settings += 'width=' + w + ',';
		  settings += 'top=' + wint + ',';
		  settings += 'left=' + winl + ',';
		  settings += features;
		  if(mypage.substring(0,6)=="globus")
		  {
//			  var win = window.open("/yiit/glob/glob.html","",settings);
			  var win = window.open("/yiitest/glob/glob.html","",settings);
	  
		  }
		  else
		  {
		  var str="<html><head><title>"+myname+"</title></head><body bgcolor='#fff' style='margin:auto;text-align:center'><img  style='height:100%;margin:auto;' src='"+mypage+"'></body></html>";
		  win = window.open('','',settings);
			win.document.write(str);
			}
		  win.window.focus();
}

  window.onload = (function(){
		var i,ii;

		$('.lable').each(function(i,elem) {

				var n=elem.className.indexOf("sym");
					if(!(n<0))
					{
						var stri=elem.className.substr(n);
							elem.onmouseover=function(){
							tooltip(elem,stri);
							return false;
						}
						elem.onmouseout=function(){
							hide_info(elem,stri);
							return false;
						}
					}
					});

 			}); 
