/**
 * Navigation JavaScript for Starter Theme
 * Mobile menu toggle, keyboard navigation, and accessibility features
 */

(function() {
	'use strict';

	// Wait for DOM to be ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initNavigation);
	} else {
		initNavigation();
	}

	function initNavigation() {
		// Initialize mobile menu
		initMobileMenu();
		
		// Initialize keyboard navigation
		initKeyboardNavigation();
		
		// Initialize submenu toggles
		initSubmenuToggles();
		
		// Initialize accessibility features
		initAccessibility();
	}

	/**
	 * Mobile menu functionality
	 */
	function initMobileMenu() {
		const openButtons = document.querySelectorAll('.wp-block-navigation__responsive-container-open');
		const closeButtons = document.querySelectorAll('.wp-block-navigation__responsive-container-close');
		const containers = document.querySelectorAll('.wp-block-navigation__responsive-container');

		// Open mobile menu
		openButtons.forEach(button => {
			button.addEventListener('click', function(e) {
				e.preventDefault();
				const navigation = this.closest('.wp-block-navigation');
				const container = navigation.querySelector('.wp-block-navigation__responsive-container');
				
				openMobileMenu(container);
			});
		});

		// Close mobile menu
		closeButtons.forEach(button => {
			button.addEventListener('click', function(e) {
				e.preventDefault();
				const container = this.closest('.wp-block-navigation__responsive-container');
				
				closeMobileMenu(container);
			});
		});

		// Close menu on escape key
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape') {
				const openMenus = document.querySelectorAll('.wp-block-navigation__responsive-container.is-menu-open');
				openMenus.forEach(menu => closeMobileMenu(menu));
			}
		});

		// Close menu on outside click
		document.addEventListener('click', function(e) {
			if (!e.target.closest('.wp-block-navigation')) {
				const openMenus = document.querySelectorAll('.wp-block-navigation__responsive-container.is-menu-open');
				openMenus.forEach(menu => closeMobileMenu(menu));
			}
		});
	}

	/**
	 * Open mobile menu
	 */
	function openMobileMenu(container) {
		container.classList.add('is-menu-open');
		container.setAttribute('aria-hidden', 'false');
		
		// Prevent body scroll
		document.body.style.overflow = 'hidden';
		
		// Focus first menu item
		const firstLink = container.querySelector('.wp-block-navigation-item a');
		if (firstLink) {
			firstLink.focus();
		}
		
		// Trap focus within menu
		trapFocus(container);
		
		// Announce to screen readers
		announceToScreenReader('Navigation menu opened');
	}

	/**
	 * Close mobile menu
	 */
	function closeMobileMenu(container) {
		container.classList.remove('is-menu-open');
		container.setAttribute('aria-hidden', 'true');
		
		// Restore body scroll
		document.body.style.overflow = '';
		
		// Return focus to menu button
		const navigation = container.closest('.wp-block-navigation');
		const openButton = navigation.querySelector('.wp-block-navigation__responsive-container-open');
		if (openButton) {
			openButton.focus();
		}
		
		// Remove focus trap
		removeFocusTrap();
		
		// Announce to screen readers
		announceToScreenReader('Navigation menu closed');
	}

	/**
	 * Keyboard navigation for dropdowns
	 */
	function initKeyboardNavigation() {
		const menuItems = document.querySelectorAll('.wp-block-navigation-item');

		menuItems.forEach(item => {
			const link = item.querySelector('a');
			const submenu = item.querySelector('.wp-block-navigation__submenu-container');

			if (link && submenu) {
				// Handle keyboard events
				link.addEventListener('keydown', function(e) {
					switch (e.key) {
						case 'ArrowDown':
							e.preventDefault();
							openSubmenu(item);
							focusFirstSubmenuItem(submenu);
							break;
						case 'Escape':
							e.preventDefault();
							closeSubmenu(item);
							link.focus();
							break;
					}
				});

				// Handle submenu keyboard navigation
				const submenuItems = submenu.querySelectorAll('.wp-block-navigation-item a');
				submenuItems.forEach((submenuLink, index) => {
					submenuLink.addEventListener('keydown', function(e) {
						switch (e.key) {
							case 'ArrowDown':
								e.preventDefault();
								const nextIndex = (index + 1) % submenuItems.length;
								submenuItems[nextIndex].focus();
								break;
							case 'ArrowUp':
								e.preventDefault();
								const prevIndex = (index - 1 + submenuItems.length) % submenuItems.length;
								submenuItems[prevIndex].focus();
								break;
							case 'Escape':
								e.preventDefault();
								closeSubmenu(item);
								link.focus();
								break;
						}
					});
				});
			}
		});
	}

	/**
	 * Submenu toggle functionality
	 */
	function initSubmenuToggles() {
		const itemsWithSubmenus = document.querySelectorAll('.wp-block-navigation-item:has(.wp-block-navigation__submenu-container)');

		itemsWithSubmenus.forEach(item => {
			const link = item.querySelector('a');
			const submenu = item.querySelector('.wp-block-navigation__submenu-container');

			// Add ARIA attributes
			link.setAttribute('aria-haspopup', 'true');
			link.setAttribute('aria-expanded', 'false');
			submenu.setAttribute('aria-hidden', 'true');

			// Mouse events
			item.addEventListener('mouseenter', () => openSubmenu(item));
			item.addEventListener('mouseleave', () => closeSubmenu(item));

			// Touch events for mobile
			link.addEventListener('touchstart', function(e) {
				const isExpanded = this.getAttribute('aria-expanded') === 'true';
				if (!isExpanded) {
					e.preventDefault();
					openSubmenu(item);
				}
			});
		});
	}

	/**
	 * Open submenu
	 */
	function openSubmenu(item) {
		const link = item.querySelector('a');
		const submenu = item.querySelector('.wp-block-navigation__submenu-container');

		if (link && submenu) {
			link.setAttribute('aria-expanded', 'true');
			submenu.setAttribute('aria-hidden', 'false');
			item.classList.add('is-submenu-open');
		}
	}

	/**
	 * Close submenu
	 */
	function closeSubmenu(item) {
		const link = item.querySelector('a');
		const submenu = item.querySelector('.wp-block-navigation__submenu-container');

		if (link && submenu) {
			link.setAttribute('aria-expanded', 'false');
			submenu.setAttribute('aria-hidden', 'true');
			item.classList.remove('is-submenu-open');
		}
	}

	/**
	 * Focus first submenu item
	 */
	function focusFirstSubmenuItem(submenu) {
		const firstItem = submenu.querySelector('.wp-block-navigation-item a');
		if (firstItem) {
			firstItem.focus();
		}
	}

	/**
	 * Initialize accessibility features
	 */
	function initAccessibility() {
		// Add screen reader text to menu toggles
		const openButtons = document.querySelectorAll('.wp-block-navigation__responsive-container-open');
		const closeButtons = document.querySelectorAll('.wp-block-navigation__responsive-container-close');

		openButtons.forEach(button => {
			if (!button.querySelector('.screen-reader-text')) {
				const span = document.createElement('span');
				span.className = 'screen-reader-text';
				span.textContent = 'Open navigation menu';
				button.appendChild(span);
			}
		});

		closeButtons.forEach(button => {
			if (!button.querySelector('.screen-reader-text')) {
				const span = document.createElement('span');
				span.className = 'screen-reader-text';
				span.textContent = 'Close navigation menu';
				button.appendChild(span);
			}
		});

		// Add landmark roles
		const navigations = document.querySelectorAll('.wp-block-navigation');
		navigations.forEach((nav, index) => {
			if (!nav.getAttribute('role')) {
				nav.setAttribute('role', 'navigation');
			}
			if (!nav.getAttribute('aria-label')) {
				nav.setAttribute('aria-label', index === 0 ? 'Primary navigation' : `Navigation ${index + 1}`);
			}
		});
	}

	/**
	 * Focus trap for mobile menu
	 */
	let focusTrapElements = [];
	let firstFocusableElement = null;
	let lastFocusableElement = null;

	function trapFocus(container) {
		focusTrapElements = container.querySelectorAll(
			'a[href], button, textarea, input[type="text"], input[type="radio"], input[type="checkbox"], select'
		);
		
		firstFocusableElement = focusTrapElements[0];
		lastFocusableElement = focusTrapElements[focusTrapElements.length - 1];

		document.addEventListener('keydown', handleFocusTrap);
	}

	function handleFocusTrap(e) {
		if (e.key !== 'Tab') return;

		if (e.shiftKey) {
			// Shift + Tab
			if (document.activeElement === firstFocusableElement) {
				lastFocusableElement.focus();
				e.preventDefault();
			}
		} else {
			// Tab
			if (document.activeElement === lastFocusableElement) {
				firstFocusableElement.focus();
				e.preventDefault();
			}
		}
	}

	function removeFocusTrap() {
		document.removeEventListener('keydown', handleFocusTrap);
		focusTrapElements = [];
	}

	/**
	 * Announce to screen readers
	 */
	function announceToScreenReader(message) {
		const announcement = document.createElement('div');
		announcement.setAttribute('aria-live', 'polite');
		announcement.setAttribute('aria-atomic', 'true');
		announcement.classList.add('screen-reader-text');
		announcement.textContent = message;
		
		document.body.appendChild(announcement);
		
		// Remove after announcement
		setTimeout(() => {
			document.body.removeChild(announcement);
		}, 1000);
	}

	/**
	 * Handle resize events
	 */
	window.addEventListener('resize', function() {
		// Close mobile menus when resizing to desktop
		if (window.innerWidth >= 783) {
			const openMenus = document.querySelectorAll('.wp-block-navigation__responsive-container.is-menu-open');
			openMenus.forEach(menu => {
				menu.classList.remove('is-menu-open');
				menu.setAttribute('aria-hidden', 'true');
			});
			
			// Restore body scroll
			document.body.style.overflow = '';
			removeFocusTrap();
		}
	});

})();