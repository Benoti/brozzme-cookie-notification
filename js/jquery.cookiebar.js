/*
 * Copyright (C) 2012 PrimeBox (info@primebox.co.uk)
 * 
 * This work is licensed under the Creative Commons
 * Attribution 3.0 Unported License. To view a copy
 * of this license, visit
 * http://creativecommons.org/licenses/by/3.0/.
 * 
 * Documentation available at:
 * http://www.primebox.co.uk/projects/cookie-bar/
 * 
 * When using this software you use it at your own risk. We hold
 * no responsibility for any damage caused by using this plugin
 * or the documentation provided.
 */
(function($){
	$.cookieBar = function(options,val){
		if(options=='cookies'){
			var doReturn = 'cookies';
		}else if(options=='set'){
			var doReturn = 'set';
		}else{
			var doReturn = false;
		}
		//var defaults = {
		//	message: 'We use cookies to track usage and preferences.', //Message displayed on bar
		//	acceptButton: true, //Set to true to show accept/enable button
		//	acceptText: 'I Understand', //Text on accept/enable button
		//	declineButton: false, //Set to true to show decline/disable button
		//	declineText: 'Disable Cookies', //Text on decline/disable button
		//	policyButton: false, //Set to true to show Privacy Policy button
		//	policyText: 'Privacy Policy', //Text on Privacy Policy button
		//	policyURL: '/privacy-policy/', //URL of Privacy Policy
		//	autoEnable: true, //Set to true for cookies to be accepted automatically. Banner still shows
		//	acceptOnContinue: false, //Set to true to silently accept cookies when visitor moves to another page
		//	expireDays: 365, //Number of days for cookieBar cookie to be stored for
		//	forceShow: false, //Force cookieBar to show regardless of user cookie preference
		//	effect: 'slide', //Options: slide, fade, hide
		//	element: 'body', //Element to append/prepend cookieBar to. Remember "." for class or "#" for id.
		//	append: false, //Set to true for cookieBar HTML to be placed at base of website. Actual position may change according to CSS
		//	fixed: true, //Set to true to add the class "fixed" to the cookie bar. Default CSS should fix the position
		//	bottom: false, //Force CSS when fixed, so bar appears at bottom of website
		//	zindex: '9999', //Can be set in CSS, although some may prefer to set here
		//	redirect: String(window.location.href), //Current location
		//	domain: String(window.location.hostname), //Location of privacy policy
		//	referrer: String(document.referrer) //Where visitor has come from
		//};
		if ( cookie_notification_setting.policyButton == 'true' ) {
			var cnspolicyButton = true;
		} else if ( cookie_notification_setting.policyButton == 'false' ) {
			var cnspolicyButton = false;
		}
		if ( cookie_notification_setting.barFixed == 'true' ) {
			var cnsbarFixed = true;
		} else if ( cookie_notification_setting.barFixed == 'false' ) {
			var cnsbarFixed = false;
		}
		if ( cookie_notification_setting.barBottom == 'true' ) {
			var cnsbarBottom = true;
		} else if ( cookie_notification_setting.barBottom == 'false' ) {
			var cnsbarBottom = false;
		}
		if ( cookie_notification_setting.barAppend == 'true' ) {
			var cnsbarAppend = true;
		} else if ( cookie_notification_setting.barAppend == 'false' ) {
			var cnsbarAppend = false;
		}
		if ( cookie_notification_setting.closedivbutton == 'true' ) {
			var cnscloseButton = true;
		} else if ( cookie_notification_setting.closedivbutton == 'false' ) {
			var cnscloseButton = false;
		}
		//
		if ( cookie_notification_setting.acceptButton == 'true' ) {
			var cnsacceptButton = true;
		} else if ( cookie_notification_setting.acceptButton == 'false' ) {
			var cnsacceptButton = false;
		}
		if ( cookie_notification_setting.declineButton == 'true' ) {
			var cnsdeclineButton = true;
		} else if ( cookie_notification_setting.declineButton == 'false' ) {
			var cnsdeclineButton = false;
		}
		if ( cookie_notification_setting.autoEnable == 'true' ) {
			var cnsautoEnable = true;
		} else if ( cookie_notification_setting.autoEnable == 'false' ) {
			var cnsautoEnable = false;
		}
		if ( cookie_notification_setting.acceptOnContinue == 'true' ) {
			var cnsacceptOnContinue = true;
		} else if ( cookie_notification_setting.acceptOnContinue == 'false' ) {
			var cnsacceptOnContinue = false;
		}
		if ( cookie_notification_setting.forceShow == 'true' ) {
			var cnsforceShow = true;
		} else if ( cookie_notification_setting.forceShow == 'false' ) {
			var cnsforceShow = false;
		}
		var defaults = {
			message: cookie_notification_setting.message, //Message displayed on bar
			acceptButton: true, //Set to true to show accept/enable button
			acceptText: cookie_notification_setting.acceptText, //Text on accept/enable button
			declineButton: cnsdeclineButton, //Set to true to show decline/disable button
			declineText: cookie_notification_setting.declineText, //Text on decline/disable button
			policyButton: cnspolicyButton, //Set to true to show Privacy Policy button
			policyText: cookie_notification_setting.policyText, //Text on Privacy Policy button
			policyURL: cookie_notification_setting.policyURL, //URL of Privacy Policy
			autoEnable: cnsautoEnable, //Set to true for cookies to be accepted automatically. Banner still shows
			acceptOnContinue: cnsacceptOnContinue, //Set to true to silently accept cookies when visitor moves to another page
			expireDays: cookie_notification_setting.expireDays, //Number of days for cookieBar cookie to be stored for
			forceShow: cnsforceShow, //Force cookieBar to show regardless of user cookie preference
			effect: cookie_notification_setting.barEffect, //Options: slide, fade, hide
			element: cookie_notification_setting.barElement, //Element to append/prepend cookieBar to. Remember "." for class or "#" for id.
			append: cnsbarAppend, //Set to true for cookieBar HTML to be placed at base of website. Actual position may change according to CSS
			fixed: cnsbarFixed, //Set to true to add the class "fixed" to the cookie bar. Default CSS should fix the position
			bottom: cnsbarBottom, //Force CSS when fixed, so bar appears at bottom of website
			zindex: cookie_notification_setting.barZindex, //Can be set in CSS, although some may prefer to set here
			redirect: String(window.location.href), //Current location
			domain: String(window.location.hostname), //Location of privacy policy
			referrer: String(document.referrer), //Where visitor has come from
			closeButton: cnscloseButton

		};
		var options = $.extend(defaults,options);
		
		//Sets expiration date for cookie
		var expireDate = new Date();
		expireDate.setTime(expireDate.getTime()+(options.expireDays*24*60*60*1000));

		expireDate = expireDate.toGMTString();
		
		var cookieEntry = 'cb-enabled={value}; expires='+expireDate+'; path=/';
		
		//Retrieves current cookie preference
		var i,cookieValue='',aCookie,aCookies=document.cookie.split('; ');
		for (i=0;i<aCookies.length;i++){
			aCookie = aCookies[i].split('=');
			if(aCookie[0]=='cb-enabled'){
    			cookieValue = aCookie[1];
			}
		}
		//Sets up default cookie preference if not already set
		if(cookieValue=='' && options.autoEnable){
			cookieValue = 'enabled';
			document.cookie = cookieEntry.replace('{value}','enabled');
		}
		if(options.acceptOnContinue){
			if(options.referrer.indexOf(options.domain)>=0 && String(window.location.href).indexOf(options.policyURL)==-1 && doReturn!='cookies' && doReturn!='set' && cookieValue!='accepted' && cookieValue!='declined'){
				doReturn = 'set';
				val = 'accepted';
			}
		}
		if(doReturn=='cookies'){
			//Returns true if cookies are enabled, false otherwise
			if(cookieValue=='enabled' || cookieValue=='accepted'){
				return true;
			}else{
				return false;
			}
		}else if(doReturn=='set' && (val=='accepted' || val=='declined')){
			//Sets value of cookie to 'accepted' or 'declined'
			document.cookie = cookieEntry.replace('{value}',val);
			if(val=='accepted'){
				return true;
			}else{
				return false;
			}
		}else{
			//Sets up enable/accept button if required
			var message = options.message.replace('{policy_url}',options.policyURL);
			
			if(options.acceptButton){
				var acceptButton = '<a href="" class="cb-enable">'+options.acceptText+'</a>';
			}else{
				var acceptButton = '';
			}
			//Sets up disable/decline button if required
			if(options.declineButton){
				var declineButton = '<a href="" class="cb-disable">'+options.declineText+'</a>';
			}else{
				var declineButton = '';
			}
			//Sets up privacy policy button if required
			if(options.policyButton){
				var policyButton = '<a href="'+options.policyURL+'" class="cb-policy">'+options.policyText+'</a>';
			}else{
				var policyButton = '';
			}
			//Whether to add "fixed" class to cookie bar
			if(options.fixed){
				if(options.bottom == true){
					var fixed = ' class="fixed bottom"';
				}else{
					var fixed = ' class="fixed"';
				}
			}else{
				var fixed = 'class="basic"';
			}
			if(options.zindex!=''){
				var zindex = ' style="z-index:'+options.zindex+';"';
			}else{
				var zindex = '';
			}

			// Sets up close button if required

				if(options.closeButton == true){
					//var closeButton = '<span class="closethis dashicons dashicons-no " style="float:right;top:5px;" onclick="this.parentNode.parentNode.style.display = \'none\'"></span>';
					var bcncloseButton = '<a href=""></a><i class="fa fa-times"></i></a>';

				}
				else{var bcncloseButton= '';}

			//var closeButton = '<span class="closethis dashicons dashicons-no " style="float:right;top:5px;" onclick="this.parentNode.parentNode.style.display = \'none\'"></span>';
			//var bcncloseButton = '<span class="closethis dashicons dashicons-no " style="float:right;top:5px;"></span>';

			//Displays the cookie bar if arguments met
			if(options.forceShow || cookieValue=='enabled' || cookieValue==''){
				if(options.append){
					$(options.element).append('<div id="cookie-bar"'+fixed+zindex+'><p class="bcn-message">'+message+'<br class="resp-break"/><span class="bcn-button">'+acceptButton+declineButton+policyButton+'</span></p><div class="closethis">'+bcncloseButton+'</div></div>');
				}else{
					$(options.element).prepend('<div id="cookie-bar"'+fixed+zindex+'><p class="bcn-message">'+message+'<br class="resp-break"/><span class="bcn-button">'+acceptButton+declineButton+policyButton+'</span></p><div class="closethis">'+bcncloseButton+'</div></div>');
				}
			}
			
			//Sets the cookie preference to accepted if enable/accept button pressed
			$('#cookie-bar .cb-enable').click(function(){
				document.cookie = cookieEntry.replace('{value}','accepted');
				if(cookieValue!='enabled' && cookieValue!='accepted'){
					window.location = options.currentLocation;
				}else{
					if(options.effect=='slide'){
						$('#cookie-bar').slideUp(300,function(){$('#cookie-bar').remove();});
					}else if(options.effect=='fade'){
						$('#cookie-bar').fadeOut(300,function(){$('#cookie-bar').remove();});
					}else{
						$('#cookie-bar').hide(0,function(){$('#cookie-bar').remove();});
					}
					return false;
				}
			});
			//Sets the cookie preference to declined if disable/decline button pressed
			$('#cookie-bar .cb-disable').click(function(){
				var deleteDate = new Date();
				deleteDate.setTime(deleteDate.getTime()-(864000000));
				deleteDate = deleteDate.toGMTString();
				aCookies=document.cookie.split('; ');
				for (i=0;i<aCookies.length;i++){
					aCookie = aCookies[i].split('=');
					if(aCookie[0].indexOf('_')>=0){
						document.cookie = aCookie[0]+'=0; expires='+deleteDate+'; domain='+options.domain.replace('www','')+'; path=/';
					}else{
						document.cookie = aCookie[0]+'=0; expires='+deleteDate+'; path=/';
					}
				}
				document.cookie = cookieEntry.replace('{value}','declined');
				if(cookieValue=='enabled' && cookieValue!='accepted'){
					window.location = options.currentLocation;
				}else{
					if(options.effect=='slide'){
						$('#cookie-bar').slideUp(300,function(){$('#cookie-bar').remove();});
					}else if(options.effect=='fade'){
						$('#cookie-bar').fadeOut(300,function(){$('#cookie-bar').remove();});
					}else{
						$('#cookie-bar').hide(0,function(){$('#cookie-bar').remove();});
					}
					return false;
				}
			});
			$('.closethis').click(function(){

				if(options.effect=='slide'){
					$('#cookie-bar').slideUp(600,function(){$('#cookie-bar').remove();});
				}else if(options.effect=='fade'){
					$('#cookie-bar').fadeOut(300,function(){$('#cookie-bar').remove();});
				}else{
					$('#cookie-bar').hide(0,function(){$('#cookie-bar').remove();});
				}

			});
		}
	};


})(jQuery);

