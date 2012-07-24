
////////////////////////////////////////////////////////////////////////////////////////////////////
//	Global variables	MOBILE													  				  //
////////////////////////////////////////////////////////////////////////////////////////////////////

	
//	initScreen vars
	var wh;				//	Viewport height
	var ww;				//	Viewport width
	var dh;				//	Document height (whole content)
	var sd;				//	Screen dimensions
	
	var scrolled = 0;	//	Amount scrolled

//	accordion vars
	var closeHeight = 40;
	
	
	var showme = 25;
	var showoffset = 25;
	
//	////	End global variables


////////////////////////////////////////////////////////////////////////////////////////////////////
//	Page initialisation and control	of screen													  //
////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
//	When document structure is loaded
	$(document).ready(function() {
	
		//	Basic functions to do once
			//	Update screen
				initScreen();
		
		//	Start features
			geenAlphaOmega();
			geenOmenom();
			geenShowmore();
			geenScrollert();
			geenTabs();
			geenAccordeon();
			geenStemCheck();
			
		
	});	//	////	End document ready
	
//	When user scrolls
	$(window).scroll(function() {
	
		//	Check how far user is scrolled
			scrolled = parseInt($(window).scrollTop());
			
	});	//	////	End window scroll

//	When user resizes window
	$(window).resize(function() {
	
		//	Update background
			initScreen();
				
	});	//	////	End window resize

////////////////////////////////////////////////////////////////////////////////////////////////////
//	Functions																					  //
////////////////////////////////////////////////////////////////////////////////////////////////////

//	When screen is drawn
	function initScreen() {

		//	Initscreen variables
			wh = $(window).height();
			ww = $(window).width();
			dh = $(document.body).height();
			sd = ww / wh;
		
		
	$('#icon-mail').on('click', function() {
		$('#newspop').toggle();
	});
	
		$('#showmore').on('click', function() {
			if ( showme >=  $('.linkwrapper').length ) {
				showme = 0;
			};
			showme += showoffset;
			//$('.linkwrapper').hide();
			
		if ( showme >=  $('.linkwrapper').length ) {
			$('#showmore').hide();
		};
			geenShowmore();
		});
	};

function geenShowmore() {
	$('.linkwrapper').each( function() {
		if ($(this).attr('data-count') < showme ) {
			$(this).show();
		};
	});
};

function geenScrollert() {
	$('#single-stem').on('click', function() {
		var scrollWhere = $('#stemwrapper').offset().top;
		$('html, body').animate({scrollTop : scrollWhere}, (scrollWhere - scrolled) / 3);
	});
};

$('#menu_main').on('click', function() {
	$('#menu_expanded').toggle();
});

function geenOmenom() {
	$('.linkwrapper:odd').addClass('even');
};

function geenTabs() {
	$('#tabs ul li#algemeen').on('click', handler_tabClick).eq(0).addClass('active');
	$('#faqlist li').on('click', handler_tabClick).eq(0).addClass('active');
};

function handler_tabClick() {
	$('.faqitem').css({height: closeHeight}).find('h6').removeClass('open');
	$(this).addClass('active').siblings().removeClass('active');
	var i = $(this).parent().children('li').index(this);
	$('#tabs ol li').eq(i).siblings().hide('swing', function() {
		$('#tabs ol li').eq(i).show('swing');
	});
};

// Accordeon
function geenAccordeon() {
  $('.accordeonWrapper h6').wrap('<div class="faqitem" />');
  
  $('.accordeonWrapper p').each( function() {
    $(this).appendTo( $(this).prev() );
  });
  
  $('.faqitem').each(function() {
    $(this).attr('orgheight', $(this).height() ).css('height', closeHeight);
  }).on('click', handler_accordeonClick);
  
	//	Hide content on other tabs except the first. Must be done after accordeon to attach that functionality
		$('#tabs ol li').hide().eq(0).show();
};

function handler_accordeonClick() {
  var h = closeHeight;
  if ( $(this).height() == h ) {
    $('.faqitem').not( $(this) ).css({height: h}).find('h6').removeClass('open');
    h = $(this).attr('orgheight');
    $(this).css('height',h).find('h6').addClass('open');
  } else {
    $(this).css('height',h).find('h6').removeClass('open');
  };
};


