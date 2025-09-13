/**
 * Indie Film Tracker - Carousel Component
 * Handles the carousel functionality for screenings and other content
 */

class Carousel {
    constructor(container, options = {}) {
        this.container = container;
        this.carousel = container.querySelector('.carousel');
        this.items = container.querySelectorAll('.carousel-item');
        this.prevBtn = container.querySelector('.carousel-prev');
        this.nextBtn = container.querySelector('.carousel-next');
        
        this.options = {
            autoplay: options.autoplay || true,
            autoplayInterval: options.autoplayInterval || 5000,
            itemsToShow: options.itemsToShow || 3,
            itemsToScroll: options.itemsToScroll || 1,
            infinite: options.infinite || true,
            ...options
        };
        
        this.currentIndex = 0;
        this.isTransitioning = false;
        this.autoplayTimer = null;
        this.touchStartX = 0;
        this.touchEndX = 0;
        
        this.init();
    }
    
    init() {
        if (!this.carousel || this.items.length === 0) return;
        
        this.setupCarousel();
        this.bindEvents();
        this.startAutoplay();
        this.updateCarousel();
    }
    
    setupCarousel() {
        // Set initial transform
        this.carousel.style.transform = 'translateX(0)';
        
        // Calculate item width based on container and items to show
        const containerWidth = this.container.offsetWidth;
        const itemWidth = containerWidth / this.options.itemsToShow;
        
        // Set item widths
        this.items.forEach(item => {
            item.style.flex = `0 0 ${itemWidth}px`;
            item.style.minWidth = `${itemWidth}px`;
        });
        
        // Add touch support
        this.carousel.addEventListener('touchstart', this.handleTouchStart.bind(this), { passive: true });
        this.carousel.addEventListener('touchend', this.handleTouchEnd.bind(this), { passive: true });
    }
    
    bindEvents() {
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => this.previous());
        }
        
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => this.next());
        }
        
        // Pause autoplay on hover
        this.container.addEventListener('mouseenter', () => this.stopAutoplay());
        this.container.addEventListener('mouseleave', () => this.startAutoplay());
        
        // Handle window resize
        window.addEventListener('resize', this.debounce(() => {
            this.setupCarousel();
            this.updateCarousel();
        }, 250));
    }
    
    next() {
        if (this.isTransitioning) return;
        
        this.currentIndex += this.options.itemsToScroll;
        
        if (this.currentIndex >= this.items.length) {
            if (this.options.infinite) {
                this.currentIndex = 0;
            } else {
                this.currentIndex = this.items.length - this.options.itemsToShow;
            }
        }
        
        this.updateCarousel();
    }
    
    previous() {
        if (this.isTransitioning) return;
        
        this.currentIndex -= this.options.itemsToScroll;
        
        if (this.currentIndex < 0) {
            if (this.options.infinite) {
                this.currentIndex = this.items.length - this.options.itemsToShow;
            } else {
                this.currentIndex = 0;
            }
        }
        
        this.updateCarousel();
    }
    
    goToSlide(index) {
        if (this.isTransitioning || index === this.currentIndex) return;
        
        this.currentIndex = Math.max(0, Math.min(index, this.items.length - this.options.itemsToShow));
        this.updateCarousel();
    }
    
    updateCarousel() {
        if (this.isTransitioning) return;
        
        this.isTransitioning = true;
        
        const containerWidth = this.container.offsetWidth;
        const itemWidth = containerWidth / this.options.itemsToShow;
        const translateX = -(this.currentIndex * itemWidth);
        
        this.carousel.style.transition = 'transform 0.5s ease-in-out';
        this.carousel.style.transform = `translateX(${translateX}px)`;
        
        // Update button states
        this.updateButtonStates();
        
        // Reset transition flag after animation
        setTimeout(() => {
            this.isTransitioning = false;
        }, 500);
    }
    
    updateButtonStates() {
        if (!this.options.infinite) {
            if (this.prevBtn) {
                this.prevBtn.disabled = this.currentIndex === 0;
                this.prevBtn.style.opacity = this.currentIndex === 0 ? '0.5' : '1';
            }
            
            if (this.nextBtn) {
                this.nextBtn.disabled = this.currentIndex >= this.items.length - this.options.itemsToShow;
                this.nextBtn.style.opacity = this.currentIndex >= this.items.length - this.options.itemsToShow ? '0.5' : '1';
            }
        }
    }
    
    startAutoplay() {
        if (!this.options.autoplay || this.items.length <= this.options.itemsToShow) return;
        
        this.stopAutoplay();
        this.autoplayTimer = setInterval(() => {
            this.next();
        }, this.options.autoplayInterval);
    }
    
    stopAutoplay() {
        if (this.autoplayTimer) {
            clearInterval(this.autoplayTimer);
            this.autoplayTimer = null;
        }
    }
    
    handleTouchStart(e) {
        this.touchStartX = e.touches[0].clientX;
    }
    
    handleTouchEnd(e) {
        this.touchEndX = e.changedTouches[0].clientX;
        this.handleSwipe();
    }
    
    handleSwipe() {
        const swipeThreshold = 50;
        const diff = this.touchStartX - this.touchEndX;
        
        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                this.next();
            } else {
                this.previous();
            }
        }
    }
    
    destroy() {
        this.stopAutoplay();
        
        if (this.prevBtn) {
            this.prevBtn.removeEventListener('click', this.previous);
        }
        
        if (this.nextBtn) {
            this.nextBtn.removeEventListener('click', this.next);
        }
        
        this.container.removeEventListener('mouseenter', this.stopAutoplay);
        this.container.removeEventListener('mouseleave', this.startAutoplay);
        
        window.removeEventListener('resize', this.setupCarousel);
    }
    
    // Utility function for debouncing
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
}

// Initialize carousels when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Initialize screenings carousel
    const screeningsCarousel = document.getElementById('screeningsCarousel');
    if (screeningsCarousel) {
        const carouselContainer = screeningsCarousel.closest('.carousel-container');
        if (carouselContainer) {
            new Carousel(carouselContainer, {
                autoplay: true,
                autoplayInterval: 4000,
                itemsToShow: 3,
                itemsToScroll: 1,
                infinite: true
            });
        }
    }
    
    // Initialize other carousels if they exist
    document.querySelectorAll('.carousel-container').forEach(container => {
        if (!container.querySelector('.carousel').hasAttribute('data-initialized')) {
            container.querySelector('.carousel').setAttribute('data-initialized', 'true');
            new Carousel(container);
        }
    });
});

// Export Carousel class for use in other scripts
window.Carousel = Carousel;