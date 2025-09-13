/**
 * Indie Film Tracker - Main JavaScript
 * Handles global functionality, theme switching, navigation, and common interactions
 */

// Global variables
let currentTheme = localStorage.getItem('theme') || 'dark';
let watchlist = JSON.parse(localStorage.getItem('watchlist')) || { wantToWatch: [], watched: [] };

// DOM Content Loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeTheme();
    initializeNavigation();
    initializeSearch();
    initializeScrollEffects();
    initializeAnimations();
    initializeNotifications();
});

/**
 * Theme Management
 */
function initializeTheme() {
    const themeToggle = document.getElementById('themeToggle');
    const body = document.body;
    
    // Apply saved theme
    applyTheme(currentTheme);
    
    // Theme toggle event
    if (themeToggle) {
        themeToggle.addEventListener('click', toggleTheme);
    }
}

function toggleTheme() {
    currentTheme = currentTheme === 'dark' ? 'light' : 'dark';
    applyTheme(currentTheme);
    localStorage.setItem('theme', currentTheme);
}

function applyTheme(theme) {
    const body = document.body;
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = themeToggle?.querySelector('i');
    
    body.className = body.className.replace(/dark-theme|light-theme/g, '');
    body.classList.add(theme + '-theme');
    
    if (themeIcon) {
        themeIcon.className = theme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
    }
}

/**
 * Navigation Management
 */
function initializeNavigation() {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const navbarMenu = document.getElementById('navbarMenu');
    const navLinks = document.querySelectorAll('.nav-link');
    
    // Mobile menu toggle
    if (mobileMenuToggle && navbarMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenuToggle.classList.toggle('active');
            navbarMenu.classList.toggle('active');
        });
    }
    
    // Close mobile menu when clicking on links
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (navbarMenu.classList.contains('active')) {
                mobileMenuToggle.classList.remove('active');
                navbarMenu.classList.remove('active');
            }
        });
    });
    
    // Header scroll effect
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.header');
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
}

/**
 * Search Functionality
 */
function initializeSearch() {
    const searchToggle = document.getElementById('searchToggle');
    const searchDropdown = document.getElementById('searchDropdown');
    const globalSearch = document.getElementById('globalSearch');
    const searchResults = document.getElementById('searchResults');
    
    if (!searchToggle || !searchDropdown) return;
    
    // Toggle search dropdown
    searchToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        searchDropdown.classList.toggle('active');
        if (searchDropdown.classList.contains('active')) {
            globalSearch.focus();
        }
    });
    
    // Close search when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchDropdown.contains(e.target) && !searchToggle.contains(e.target)) {
            searchDropdown.classList.remove('active');
        }
    });
    
    // Search functionality
    if (globalSearch) {
        globalSearch.addEventListener('input', function() {
            const query = this.value.trim();
            if (query.length > 2) {
                performGlobalSearch(query);
            } else {
                searchResults.innerHTML = '';
            }
        });
    }
}

function performGlobalSearch(query) {
    const searchResults = document.getElementById('searchResults');
    if (!searchResults || !window.filmsData) return;
    
    const results = window.filmsData.filter(film => 
        film.title.toLowerCase().includes(query.toLowerCase()) ||
        film.director.toLowerCase().includes(query.toLowerCase())
    ).slice(0, 5);
    
    if (results.length === 0) {
        searchResults.innerHTML = '<div class="search-result-item">No films found</div>';
        return;
    }
    
    searchResults.innerHTML = results.map(film => `
        <div class="search-result-item" onclick="goToFilm('${film.id}')">
            <div class="search-result-poster">
                <img src="${film.poster}" alt="${film.title}" style="width: 40px; height: 60px; object-fit: cover; border-radius: 4px;">
            </div>
            <div class="search-result-info">
                <h4>${film.title}</h4>
                <p>${film.director} (${film.year})</p>
            </div>
        </div>
    `).join('');
}

function goToFilm(filmId) {
    window.location.href = `discover.php?film=${filmId}`;
}

/**
 * Scroll Effects
 */
function initializeScrollEffects() {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Fade in animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('.card, .feature-card, .film-card, .festival-card').forEach(el => {
        observer.observe(el);
    });
}

/**
 * Animations
 */
