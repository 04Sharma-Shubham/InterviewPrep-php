/**
 * Indie Film Tracker - Watchlist Page JavaScript
 * Handles watchlist management, tabs, and film interactions
 */

class WatchlistManager {
    constructor() {
        this.films = window.filmsData || [];
        this.watchlist = JSON.parse(localStorage.getItem('watchlist')) || { wantToWatch: [], watched: [] };
        this.currentTab = 'want-to-watch';
        
        this.init();
    }
    
    init() {
        this.bindEvents();
        this.renderWatchlist();
        this.updateStatistics();
    }
    
    bindEvents() {
        // Tab switching
        const tabButtons = document.querySelectorAll('.tab-btn');
        tabButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const tab = e.currentTarget.dataset.tab;
                this.switchTab(tab);
            });
        });
        
        // Clear buttons
        const clearWantToWatch = document.getElementById('clearWantToWatch');
        const clearWatched = document.getElementById('clearWatched');
        
        if (clearWantToWatch) {
            clearWantToWatch.addEventListener('click', () => {
                this.clearWatchlist('wantToWatch');
            });
        }
        
        if (clearWatched) {
            clearWatched.addEventListener('click', () => {
                this.clearWatchlist('watched');
            });
        }
        
        // Film actions
        document.addEventListener('click', (e) => {
            if (e.target.closest('.watchlist-film-actions')) {
                const actions = e.target.closest('.watchlist-film-actions');
                const filmId = parseInt(actions.dataset.filmId);
                const action = e.target.closest('[data-action]');
                
                if (action) {
                    const actionType = action.dataset.action;
                    this.handleFilmAction(filmId, actionType);
                }
            }
        });
    }
    
    switchTab(tab) {
        this.currentTab = tab;
        
        // Update tab buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.tab === tab);
        });
        
        // Update tab content
        document.querySelectorAll('.watchlist-content').forEach(content => {
            content.style.display = content.id === `${tab}-tab` ? 'block' : 'none';
        });
        
        this.renderWatchlist();
    }
    
    renderWatchlist() {
        const wantToWatchGrid = document.getElementById('wantToWatchGrid');
        const watchedGrid = document.getElementById('watchedGrid');
        const wantToWatchEmpty = document.getElementById('wantToWatchEmpty');
        const watchedEmpty = document.getElementById('watchedEmpty');
        
        // Render want to watch films
        if (wantToWatchGrid) {
            const wantToWatchFilms = this.getFilmsByIds(this.watchlist.wantToWatch);
            
            if (wantToWatchFilms.length === 0) {
                wantToWatchGrid.style.display = 'none';
                if (wantToWatchEmpty) wantToWatchEmpty.style.display = 'block';
            } else {
                wantToWatchGrid.style.display = 'grid';
                if (wantToWatchEmpty) wantToWatchEmpty.style.display = 'none';
                wantToWatchGrid.innerHTML = wantToWatchFilms.map(film => this.createWatchlistFilmCard(film, 'wantToWatch')).join('');
            }
        }
        
        // Render watched films
        if (watchedGrid) {
            const watchedFilms = this.getFilmsByIds(this.watchlist.watched);
            
            if (watchedFilms.length === 0) {
                watchedGrid.style.display = 'none';
                if (watchedEmpty) watchedEmpty.style.display = 'block';
            } else {
                watchedGrid.style.display = 'grid';
                if (watchedEmpty) watchedEmpty.style.display = 'none';
                watchedGrid.innerHTML = watchedFilms.map(film => this.createWatchlistFilmCard(film, 'watched')).join('');
            }
        }
        
        this.updateTabCounts();
    }
    
    createWatchlistFilmCard(film, listType) {
        const isWantToWatch = listType === 'wantToWatch';
        const isWatched = listType === 'watched';
        
        return `
            <div class="watchlist-film-card" data-film-id="${film.id}">
                <div class="film-poster-container">
                    <img src="${film.poster}" alt="${film.title}" class="film-poster" loading="lazy">
                    <div class="film-overlay">
                        <button class="btn btn-primary btn-sm" onclick="watchlistManager.showFilmDetails(${film.id})">
                            <i class="fas fa-play"></i>
                            View Details
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
                
                <div class="watchlist-film-actions" data-film-id="${film.id}">
                    ${isWantToWatch ? `
                        <button class="btn btn-success btn-sm" data-action="mark-watched" title="Mark as Watched">
                            <i class="fas fa-check"></i>
                            Mark as Watched
                        </button>
                        <button class="btn btn-outline btn-sm" data-action="remove" title="Remove from Watchlist">
                            <i class="fas fa-trash"></i>
                            Remove
                        </button>
                    ` : `
                        <button class="btn btn-outline btn-sm" data-action="mark-unwatched" title="Mark as Unwatched">
                            <i class="fas fa-undo"></i>
                            Mark as Unwatched
                        </button>
                        <button class="btn btn-outline btn-sm" data-action="remove" title="Remove from Watchlist">
                            <i class="fas fa-trash"></i>
                            Remove
                        </button>
                    `}
                </div>
            </div>
        `;
    }
    
    getFilmsByIds(filmIds) {
        return filmIds.map(id => this.films.find(film => film.id === id)).filter(Boolean);
    }
    
    handleFilmAction(filmId, actionType) {
        switch (actionType) {
            case 'mark-watched':
                this.markAsWatched(filmId);
                break;
            case 'mark-unwatched':
                this.markAsUnwatched(filmId);
                break;
            case 'remove':
                this.removeFromWatchlist(filmId);
                break;
        }
    }
    
    markAsWatched(filmId) {
        // Remove from want to watch
        this.watchlist.wantToWatch = this.watchlist.wantToWatch.filter(id => id !== filmId);
        
        // Add to watched if not already there
        if (!this.watchlist.watched.includes(filmId)) {
            this.watchlist.watched.push(filmId);
        }
        
        this.saveWatchlist();
        this.renderWatchlist();
        this.updateStatistics();
        window.IndieFilmTracker.showNotification('Marked as watched', 'success');
    }
    
    markAsUnwatched(filmId) {
        // Remove from watched
        this.watchlist.watched = this.watchlist.watched.filter(id => id !== filmId);
        
        // Add to want to watch if not already there
        if (!this.watchlist.wantToWatch.includes(filmId)) {
            this.watchlist.wantToWatch.push(filmId);
        }
        
        this.saveWatchlist();
        this.renderWatchlist();
        this.updateStatistics();
        window.IndieFilmTracker.showNotification('Marked as unwatched', 'info');
    }
    
    removeFromWatchlist(filmId) {
        this.watchlist.wantToWatch = this.watchlist.wantToWatch.filter(id => id !== filmId);
        this.watchlist.watched = this.watchlist.watched.filter(id => id !== filmId);
        
        this.saveWatchlist();
        this.renderWatchlist();
        this.updateStatistics();
        window.IndieFilmTracker.showNotification('Removed from watchlist', 'info');
    }
    
    clearWatchlist(listType) {
        const listName = listType === 'wantToWatch' ? 'Want to Watch' : 'Watched';
        
        if (confirm(`Are you sure you want to clear all films from your ${listName} list?`)) {
            this.watchlist[listType] = [];
            this.saveWatchlist();
            this.renderWatchlist();
            this.updateStatistics();
            window.IndieFilmTracker.showNotification(`Cleared ${listName} list`, 'info');
        }
    }
    
    showFilmDetails(filmId) {
        const film = this.films.find(f => f.id === filmId);
        if (!film) return;
        
        // Create modal if it doesn't exist
        let modal = document.getElementById('filmDetailsModal');
        if (!modal) {
            modal = document.createElement('div');
            modal.id = 'filmDetailsModal';
            modal.className = 'modal';
            modal.innerHTML = `
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 id="modalTitle">Film Details</h3>
                        <button class="modal-close" onclick="watchlistManager.closeFilmModal()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body" id="modalBody">
                        <!-- Film details will be loaded here -->
                    </div>
                </div>
            `;
            document.body.appendChild(modal);
        }
        
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.getElementById('modalBody');
        
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
                        ${this.watchlist.wantToWatch.includes(film.id) ? `
                            <button class="btn btn-success" onclick="watchlistManager.markAsWatched(${film.id})">
                                <i class="fas fa-check"></i>
                                Mark as Watched
                            </button>
                        ` : this.watchlist.watched.includes(film.id) ? `
                            <button class="btn btn-outline" onclick="watchlistManager.markAsUnwatched(${film.id})">
                                <i class="fas fa-undo"></i>
                                Mark as Unwatched
                            </button>
                        ` : `
                            <button class="btn btn-primary" onclick="watchlistManager.addToWatchlist(${film.id})">
                                <i class="fas fa-bookmark"></i>
                                Add to Watchlist
                            </button>
                        `}
                        <button class="btn btn-outline" onclick="watchlistManager.removeFromWatchlist(${film.id})">
                            <i class="fas fa-trash"></i>
                            Remove
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    closeFilmModal() {
        const modal = document.getElementById('filmDetailsModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }
    
    addToWatchlist(filmId) {
        if (!this.watchlist.wantToWatch.includes(filmId)) {
            this.watchlist.wantToWatch.push(filmId);
            this.saveWatchlist();
            this.renderWatchlist();
            this.updateStatistics();
            window.IndieFilmTracker.showNotification('Added to watchlist', 'success');
        }
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
    
    updateTabCounts() {
        const wantToWatchCount = document.getElementById('wantToWatchCount');
        const watchedCount = document.getElementById('watchedCount');
        
        if (wantToWatchCount) {
            wantToWatchCount.textContent = this.watchlist.wantToWatch.length;
        }
        
        if (watchedCount) {
            watchedCount.textContent = this.watchlist.watched.length;
        }
    }
    
    updateStatistics() {
        const totalWantToWatch = this.watchlist.wantToWatch.length;
        const totalWatched = this.watchlist.watched.length;
        const totalFilms = totalWantToWatch + totalWatched;
        const completionRate = totalFilms > 0 ? Math.round((totalWatched / totalFilms) * 100) : 0;
        
        const totalWantToWatchElement = document.getElementById('totalWantToWatch');
        const totalWatchedElement = document.getElementById('totalWatched');
        const completionRateElement = document.getElementById('completionRate');
        
        if (totalWantToWatchElement) {
            totalWantToWatchElement.textContent = totalWantToWatch;
        }
        
        if (totalWatchedElement) {
            totalWatchedElement.textContent = totalWatched;
        }
        
        if (completionRateElement) {
            completionRateElement.textContent = `${completionRate}%`;
        }
    }
    
    saveWatchlist() {
        localStorage.setItem('watchlist', JSON.stringify(this.watchlist));
        
        // Update global watchlist
        window.watchlist = this.watchlist;
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    window.watchlistManager = new WatchlistManager();
    
    // Close modal when clicking outside
    const modal = document.getElementById('filmDetailsModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                window.watchlistManager.closeFilmModal();
            }
        });
    }
    
    // Close modal with escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && modal.style.display === 'flex') {
            window.watchlistManager.closeFilmModal();
        }
    });
});