function geenStemCheck() {
	
	// Set blockvoting globally
	blockVoting = false;
	
	if ($('.stemformulier').length) {	
		
		$('.stemformulier').submit( function(event) {
			
			// Check email and confirm inputs
			var akkoord = $(this).find('input.akkoord');
			$('.error.submit').remove();
			if( !$(akkoord).is(':checked')) {
				var theparent = $(akkoord).parents('.checkbox');
				$('<div class="error submit">U dient eerst akkoord te gaan met de actievoorwaarden</div>').insertBefore(theparent);
			}
			var email = $(this).find('input.email');
			if ( !email.val()) {
				$('<div class="error submit">Vul een emailadres in</div>').insertBefore(email);
			}
			
			if ($('.stemformulier .error').length || blockVoting) {
				event.preventDefault();//$('#signup_form').submit();
			}		
			
		});
		
		// Check email with mailchimp
		$('.stemformulier .email').blur( function(el) {
			
			// Block voting until check is over
			blockVoting = true;
			
			// Remove current errors
			$('.error.email, .error.submit').remove();
			
			// Get email
			var email = $(this).val();
			
			// ID
			var id = $(this).attr('id');
			
			// Check email
			if ( !email) {
				$('<div class="error email">Vul een emailadres in</div>').insertBefore(this);
			} else if ( !isValidEmailAddress(email) ) {
				$('<div class="error email">Vul een correct emailadres in</div>').insertBefore(this);
			} else if ( isValidEmailAddress(email) ) {
				$('.stemformulier .button').val('Uw e-mail wordt gecontroleerd').addClass('buttoncheck');
				$('.stemformulier input.email').addClass('emailTest');
				var url = '/?action=checkEmail&email='+email+'&charity='+id;
				$.ajax({
					type: 'GET',
					url: url,
					dataType: 'text',
					success: function(message) {
						if (message) {
							$('<div class="error email">Dit e-mail adres is al eerder gebruikt om te stemmen</div>').insertBefore('.emailTest');
						}
						$('.stemformulier .button').val('Stem!').removeClass('buttoncheck');
					}
				});
			}
			
			// Re-enable voting
			blockVoting = false;
			
		});
	}	
}



function setCookie(c_name,value,exdays) {
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
}
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};

//	////	End functions


////////////////////////////////////////////////////////////////////////////////////////////////////
//	Click handlers																			  	  //
////////////////////////////////////////////////////////////////////////////////////////////////////



	
//	////	End click handlers


////////////////////////////////////////////////////////////////////////////////////////////////////
//	Features																			  	  //
////////////////////////////////////////////////////////////////////////////////////////////////////

// Adding alpha, omega and middle classes to lists
	function geenAlphaOmega() {
	
		//	Add classes to list items
			$('ul>li:first-child').addClass('middle');
			$('ul>li:last-child').addClass('middle');
			$('ul>li').toggleClass('middle');
			$('ul>li:first-child').addClass('alpha');
			$('ul>li:last-child').addClass('omega');
	};
//	End Alpha and Omega
	
//	Anchor scroller
	function geenScroller() {	
				
		$('#navwrapper li').click(function() { 
			var target = $(this).attr('scrollto');
			var distanceDown = $('#'+target).offset().top;
			$('html, body').stop().animate({
				scrollTop: distanceDown
			}, distanceDown/2, 'swing');
		});
		
		$('.scroll-top').click(function() { 
			var distanceUp = $(this).offset().top;
			$('html, body').stop().animate({
				scrollTop: -distanceUp
			}, distanceUp / 2, 'swing');
		});
		
	};
//	End anchor scroller
	
//	Content accordion
	function geenaccordion() {
	
		$('.accordionwrapper .accordionclicker').each(function() {
			$(this).click(click_accordion).parent().attr( 'orgheight', $(this).parent().outerHeight() ).not('.preopen').addClass('collapsed');
		});
		$('.accordionwrapper li.collapsed').css({
			height: closeHeight
		});
		
		function click_accordion() {
		
			var listitem = $(this).parent();
			var oldH = listitem.attr('orgheight');
			
			if ( listitem.hasClass('collapsed') ) {
				//	Click on collapsed item
					$(this).parent('.accordionwrapper').find('li.expanded').addClass('collapsed').removeClass('expanded').css({
						height: closeHeight
					});
					listitem.addClass('expanded').removeClass('collapsed').css({
						height: oldH
					});
			} else {
				//	Item is not collapsed yet
					listitem.addClass('collapsed').removeClass('expanded').css({
						height: closeHeight
					});
			};
		};
	};
	
// End geenaccordion
	
//	////	End click handlers


////////////////////////////////////////////////////////////////////////////////////////////////////
//	Plug-ins 													  								  //
////////////////////////////////////////////////////////////////////////////////////////////////////



//	format string function
	String.prototype.format=function() {var a=/\{\d+\}/g,b=arguments;return this.replace(a,function(a){return b[a.match(/\d+/)]})}

//	////	End Plug-ins