function initializeAnimations() {
    // Add loading states to buttons
    document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('click', function() {
            if (this.type === 'submit' || this.classList.contains('loading-btn')) {
                this.classList.add('loading');
                setTimeout(() => {
                    this.classList.remove('loading');
                }, 2000);
            }
        });
    });
    
    // Hover effects for cards
    document.querySelectorAll('.card, .film-card, .festival-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
}

/**
 * Notification System
 */
function initializeNotifications() {
    // Create notification container if it doesn't exist
    if (!document.getElementById('notificationContainer')) {
        const container = document.createElement('div');
        container.id = 'notificationContainer';
        container.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 10000;
            pointer-events: none;
        `;
        document.body.appendChild(container);
    }
}

function showNotification(message, type = 'info', duration = 3000) {
    const container = document.getElementById('notificationContainer');
    if (!container) return;
    
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${getNotificationIcon(type)}"></i>
            <span>${message}</span>
        </div>
    `;
    
    container.appendChild(notification);
    
    // Show notification
    setTimeout(() => {
        notification.classList.add('show');
    }, 100);
    
    // Hide notification
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, duration);
}

function getNotificationIcon(type) {
    const icons = {
        success: 'check-circle',
        error: 'exclamation-circle',
        warning: 'exclamation-triangle',
        info: 'info-circle'
    };
    return icons[type] || 'info-circle';
}

/**
 * Watchlist Management
 */
function addToWatchlist(filmId) {
    if (!watchlist.wantToWatch.includes(filmId)) {
        watchlist.wantToWatch.push(filmId);
        saveWatchlist();
        showNotification('Added to watchlist', 'success');
        updateWatchlistUI();
    } else {
        showNotification('Already in watchlist', 'info');
    }
}

function removeFromWatchlist(filmId) {
    watchlist.wantToWatch = watchlist.wantToWatch.filter(id => id !== filmId);
    watchlist.watched = watchlist.watched.filter(id => id !== filmId);
    saveWatchlist();
    showNotification('Removed from watchlist', 'info');
    updateWatchlistUI();
}

function markAsWatched(filmId) {
    // Remove from want to watch if present
    watchlist.wantToWatch = watchlist.wantToWatch.filter(id => id !== filmId);
    
    // Add to watched if not already there
    if (!watchlist.watched.includes(filmId)) {
        watchlist.watched.push(filmId);
    }
    
    saveWatchlist();
    showNotification('Marked as watched', 'success');
    updateWatchlistUI();
}

function saveWatchlist() {
    localStorage.setItem('watchlist', JSON.stringify(watchlist));
}

function updateWatchlistUI() {
    // Update watchlist buttons
    document.querySelectorAll('[data-film-id]').forEach(btn => {
        const filmId = parseInt(btn.getAttribute('data-film-id'));
        const icon = btn.querySelector('i');
        
        if (watchlist.wantToWatch.includes(filmId)) {
            icon.className = 'fas fa-bookmark';
            btn.title = 'Remove from watchlist';
        } else {
            icon.className = 'far fa-bookmark';
            btn.title = 'Add to watchlist';
        }
    });
    
    // Update watchlist counts if on watchlist page
    if (document.getElementById('wantToWatchCount')) {
        document.getElementById('wantToWatchCount').textContent = watchlist.wantToWatch.length;
        document.getElementById('watchedCount').textContent = watchlist.watched.length;
    }
}

/**
 * Utility Functions
 */
function debounce(func, wait) {
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

function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}

function formatRuntime(minutes) {
    const hours = Math.floor(minutes / 60);
    const mins = minutes % 60;
    return hours > 0 ? `${hours}h ${mins}m` : `${mins}m`;
}

/**
 * Form Validation
 */
function validateForm(form) {
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('error');
            isValid = false;
        } else {
            field.classList.remove('error');
        }
    });
    
    return isValid;
}

/**
 * Image Loading
 */
function lazyLoadImages() {
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

// Initialize lazy loading when DOM is ready
document.addEventListener('DOMContentLoaded', lazyLoadImages);

/**
 * Export functions for use in other scripts
 */
window.IndieFilmTracker = {
    showNotification,
    addToWatchlist,
    removeFromWatchlist,
    markAsWatched,
    updateWatchlistUI,
    debounce,
    throttle,
    formatDate,
    formatRuntime,
    validateForm
};