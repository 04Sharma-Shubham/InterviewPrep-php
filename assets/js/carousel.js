// ===== CAROUSEL FUNCTIONALITY =====

class Carousel {
    constructor(container) {
        this.container = container;
        this.wrapper = container.querySelector('.carousel-wrapper');
        this.slides = container.querySelectorAll('.carousel-slide');
        this.prevBtn = container.querySelector('.carousel-prev');
        this.nextBtn = container.querySelector('.carousel-next');
        this.indicators = container.querySelector('.carousel-indicators');
        
        this.currentSlide = 0;
        this.totalSlides = this.slides.length;
        this.autoPlayInterval = null;
        this.autoPlayDelay = 5000; // 5 seconds
        this.isTransitioning = false;
        
        this.init();
    }
    
    init() {
        if (this.totalSlides === 0) return;
        
        this.createIndicators();
        this.bindEvents();
        this.updateCarousel();
        this.startAutoPlay();
        this.addTouchSupport();
    }
    
    createIndicators() {
        if (!this.indicators) return;
        
        this.indicators.innerHTML = '';
        
        for (let i = 0; i < this.totalSlides; i++) {
            const indicator = document.createElement('button');
            indicator.className = 'carousel-indicator';
            indicator.setAttribute('data-slide', i);
            indicator.setAttribute('aria-label', `Go to slide ${i + 1}`);
            
            if (i === 0) {
                indicator.classList.add('active');
            }
            
            this.indicators.appendChild(indicator);
        }
    }
    
    bindEvents() {
        // Navigation buttons
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => this.prevSlide());
        }
        
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => this.nextSlide());
        }
        
        // Indicators
        if (this.indicators) {
            this.indicators.addEventListener('click', (e) => {
                if (e.target.classList.contains('carousel-indicator')) {
                    const slideIndex = parseInt(e.target.getAttribute('data-slide'));
                    this.goToSlide(slideIndex);
                }
            });
        }
        
        // Keyboard navigation
        this.container.addEventListener('keydown', (e) => {
            switch (e.key) {
                case 'ArrowLeft':
                    e.preventDefault();
                    this.prevSlide();
                    break;
                case 'ArrowRight':
                    e.preventDefault();
                    this.nextSlide();
                    break;
            }
        });
        
        // Pause on hover
        this.container.addEventListener('mouseenter', () => this.stopAutoPlay());
        this.container.addEventListener('mouseleave', () => this.startAutoPlay());
        
        // Pause on focus
        this.container.addEventListener('focusin', () => this.stopAutoPlay());
        this.container.addEventListener('focusout', () => this.startAutoPlay());
        
        // Handle visibility change (pause when tab is not active)
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                this.stopAutoPlay();
            } else {
                this.startAutoPlay();
            }
        });
    }
    
    addTouchSupport() {
        let startX = 0;
        let endX = 0;
        let startY = 0;
        let endY = 0;
        
        this.container.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            startY = e.touches[0].clientY;
        }, { passive: true });
        
        this.container.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            endY = e.changedTouches[0].clientY;
            
            const deltaX = startX - endX;
            const deltaY = startY - endY;
            
            // Only handle horizontal swipes (ignore vertical scrolling)
            if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > 50) {
                if (deltaX > 0) {
                    this.nextSlide();
                } else {
                    this.prevSlide();
                }
            }
        }, { passive: true });
    }
    
    updateCarousel() {
        if (this.isTransitioning) return;
        
        this.isTransitioning = true;
        
        // Update wrapper position
        const translateX = -this.currentSlide * 100;
        this.wrapper.style.transform = `translateX(${translateX}%)`;
        
        // Update indicators
        if (this.indicators) {
            const indicators = this.indicators.querySelectorAll('.carousel-indicator');
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === this.currentSlide);
            });
        }
        
        // Update slide attributes for accessibility
        this.slides.forEach((slide, index) => {
            slide.setAttribute('aria-hidden', index !== this.currentSlide);
        });
        
        // Reset transition flag after animation
        setTimeout(() => {
            this.isTransitioning = false;
        }, 500);
        
        // Trigger custom event
        this.container.dispatchEvent(new CustomEvent('slideChange', {
            detail: {
                currentSlide: this.currentSlide,
                totalSlides: this.totalSlides
            }
        }));
    }
    
    nextSlide() {
        if (this.isTransitioning) return;
        
        this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
        this.updateCarousel();
    }
    
    prevSlide() {
        if (this.isTransitioning) return;
        
        this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        this.updateCarousel();
    }
    
    goToSlide(index) {
        if (this.isTransitioning || index === this.currentSlide) return;
        
        if (index >= 0 && index < this.totalSlides) {
            this.currentSlide = index;
            this.updateCarousel();
        }
    }
    
    startAutoPlay() {
        this.stopAutoPlay();
        
        if (this.totalSlides > 1) {
            this.autoPlayInterval = setInterval(() => {
                this.nextSlide();
            }, this.autoPlayDelay);
        }
    }
    
    stopAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
    }
    
    destroy() {
        this.stopAutoPlay();
        // Remove event listeners and clean up
        this.container.removeEventListener('keydown', this.handleKeydown);
        this.container.removeEventListener('mouseenter', this.stopAutoPlay);
        this.container.removeEventListener('mouseleave', this.startAutoPlay);
    }
}

