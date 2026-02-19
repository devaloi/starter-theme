/**
 * Lazy loading implementation for Starter Theme
 * Uses Intersection Observer for performance-optimized image loading
 */

(function() {
	'use strict';

	// Check if Intersection Observer is supported
	if (!('IntersectionObserver' in window)) {
		// Fallback: load all images immediately for older browsers
		loadAllImages();
		return;
	}

	// Configuration
	const CONFIG = {
		rootMargin: '50px 0px',
		threshold: 0.01,
		placeholderClass: 'lazy-placeholder',
		loadedClass: 'lazy-loaded',
		errorClass: 'lazy-error'
	};

	// Initialize when DOM is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}

	function init() {
		const lazyImages = document.querySelectorAll('img[loading="lazy"]');
		
		if (lazyImages.length === 0) {
			return;
		}

		// Create intersection observer
		const imageObserver = new IntersectionObserver(handleIntersection, CONFIG);

		// Observe all lazy images
		lazyImages.forEach(img => {
			// Skip if already loaded or has no src/data-src
			if (img.complete || (!img.dataset.src && !img.src)) {
				return;
			}

			// Add placeholder class
			img.classList.add(CONFIG.placeholderClass);

			// Create placeholder if image doesn't have src
			if (!img.src && img.dataset.src) {
				img.src = createPlaceholderDataURL(img.width || 300, img.height || 200);
			}

			// Start observing
			imageObserver.observe(img);
		});

		// Handle dynamic content
		observeDynamicContent(imageObserver);
	}

	function handleIntersection(entries, observer) {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				const img = entry.target;
				
				// Stop observing this image
				observer.unobserve(img);
				
				// Load the image
				loadImage(img);
			}
		});
	}

	function loadImage(img) {
		// Create a new image to preload
		const imageLoader = new Image();
		
		imageLoader.onload = function() {
			// Image loaded successfully
			if (img.dataset.src) {
				img.src = img.dataset.src;
				img.removeAttribute('data-src');
			}
			
			if (img.dataset.srcset) {
				img.srcset = img.dataset.srcset;
				img.removeAttribute('data-srcset');
			}
			
			if (img.dataset.sizes) {
				img.sizes = img.dataset.sizes;
				img.removeAttribute('data-sizes');
			}

			// Add loaded class and remove placeholder
			img.classList.add(CONFIG.loadedClass);
			img.classList.remove(CONFIG.placeholderClass);
			
			// Fade in effect
			img.style.opacity = '0';
			img.style.transition = 'opacity 0.3s ease-in-out';
			
			requestAnimationFrame(() => {
				img.style.opacity = '1';
			});

			// Announce to screen readers
			announceImageLoaded(img);
		};

		imageLoader.onerror = function() {
			// Image failed to load
			img.classList.add(CONFIG.errorClass);
			img.classList.remove(CONFIG.placeholderClass);
			
			// Set alt text for broken image
			if (!img.alt) {
				img.alt = 'Image failed to load';
			}
		};

		// Start loading
		imageLoader.src = img.dataset.src || img.src;
	}

	function createPlaceholderDataURL(width, height) {
		// Create a simple SVG placeholder
		const svg = `
			<svg width="${width}" height="${height}" xmlns="http://www.w3.org/2000/svg">
				<rect width="100%" height="100%" fill="#f8fafc"/>
				<text x="50%" y="50%" text-anchor="middle" dy=".3em" fill="#64748b" font-family="system-ui, sans-serif" font-size="14">
					Loading...
				</text>
			</svg>
		`;
		
		return `data:image/svg+xml,${encodeURIComponent(svg)}`;
	}

	function observeDynamicContent(observer) {
		// Watch for new images added to the DOM
		const mutationObserver = new MutationObserver(mutations => {
			mutations.forEach(mutation => {
				mutation.addedNodes.forEach(node => {
					if (node.nodeType === 1) { // Element node
						const lazyImages = node.querySelectorAll ? 
							node.querySelectorAll('img[loading="lazy"]') : 
							(node.matches && node.matches('img[loading="lazy"]') ? [node] : []);

						lazyImages.forEach(img => {
							if (!img.complete && (img.dataset.src || img.src)) {
								img.classList.add(CONFIG.placeholderClass);
								observer.observe(img);
							}
						});
					}
				});
			});
		});

		mutationObserver.observe(document.body, {
			childList: true,
			subtree: true
		});
	}

	function loadAllImages() {
		// Fallback for browsers without Intersection Observer
		const lazyImages = document.querySelectorAll('img[data-src]');
		
		lazyImages.forEach(img => {
			if (img.dataset.src) {
				img.src = img.dataset.src;
				img.removeAttribute('data-src');
			}
			
			if (img.dataset.srcset) {
				img.srcset = img.dataset.srcset;
				img.removeAttribute('data-srcset');
			}
		});
	}

	function announceImageLoaded(img) {
		// Only announce if image has meaningful alt text
		if (img.alt && img.alt.toLowerCase() !== 'image' && img.alt.length > 3) {
			const announcement = document.createElement('div');
			announcement.setAttribute('aria-live', 'polite');
			announcement.setAttribute('aria-atomic', 'true');
			announcement.style.position = 'absolute';
			announcement.style.left = '-10000px';
			announcement.style.width = '1px';
			announcement.style.height = '1px';
			announcement.style.overflow = 'hidden';
			announcement.textContent = `Image loaded: ${img.alt}`;
			
			document.body.appendChild(announcement);
			
			setTimeout(() => {
				if (document.body.contains(announcement)) {
					document.body.removeChild(announcement);
				}
			}, 1000);
		}
	}

	// Expose API for manual triggering
	window.StarterThemeLazyLoad = {
		loadImage: loadImage,
		loadAllImages: loadAllImages
	};

	// Handle visibility change (performance optimization)
	document.addEventListener('visibilitychange', function() {
		if (document.hidden) {
			// Page is now hidden, pause any loading processes
			return;
		}
		
		// Page is now visible, resume loading
		const pendingImages = document.querySelectorAll(`img.${CONFIG.placeholderClass}`);
		if (pendingImages.length > 0) {
			// Trigger a check for visible images
			setTimeout(() => {
				pendingImages.forEach(img => {
					const rect = img.getBoundingClientRect();
					if (rect.top < window.innerHeight && rect.bottom > 0) {
						loadImage(img);
					}
				});
			}, 100);
		}
	});

})();