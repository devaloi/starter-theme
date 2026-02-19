/**
 * Customizer live preview JavaScript for Starter Theme
 */

(function($) {
	'use strict';

	// Brand colors
	wp.customize('starter_theme_primary_color', function(value) {
		value.bind(function(newval) {
			updateCSSProperty('--wp--preset--color--primary', newval);
		});
	});

	wp.customize('starter_theme_secondary_color', function(value) {
		value.bind(function(newval) {
			updateCSSProperty('--wp--preset--color--secondary', newval);
		});
	});

	wp.customize('starter_theme_accent_color', function(value) {
		value.bind(function(newval) {
			updateCSSProperty('--wp--preset--color--accent', newval);
		});
	});

	// Typography
	wp.customize('starter_theme_heading_font', function(value) {
		value.bind(function(newval) {
			$('h1, h2, h3, h4, h5, h6').css('font-family', 'var(--wp--preset--font-family--' + newval + ')');
		});
	});

	wp.customize('starter_theme_body_font', function(value) {
		value.bind(function(newval) {
			$('body').css('font-family', 'var(--wp--preset--font-family--' + newval + ')');
		});
	});

	wp.customize('starter_theme_base_font_size', function(value) {
		value.bind(function(newval) {
			$('body').css('font-size', newval + 'px');
		});
	});

	// Header options
	wp.customize('starter_theme_sticky_header', function(value) {
		value.bind(function(newval) {
			var $header = $('.wp-site-blocks > header');
			if (newval) {
				$header.css({
					'position': 'sticky',
					'top': '0',
					'z-index': '999'
				});
			} else {
				$header.css({
					'position': '',
					'top': '',
					'z-index': ''
				});
			}
		});
	});

	wp.customize('starter_theme_logo_width', function(value) {
		value.bind(function(newval) {
			$('.custom-logo').css('max-width', newval + 'px');
		});
	});

	// Footer
	wp.customize('starter_theme_copyright_text', function(value) {
		value.bind(function(newval) {
			$('.wp-block-site-title, .copyright-text').text(newval);
		});
	});

	// Layout
	wp.customize('starter_theme_content_width', function(value) {
		value.bind(function(newval) {
			updateCSSProperty('--wp--custom--layout--content-size', newval + 'px');
		});
	});

	/**
	 * Update CSS custom property
	 */
	function updateCSSProperty(property, value) {
		var customCSS = getOrCreateStyleElement();
		var currentCSS = customCSS.textContent;
		
		// Remove existing property if it exists
		var regex = new RegExp(property + '\\s*:\\s*[^;]+;?', 'g');
		currentCSS = currentCSS.replace(regex, '');
		
		// Add new property
		if (currentCSS.includes(':root')) {
			currentCSS = currentCSS.replace(
				':root {',
				':root { ' + property + ': ' + value + '; '
			);
		} else {
			currentCSS = ':root { ' + property + ': ' + value + '; } ' + currentCSS;
		}
		
		customCSS.textContent = currentCSS;
	}

	/**
	 * Get or create style element for live preview
	 */
	function getOrCreateStyleElement() {
		var customCSS = document.getElementById('starter-theme-customizer-live');
		
		if (!customCSS) {
			customCSS = document.createElement('style');
			customCSS.type = 'text/css';
			customCSS.id = 'starter-theme-customizer-live';
			document.head.appendChild(customCSS);
		}
		
		return customCSS;
	}

	/**
	 * Announce changes to screen readers
	 */
	function announceChange(message) {
		var announcement = document.createElement('div');
		announcement.setAttribute('aria-live', 'polite');
		announcement.setAttribute('aria-atomic', 'true');
		announcement.style.position = 'absolute';
		announcement.style.left = '-10000px';
		announcement.style.width = '1px';
		announcement.style.height = '1px';
		announcement.style.overflow = 'hidden';
		announcement.textContent = message;
		
		document.body.appendChild(announcement);
		
		setTimeout(function() {
			document.body.removeChild(announcement);
		}, 1000);
	}

})(jQuery);