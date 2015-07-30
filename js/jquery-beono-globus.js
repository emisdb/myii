/**
 * @author Beono | http://www.beono.ru | ibeono@gmail.com
 * @version 0.8	 | 2010.04.18
 * 
 * “ä License: GPLv2
 *
 */
 
var beonoGlobusIdCounter = 0;
(function($){
	
	var obBeonoGlobus = new Array();
	jQuery.fn.beonoGlobus = function(options) {	
		
	var settings = {
		rotationSpeed: 100,
		framesCount: 8,
		currentFrame: 0,
		api: false,
		length: 0,
		mouseControl: true,
		keyboardControl: true,
		mouseTurns: 2,
		debug: false,
		rotateLeftButton : false,
		rotateRightButton : false,
		rotateResetButton : false,
		fadeInTime : 0,
		onReady: function () { return true; },
		onBeforeRotateLeft: function () { return true; },
		onAfterRotateLeft: function () { return true; },
		onBeforeRotateRight: function () { return true; },
		onAfterRotateRight: function () { return true; },
		onBeforeStop: function () { return true; },
		onAfterStop: function () { return true; }
	};
	
	settings = jQuery.extend(settings, options);	
	
	this.each(function(i) {
		// Generate id for each plugin object		
		obBeonoGlobus[beonoGlobusIdCounter] = new beonoGlobus(jQuery(this), beonoGlobusIdCounter);
		beonoGlobusIdCounter++;	
	});	
	
	function beonoGlobus (linkObj, id) {

		jQuery(linkObj).attr("id", "beonoGlobus-"+id);
			
		this.id = id;
		this.linkObj = linkObj;
		this.selector = "#beonoGlobus-"+this.id;
		this.obSelector = jQuery("#beonoGlobus-"+this.id);
		this.sprites = true;
		this.mouseTurns = settings.mouseTurns;
		this.mouseControl = settings.mouseControl;
		this.keyboardControl = settings.keyboardControl;
		this.framesCount = settings.framesCount;		
		this.currentFrame = settings.currentFrame;
		this.currentDirection = null;
		this.isMouseMoving = null;
		this.isKeyPressed = null;
		this.rotationSpeed = settings.rotationSpeed;
		this.rotateAuto = "";
		this.rotationMode = "default";
		this.rotateLeftButton = settings.rotateLeftButton;
		this.rotateRightButton = settings.rotateRightButton;
		this.rotateResetButton = settings.rotateResetButton;
		this.fadeInTime = settings.fadeInTime;
		this.onReady = settings.onReady;
		this.onBeforeRotateLeft = settings.onBeforeRotateLeft;
		this.onAfterRotateLeft = settings.onAfterRotateLeft;
		this.onBeforeRotateRight = settings.onBeforeRotateRight;
		this.onAfterRotateRight = settings.onAfterRotateRight;
		this.onBeforeStop = settings.onBeforeStop;
		this.onAfterStop = settings.onAfterStop;
		
		var __instance = this;
		
		$("#beonoGlobus-"+__instance.id).addClass("loading");
		var src = $("#beonoGlobus-"+__instance.id+" img").hide().attr("src");
		
		$("#beonoGlobus-"+__instance.id+" img")
		.removeAttr("src").attr("src", src).load(function () {		
			__instance.frameWidth = $("#beonoGlobus-"+__instance.id+" img").width() / __instance.framesCount;
			$("#beonoGlobus-"+__instance.id).removeClass("loading").css({
				"height": $("#beonoGlobus-"+__instance.id+" img").height() + "px",
				"width": __instance.frameWidth + "px"
			}).find("img").css({
				"position": "absolute", 
				"width": __instance.framesCount * __instance.frameWidth + "px"
			});
			$("#beonoGlobus-"+__instance.id+" img").fadeIn(__instance.fadeInTime);
			__instance.onReady();
		});
		
		// Events
		if (this.rotateLeftButton ) {
			jQuery(this.rotateLeftButton).bind("mousedown", function () {
				jQuery(this).addClass("active");
				__instance.rotateStop();
				__instance.rotateLeft();
				return true;
			});
			
			jQuery(this.rotateLeftButton).bind("mouseout mouseup", function () {
				jQuery(this).removeClass("active");
				if (__instance.getRotationMode() != 'auto') { 
					__instance.rotateStop();
					return true;
				}
			});
		}
		if (this.rotateRightButton) {
			jQuery(this.rotateRightButton).bind("mousedown", function () {
				jQuery(this).addClass("active");
				__instance.rotateStop();
				__instance.rotateRight();
				return true;
			});
			
			jQuery(this.rotateRightButton).bind("mouseout mouseup", function () {
				jQuery(this).removeClass("active");
				if (__instance.getRotationMode() != 'auto') { 
					__instance.rotateStop();
					return true;
				}
			});		
		}
				
		
		
		this.easyStop = function () {
		
			var i = 0;
			for (i=0;i<=5;i++)
			{
				if (__instance.getCurrentDirection() == "left") {
					setTimeout(function () { __instance.rotateLeft(); } , __instance.rotationSpeed*i);
				} else if (__instance.getCurrentDirection() == "right") {
					setTimeout(function () { __instance.rotateRight(); } , __instance.rotationSpeed*i);
				}
			}
		};
		
		var next_point = null;
		var prev_mouse_position = null;	
		
		this.mouseDownHandler = function () {
			__instance.isMouseMoving = true;
			__instance.rotateStop();
			return false;
		};
		
		this.mouseUpHandler = function () {		
			__instance.isMouseMoving = false;
			prev_mouse_position = null;
			next_point = null;
			__instance.setCurrentDirection(false);		
			return true;
		};				
			
		this.mouseMoveHandler = function (e) {
			
			
			// ‡?·?‡À‡» ·?‡»·?‡»‡Õ‡¿ ‡Œ·?‡≈‡Õ·? ‡Ã‡¿‡À‡≈‡Õ·?‡ ‡¿·? ‡»‡À‡» ‡ ‡Õ‡Œ‡œ‡ ‡¿ ‡Ã·?·?‡» ‡Õ‡≈ ‡¡·?‡À‡¿ ‡Õ‡¿‡∆‡¿·?‡¿
			if (!__instance.isMouseMoving) {
				return true;
			}

			var current_mouse_position = e.pageX - jQuery("#beonoGlobus-"+__instance.id).offset().left;
			//var current_mouse_position = e.pageY - jQuery("#beonoGlobus-"+__instance.id).offset().top;
			
					
			// ‡?·?·?‡»·?‡À·?‡≈‡Ã ‡Õ‡¿‡œ·?‡¿‡¬‡À‡≈‡Õ‡»‡≈
			if (current_mouse_position > prev_mouse_position) {
				__instance.setCurrentDirection("right");
			} else if (current_mouse_position < prev_mouse_position) {
				__instance.setCurrentDirection("left");
			}

			// ‡?·?‡¿·?‡¿‡≈‡Ã
			if (current_mouse_position > next_point && __instance.getCurrentDirection() == "right" && prev_mouse_position) {
				__instance.rotateStop();
				__instance.rotateRight();
			} else if (current_mouse_position < next_point && __instance.getCurrentDirection() == "left" && prev_mouse_position) { 
				__instance.rotateStop();
				__instance.rotateLeft();
			}

			// ‡£‡»·?‡»‡Õ·? ‡¬·?‡≈‡√‡Œ ‡ ‡Œ‡Õ·?‡≈‡…‡Õ‡≈·?‡¿ ‡ƒ‡≈‡À‡»‡Ã ‡Õ‡¿ ‡ ‡Œ‡À-‡¬‡Œ ‡»‡«‡Œ‡¡·?‡¿‡∆‡≈‡Õ‡»‡…,
			// ·?‡¿‡ ‡»‡Ã ‡Œ‡¡·?‡¿‡«‡Œ‡Ã ‡Œ‡œ·?‡≈‡ƒ‡≈‡À·?·? ‡»‡Õ·?‡≈·?‡¬‡¿‡À ‡œ‡≈·?‡≈‡ ‡À·?·?‡≈‡Õ‡»‡… ‡ ‡¿‡ƒ·?‡Œ‡¬
			if (current_mouse_position > next_point && __instance.getCurrentDirection() == "right") { 
				next_point = parseInt(current_mouse_position) + (jQuery("#beonoGlobus-"+__instance.id).width() / __instance.framesCount) / __instance.mouseTurns;
			} else if (current_mouse_position < next_point && __instance.getCurrentDirection() == "left") {
				next_point = parseInt(current_mouse_position) - (jQuery("#beonoGlobus-"+__instance.id).width() / __instance.framesCount) / __instance.mouseTurns;
			}

			prev_mouse_position = current_mouse_position;

			return false;
		};
		
		this.keyDownHandler = function(event) {
			switch (event.keyCode) {
				case 37:
					if (__instance.isKeyPressed) return false; 
					__instance.isKeyPressed = true;
					__instance.rotateStop();
					__instance.rotateLeft();
				break;
				case 39:
					if (__instance.isKeyPressed) return false; 
					__instance.isKeyPressed = true;
					__instance.rotateStop();
					__instance.rotateRight();
				break;
			}			
		};
		
		this.keyUpHandler = function(event){
			if (event.keyCode == 37 || event.keyCode == 39) {
				__instance.isKeyPressed = false;
				for (i in obBeonoGlobus) {
					if (obBeonoGlobus[i].getRotationMode() == 'default') {
						obBeonoGlobus[i].rotateStop();
					}
				}
			}
		};
		
		// Methods
		this.debug = function (value) {
			if (settings.debug) {
				$(".debug").html(value +  "<br/>");
			}
		};
		
		this.setMouseControl = function (value) {
   			this.mouseControl = value;
   			if (value) {
	   			jQuery("#beonoGlobus-"+this.id).bind("mousedown", __instance.mouseDownHandler);
	   			jQuery("html").mousemove(__instance.mouseMoveHandler);  
	   		} 			
   		}
   		
   		this.getMouseControl = function () {
   			return this.mouseControl;
   		}
   		
   		this.setKeyboardControl = function (value) {
   			this.keyboardControl = value;
   			if (value) {
	   			jQuery("html").mouseup(__instance.mouseUpHandler);
				jQuery(document).keydown(__instance.keyDownHandler);			
				jQuery(document).keyup(__instance.keyUpHandler);
			}
   		}
   		
   		this.getKeyboardControl = function () {
   			return this.keyboardControl;
   		}
   		
   		this.setRotationMode = function (value) {
   			this.rotationMode = value;
   		}
   		
   		this.getRotationMode = function () {
   			return this.rotationMode;
   		}
   		
   		this.setRotationSpeed = function (value) {
   			this.rotationSpeed = value;
   		}
   		
   		this.getRotationSpeed = function () {
   			return this.rotationSpeed;
   		}
   		
   		if(this.rotateResetButton) {
   			$(this.rotateResetButton).live("click", function () { __instance.rotateToFrame(0);});
   		}
   		
   		if(this.mouseControl) {
			this.setMouseControl(true);
		}
		
		// ‡?‡¡·?‡¿‡¡‡Œ·?‡ ‡¿ ‡Õ‡¿‡∆‡¿·?‡»‡… ‡ ‡À‡¿‡¬‡»·? ‡ ‡À‡¿‡¬‡»‡¿·?·?·?·?
		if(this.keyboardControl) {
			this.setKeyboardControl(true);
		}
   		
   		this.rotateToFrame = function (frameNumber) {
   			
	   		if (this.currentFrame != frameNumber && frameNumber <= this.framesCount) {

	   			if (!this.getCurrentDirection()) {
		   			if((this.framesCount / 2) > this.currentFrame) {
		   				this.setCurrentDirection("left");
		   			} else {
		   				this.setCurrentDirection("right");
		   			}
		   			
	   			} else if(this.getCurrentDirection() == "left") {
	   				this.rotateLeft(); 
	   			} else {
	   				this.rotateRight(); 
	   			}	   				   		

				setTimeout(function () { 
		   			__instance.rotateToFrame(frameNumber); 
		   		}, this.rotationSpeed/2);
	   		} else {
	   			__instance.rotateStop();
	   		}
   				   		
   		}
	
		this.rotateLeft = function () {
		
			this.onBeforeRotateLeft();

			this.setCurrentDirection("left");
			// ‡?·?‡À‡» ‡¿‡¬·?‡Œ‡œ·?‡Œ·?‡Ã‡Œ·?·? ‡¬‡ ‡À·?·?‡≈‡Õ ‡» setInterval ‡≈·?·? ‡Õ‡≈ ‡¡·?‡À ‡«‡¿‡œ·?·?‡≈‡Õ
			if ((jQuery(this.rotateLeftButton).hasClass("active") || this.isKeyPressed || this.getRotationMode() == 'auto') && !this.rotateAuto) {	
				this.rotateAuto = setInterval(function () { __instance.rotateLeft(); }, this.rotationSpeed);
			}
			
			// ‡?·?‡À‡» ·?‡≈‡ ·?·?‡»‡… ‡ ‡¿‡ƒ·? ‡œ‡Œ·?‡À‡≈‡ƒ‡Õ‡»‡…
			if (this.currentFrame+1 >= this.framesCount) {
				this.currentFrame = -1;
			}
			this.currentFrame += 1;
			$("#beonoGlobus-"+this.id+" img").css("left", "-"+this.currentFrame * this.frameWidth + "px");

			this.onAfterRotateLeft();
			
		}		
	
		this.rotateRight = function () {

			this.onBeforeRotateRight();
			
			__instance.setCurrentDirection("right");
			// ‡?·?‡À‡» ‡¿‡¬·?‡Œ‡œ·?‡Œ·?‡Ã‡Œ·?·? ‡¬‡ ‡À·?·?‡≈‡Õ ‡» setInterval ‡≈·?·? ‡Õ‡≈ ‡¡·?‡À ‡«‡¿‡œ·?·?‡≈‡Õ
			if ((jQuery(this.rotateRightButton).hasClass("active") || this.isKeyPressed || this.getRotationMode() == 'auto') && !__instance.rotateAuto) {						
				this.rotateAuto = setInterval(function () { __instance.rotateRight(); }, this.rotationSpeed);
			}

			// ‡?·?‡À‡» ·?‡≈‡ ·?·?‡»‡… ‡ ‡¿‡ƒ·? ‡œ‡Œ·?‡À‡≈‡ƒ‡Õ‡»‡…
			if (this.currentFrame < 1) {
				this.currentFrame = this.framesCount;
			}
			this.currentFrame -= 1;
			$("#beonoGlobus-"+this.id+" img").css("left", "-"+this.currentFrame * this.frameWidth + "px");
		
			this.onAfterRotateRight();
		}
				
		this.rotateStop = function () {
		
			__instance.onBeforeStop();
		
			if (__instance.rotateAuto) {
				window.clearInterval(__instance.rotateAuto);
				__instance.rotateAuto = false;
			}
			/*var easy = false;
			if (!easy) {
				__instance.easyStop();
			}*/
			__instance.setCurrentDirection(false);
			__instance.onAfterStop();
		}
		
		this.getCurrentDirection = function () {
			return this.currentDirection;
		}
		
		this.setCurrentDirection = function (value) {
			__instance.currentDirection = value;
		}	
	} 

	// ‡?·?‡»·?‡¿‡≈‡Ã ‡œ‡¿·?‡¿‡Ã‡≈·?·?·? ·? ‡ ‡Œ·?‡Œ·?·?‡Ã‡» ‡¬·?‡«‡¬‡¿‡Õ ‡œ‡À‡¿‡√‡»‡Õ
	options = false;
	
	if (settings.api == "last") {
	
	
	} else if(settings.api == true || settings.api == 'all') {
		var iter = 0;
		returnObj = new Array();
		for (i in obBeonoGlobus) {
			returnObj[iter] = obBeonoGlobus[i];
			iter++;
		}
		return returnObj;
	} else {
		return this;
	}
	 
	};
})(jQuery);