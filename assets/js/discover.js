/**
 * Indie Film Tracker - Discover Page JavaScript
 * Handles film filtering, sorting, and interactions on the discover page
 */

class FilmDiscover {
    constructor() {
        this.films = window.filmsData || [];
        this.filteredFilms = window.filteredFilms || [];
        this.currentFilters = {
            genre: '',
            year: '',
            country: '',
            search: ''
        };
        this.currentSort = 'title';
        
        this.init();
    }
    
    init() {
        this.bindEvents();
        this.updateFilmCount();
        this.updateWatchlistButtons();
    }
    
    bindEvents() {
        // Filter events
        const genreFilter = document.getElementById('genreFilter');
        const yearFilter = document.getElementById('yearFilter');
        const countryFilter = document.getElementById('countryFilter');
        const searchFilter = document.getElementById('searchFilter');
        const resetFilters = document.getElementById('resetFilters');
        const sortSelect = document.getElementById('sortSelect');
        
        if (genreFilter) {
            genreFilter.addEventListener('change', (e) => {
                this.currentFilters.genre = e.target.value;
                this.applyFilters();
            });
        }
        
        if (yearFilter) {
            yearFilter.addEventListener('change', (e) => {
                this.currentFilters.year = e.target.value;
                this.applyFilters();
            });
        }
        
        if (countryFilter) {
            countryFilter.addEventListener('change', (e) => {
                this.currentFilters.country = e.target.value;
                this.applyFilters();
            });
        }
        
        if (searchFilter) {
            searchFilter.addEventListener('input', this.debounce((e) => {
                this.currentFilters.search = e.target.value;
                this.applyFilters();
            }, 300));
        }
        
        if (resetFilters) {
            resetFilters.addEventListener('click', () => this.resetFilters());
        }
        
        if (sortSelect) {
            sortSelect.addEventListener('change', (e) => {
                this.currentSort = e.target.value;
                this.sortFilms();
            });
        }
        
        // Watchlist events
        document.addEventListener('click', (e) => {
            if (e.target.closest('.action-btn')) {
                const btn = e.target.closest('.action-btn');
                const filmCard = btn.closest('.film-card');
                const filmId = parseInt(filmCard.dataset.filmId);
                
                if (btn.title.includes('Add to')) {
                    this.addToWatchlist(filmId);
                } else if (btn.title.includes('Remove')) {
                    this.removeFromWatchlist(filmId);
                }
            }
        });
    }
    
    applyFilters() {
        this.filteredFilms = this.films.filter(film => {
            // Genre filter
            if (this.currentFilters.genre && film.genre !== this.currentFilters.genre) {
                return false;
            }
            
            // Year filter
            if (this.currentFilters.year && film.year != this.currentFilters.year) {
                return false;
            }
            
            // Country filter
            if (this.currentFilters.country && film.country !== this.currentFilters.country) {
                return false;
            }
            
            // Search filter
            if (this.currentFilters.search) {
                const searchTerm = this.currentFilters.search.toLowerCase();
                const titleMatch = film.title.toLowerCase().includes(searchTerm);
                const directorMatch = film.director.toLowerCase().includes(searchTerm);
                const descriptionMatch = film.description.toLowerCase().includes(searchTerm);
                
                if (!titleMatch && !directorMatch && !descriptionMatch) {
                    return false;
                }
            }
            
            return true;
        });
        
        this.sortFilms();
        this.renderFilms();
        this.updateFilmCount();
        this.updateURL();
    }
    
    sortFilms() {
        this.filteredFilms.sort((a, b) => {
            switch (this.currentSort) {
                case 'title':
                    return a.title.localeCompare(b.title);
                case 'title-desc':
                    return b.title.localeCompare(a.title);
                case 'year':
                    return b.year - a.year;
                case 'year-desc':
                    return a.year - b.year;
                case 'rating':
                    return b.rating - a.rating;
                case 'rating-desc':
                    return a.rating - b.rating;
                default:
                    return 0;
            }
        });
    }
    