// ===== CAROUSEL INITIALIZATION =====
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all carousels on the page
    const carouselContainers = document.querySelectorAll('.carousel-container');
    const carousels = [];
    
    carouselContainers.forEach(container => {
        const carousel = new Carousel(container);
        carousels.push(carousel);
    });
    
    // Store carousel instances globally for potential external access
    window.carousels = carousels;
    
    // Create technology carousel data if container exists but no slides
    const techCarousel = document.querySelector('#tech-carousel');
    if (techCarousel && !techCarousel.querySelector('.carousel-slide')) {
        createTechnologyCarousel(techCarousel);
    }
});

// ===== TECHNOLOGY CAROUSEL CREATION =====
function createTechnologyCarousel(container) {
    const technologies = [
        {
            name: 'Java',
            description: 'Master object-oriented programming and enterprise development',
            icon: '☕',
            color: '#f89820'
        },
        {
            name: 'Python',
            description: 'Learn versatile programming for web, data science, and AI',
            icon: '🐍',
            color: '#3776ab'
        },
        {
            name: 'JavaScript',
            description: 'Build dynamic web applications and modern user interfaces',
            icon: '⚡',
            color: '#f7df1e'
        },
        {
            name: 'C++',
            description: 'Develop high-performance applications and system programming',
            icon: '⚙️',
            color: '#00599c'
        },
        {
            name: 'SQL',
            description: 'Master database management and data manipulation',
            icon: '🗄️',
            color: '#336791'
        },
        {
            name: 'DSA',
            description: 'Algorithms and data structures for technical interviews',
            icon: '🧮',
            color: '#ff6b6b'
        }
    ];
    
    // Create carousel structure
    const carouselHTML = `
        <div class="carousel-wrapper">
            ${technologies.map(tech => `
                <div class="carousel-slide">
                    <div class="tech-slide" style="background: linear-gradient(135deg, ${tech.color}20, ${tech.color}40);">
                        <div class="tech-icon" style="color: ${tech.color};">${tech.icon}</div>
                        <div class="carousel-overlay">
                            <h3>${tech.name}</h3>
                            <p>${tech.description}</p>
                        </div>
                    </div>
                </div>
            `).join('')}
        </div>
        <button class="carousel-controls carousel-prev" aria-label="Previous slide">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="carousel-controls carousel-next" aria-label="Next slide">
            <i class="fas fa-chevron-right"></i>
        </button>
        <div class="carousel-indicators"></div>
    `;
    
    container.innerHTML = carouselHTML;
    
    // Add specific styles for technology slides
    const style = document.createElement('style');
    style.textContent = `
        .tech-slide {
            height: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            border-radius: var(--radius-xl);
            overflow: hidden;
        }
        
        .tech-icon {
            font-size: 4rem;
            margin-bottom: 2rem;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .carousel-overlay {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border-radius: var(--radius-lg);
            padding: 2rem;
            text-align: center;
            max-width: 80%;
        }
        
        .carousel-overlay h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }
        
        .carousel-overlay p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
        }
        
        @media (max-width: 768px) {
            .tech-slide {
                height: 300px;
            }
            
            .tech-icon {
                font-size: 3rem;
                margin-bottom: 1.5rem;
            }
            
            .carousel-overlay {
                padding: 1.5rem;
            }
            
            .carousel-overlay h3 {
                font-size: 1.5rem;
            }
            
            .carousel-overlay p {
                font-size: 1rem;
            }
        }
    `;
    
    document.head.appendChild(style);
    
    // Initialize the carousel
    new Carousel(container);
}

// ===== CAROUSEL UTILITIES =====

// Function to programmatically control carousel
function controlCarousel(carouselIndex, action, value) {
    if (window.carousels && window.carousels[carouselIndex]) {
        const carousel = window.carousels[carouselIndex];
        
        switch (action) {
            case 'next':
                carousel.nextSlide();
                break;
            case 'prev':
                carousel.prevSlide();
                break;
            case 'goto':
                carousel.goToSlide(value);
                break;
            case 'play':
                carousel.startAutoPlay();
                break;
            case 'pause':
                carousel.stopAutoPlay();
                break;
        }
    }
}

// Function to get carousel state
function getCarouselState(carouselIndex) {
    if (window.carousels && window.carousels[carouselIndex]) {
        const carousel = window.carousels[carouselIndex];
        return {
            currentSlide: carousel.currentSlide,
            totalSlides: carousel.totalSlides,
            isAutoPlaying: carousel.autoPlayInterval !== null
        };
    }
    return null;
}

// Export functions for external use
window.controlCarousel = controlCarousel;
window.getCarouselState = getCarouselState;