    renderFilms() {
        const filmsGrid = document.getElementById('filmsGrid');
        if (!filmsGrid) return;
        
        if (this.filteredFilms.length === 0) {
            filmsGrid.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-film"></i>
                    <h3>No films found</h3>
                    <p>Try adjusting your filters or search terms to find more films.</p>
                    <button class="btn btn-primary" onclick="filmDiscover.resetFilters()">Reset Filters</button>
                </div>
            `;
            return;
        }
        
        filmsGrid.innerHTML = this.filteredFilms.map(film => this.createFilmCard(film)).join('');
        this.updateWatchlistButtons();
    }
    
    createFilmCard(film) {
        const isInWatchlist = window.watchlist?.wantToWatch?.includes(film.id) || false;
        const watchlistIcon = isInWatchlist ? 'fas fa-bookmark' : 'far fa-bookmark';
        const watchlistTitle = isInWatchlist ? 'Remove from watchlist' : 'Add to watchlist';
        
        return `
            <div class="film-card" data-film-id="${film.id}">
                <div class="film-poster-container">
                    <img src="${film.poster}" alt="${film.title}" class="film-poster" loading="lazy">
                    <div class="film-actions">
                        <button class="action-btn" onclick="filmDiscover.toggleWatchlist(${film.id})" title="${watchlistTitle}">
                            <i class="${watchlistIcon}"></i>
                        </button>
                        <button class="action-btn" onclick="filmDiscover.showFilmDetails(${film.id})" title="View Details">
                            <i class="fas fa-info-circle"></i>
                        </button>
                    </div>
                </div>
                <div class="film-info">
                    <h3 class="film-title">${film.title}</h3>
                    <p class="film-director">${film.director}</p>
                    <div class="film-meta">
                        <span class="film-year">${film.year}</span>
                        <span class="film-runtime">${film.runtime}</span>
                    </div>
                    <div class="film-rating">
                        <i class="fas fa-star"></i>
                        <span>${film.rating}</span>
                    </div>
                    <div class="film-genre">
                        <span class="genre-tag">${film.genre}</span>
                    </div>
                </div>
            </div>
        `;
    }
    
    toggleWatchlist(filmId) {
        const isInWatchlist = window.watchlist?.wantToWatch?.includes(filmId) || false;
        
        if (isInWatchlist) {
            this.removeFromWatchlist(filmId);
        } else {
            this.addToWatchlist(filmId);
        }
    }
    
    addToWatchlist(filmId) {
        if (!window.watchlist) {
            window.watchlist = { wantToWatch: [], watched: [] };
        }
        
        if (!window.watchlist.wantToWatch.includes(filmId)) {
            window.watchlist.wantToWatch.push(filmId);
            window.IndieFilmTracker.saveWatchlist();
            window.IndieFilmTracker.showNotification('Added to watchlist', 'success');
            this.updateWatchlistButtons();
        }
    }
    
    removeFromWatchlist(filmId) {
        if (window.watchlist) {
            window.watchlist.wantToWatch = window.watchlist.wantToWatch.filter(id => id !== filmId);
            window.watchlist.watched = window.watchlist.watched.filter(id => id !== filmId);
            window.IndieFilmTracker.saveWatchlist();
            window.IndieFilmTracker.showNotification('Removed from watchlist', 'info');
            this.updateWatchlistButtons();
        }
    }
    
    updateWatchlistButtons() {
        document.querySelectorAll('.film-card').forEach(card => {
            const filmId = parseInt(card.dataset.filmId);
            const watchlistBtn = card.querySelector('.action-btn');
            const icon = watchlistBtn.querySelector('i');
            
            if (window.watchlist?.wantToWatch?.includes(filmId)) {
                icon.className = 'fas fa-bookmark';
                watchlistBtn.title = 'Remove from watchlist';
            } else {
                icon.className = 'far fa-bookmark';
                watchlistBtn.title = 'Add to watchlist';
            }
        });
    }
    
    showFilmDetails(filmId) {
        const film = this.films.find(f => f.id === filmId);
        if (!film) return;
        
        const modal = document.getElementById('filmModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.getElementById('modalBody');
        
        if (!modal || !modalTitle || !modalBody) return;
        
        modalTitle.textContent = film.title;
        modalBody.innerHTML = `
            <div class="film-details">
                <div class="film-details-poster">
                    <img src="${film.poster}" alt="${film.title}" class="details-poster">
                </div>
                <div class="film-details-info">
                    <h4>${film.title}</h4>
                    <p class="director"><strong>Director:</strong> ${film.director}</p>
                    <p class="year"><strong>Year:</strong> ${film.year}</p>
                    <p class="runtime"><strong>Runtime:</strong> ${film.runtime}</p>
                    <p class="genre"><strong>Genre:</strong> ${film.genre}</p>
                    <p class="country"><strong>Country:</strong> ${film.country}</p>
                    <div class="rating">
                        <strong>Rating:</strong>
                        <div class="stars">
                            ${this.generateStars(film.rating)}
                        </div>
                        <span class="rating-number">${film.rating}/5</span>
                    </div>
                    <p class="description">${film.description}</p>
                    <div class="film-actions">
                        <button class="btn btn-primary" onclick="filmDiscover.toggleWatchlist(${film.id})">
                            <i class="fas fa-bookmark"></i>
                            ${window.watchlist?.wantToWatch?.includes(film.id) ? 'Remove from Watchlist' : 'Add to Watchlist'}
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    generateStars(rating) {
        const fullStars = Math.floor(rating);
        const hasHalfStar = rating % 1 !== 0;
        let stars = '';
        
        for (let i = 0; i < fullStars; i++) {
            stars += '<i class="fas fa-star"></i>';
        }
        
        if (hasHalfStar) {
            stars += '<i class="fas fa-star-half-alt"></i>';
        }
        
        const emptyStars = 5 - Math.ceil(rating);
        for (let i = 0; i < emptyStars; i++) {
            stars += '<i class="far fa-star"></i>';
        }
        
        return stars;
    }
    
    closeFilmModal() {
        const modal = document.getElementById('filmModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }
    
    resetFilters() {
        this.currentFilters = {
            genre: '',
            year: '',
            country: '',
            search: ''
        };
        
        // Reset form elements
        const genreFilter = document.getElementById('genreFilter');
        const yearFilter = document.getElementById('yearFilter');
        const countryFilter = document.getElementById('countryFilter');
        const searchFilter = document.getElementById('searchFilter');
        
        if (genreFilter) genreFilter.value = '';
        if (yearFilter) yearFilter.value = '';
        if (countryFilter) countryFilter.value = '';
        if (searchFilter) searchFilter.value = '';
        
        this.applyFilters();
    }
    
    updateFilmCount() {
        const countElement = document.getElementById('filmsCount');
        if (countElement) {
            countElement.textContent = this.filteredFilms.length;
        }
    }
    
    updateURL() {
        const params = new URLSearchParams();
        
        if (this.currentFilters.genre) params.set('genre', this.currentFilters.genre);
        if (this.currentFilters.year) params.set('year', this.currentFilters.year);
        if (this.currentFilters.country) params.set('country', this.currentFilters.country);
        if (this.currentFilters.search) params.set('search', this.currentFilters.search);
        if (this.currentSort !== 'title') params.set('sort', this.currentSort);
        
        const newURL = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
        window.history.replaceState({}, '', newURL);
    }
    
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

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    window.filmDiscover = new FilmDiscover();
    
    // Close modal when clicking outside
    const modal = document.getElementById('filmModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                window.filmDiscover.closeFilmModal();
            }
        });
    }
    
    // Close modal with escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && modal.style.display === 'flex') {
            window.filmDiscover.closeFilmModal();
        }
    });
});

// Global functions for onclick handlers
function toggleWatchlist(filmId) {
    if (window.filmDiscover) {
        window.filmDiscover.toggleWatchlist(filmId);
    }
}

function showFilmDetails(filmId) {
    if (window.filmDiscover) {
        window.filmDiscover.showFilmDetails(filmId);
    }
}

function closeFilmModal() {
    if (window.filmDiscover) {
        window.filmDiscover.closeFilmModal();
    }
}

function resetFilters() {
    if (window.filmDiscover) {
        window.filmDiscover.resetFilters();
    }
}