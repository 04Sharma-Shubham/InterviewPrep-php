/**
 * Indie Film Tracker - Festivals Page JavaScript
 * Handles festival filtering, calendar view, and interactions
 */

class FestivalManager {
    constructor() {
        this.festivals = window.festivalsData || [];
        this.filteredFestivals = [...this.festivals];
        this.currentView = 'list';
        this.currentMonth = new Date().getMonth();
        this.currentYear = new Date().getFullYear();
        
        this.init();
    }
    
    init() {
        this.bindEvents();
        this.renderFestivals();
        this.initializeCalendar();
    }
    
    bindEvents() {
        // Filter events
        const typeFilter = document.getElementById('typeFilter');
        const monthFilter = document.getElementById('monthFilter');
        const searchFilter = document.getElementById('searchFilter');
        const resetFilters = document.getElementById('resetFilters');
        
        if (typeFilter) {
            typeFilter.addEventListener('change', (e) => {
                this.applyFilters();
            });
        }
        
        if (monthFilter) {
            monthFilter.addEventListener('change', (e) => {
                this.applyFilters();
            });
        }
        
        if (searchFilter) {
            searchFilter.addEventListener('input', this.debounce((e) => {
                this.applyFilters();
            }, 300));
        }
        
        if (resetFilters) {
            resetFilters.addEventListener('click', () => this.resetFilters());
        }
        
        // View toggle events
        const listViewBtn = document.getElementById('listViewBtn');
        const calendarViewBtn = document.getElementById('calendarViewBtn');
        
        if (listViewBtn) {
            listViewBtn.addEventListener('click', () => this.switchView('list'));
        }
        
        if (calendarViewBtn) {
            calendarViewBtn.addEventListener('click', () => this.switchView('calendar'));
        }
        
        // Calendar navigation
        const prevMonth = document.getElementById('prevMonth');
        const nextMonth = document.getElementById('nextMonth');
        
        if (prevMonth) {
            prevMonth.addEventListener('click', () => this.navigateMonth(-1));
        }
        
        if (nextMonth) {
            nextMonth.addEventListener('click', () => this.navigateMonth(1));
        }
    }
    
    applyFilters() {
        const typeFilter = document.getElementById('typeFilter');
        const monthFilter = document.getElementById('monthFilter');
        const searchFilter = document.getElementById('searchFilter');
        
        const typeValue = typeFilter ? typeFilter.value : '';
        const monthValue = monthFilter ? monthFilter.value : '';
        const searchValue = searchFilter ? searchFilter.value.toLowerCase() : '';
        
        this.filteredFestivals = this.festivals.filter(festival => {
            // Type filter
            if (typeValue && festival.type !== typeValue) {
                return false;
            }
            
            // Month filter
            if (monthValue) {
                const festivalMonth = new Date(festival.start_date).getMonth() + 1;
                if (festivalMonth.toString() !== monthValue) {
                    return false;
                }
            }
            
            // Search filter
            if (searchValue) {
                const nameMatch = festival.name.toLowerCase().includes(searchValue);
                const locationMatch = festival.location.toLowerCase().includes(searchValue);
                const descriptionMatch = festival.description.toLowerCase().includes(searchValue);
                
                if (!nameMatch && !locationMatch && !descriptionMatch) {
                    return false;
                }
            }
            
            return true;
        });
        
        this.renderFestivals();
        this.updateFestivalCount();
    }
    
    renderFestivals() {
        const festivalsGrid = document.getElementById('festivalsGrid');
        if (!festivalsGrid) return;
        
        if (this.filteredFestivals.length === 0) {
            festivalsGrid.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-calendar-alt"></i>
                    <h3>No festivals found</h3>
                    <p>Try adjusting your filters to find more festivals.</p>
                    <button class="btn btn-primary" onclick="festivalManager.resetFilters()">Reset Filters</button>
                </div>
            `;
            return;
        }
        
        festivalsGrid.innerHTML = this.filteredFestivals.map(festival => this.createFestivalCard(festival)).join('');
    }
    
    createFestivalCard(festival) {
        const startDate = new Date(festival.start_date);
        const endDate = new Date(festival.end_date);
        const month = startDate.toLocaleDateString('en-US', { month: 'short' });
        const day = startDate.getDate();
        
        return `
            <div class="festival-card" data-festival-id="${festival.id}">
                <div class="festival-date-badge">
                    <div class="date-month">${month}</div>
                    <div class="date-day">${day}</div>
                </div>
                
                <div class="festival-content">
                    <div class="festival-header">
                        <h3 class="festival-name">${festival.name}</h3>
                        <span class="festival-type">${festival.type}</span>
                    </div>
                    
                    <div class="festival-details">
                        <p class="festival-location">
                            <i class="fas fa-map-marker-alt"></i>
                            ${festival.location}
                        </p>
                        <p class="festival-dates">
                            <i class="fas fa-calendar"></i>
                            ${this.formatDateRange(startDate, endDate)}
                        </p>
                        <p class="festival-description">${festival.description}</p>
                    </div>
                    
                    <div class="festival-actions">
                        <a href="${festival.website}" target="_blank" class="btn btn-outline">
                            <i class="fas fa-external-link-alt"></i>
                            Website
                        </a>
                        <a href="${festival.ticket_link}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-ticket-alt"></i>
                            Get Tickets
                        </a>
                    </div>
                </div>
            </div>
        `;
    }
    
    formatDateRange(startDate, endDate) {
        const startMonth = startDate.toLocaleDateString('en-US', { month: 'short' });
        const startDay = startDate.getDate();
        const endMonth = endDate.toLocaleDateString('en-US', { month: 'short' });
        const endDay = endDate.getDate();
        const year = endDate.getFullYear();
        
        if (startMonth === endMonth) {
            return `${startMonth} ${startDay}-${endDay}, ${year}`;
        } else {
            return `${startMonth} ${startDay} - ${endMonth} ${endDay}, ${year}`;
        }
    }
    
    switchView(view) {
        this.currentView = view;
        
        const listView = document.getElementById('listView');
        const calendarView = document.getElementById('calendarView');
        const listViewBtn = document.getElementById('listViewBtn');
        const calendarViewBtn = document.getElementById('calendarViewBtn');
        
        if (view === 'list') {
            if (listView) listView.style.display = 'block';
            if (calendarView) calendarView.style.display = 'none';
            if (listViewBtn) listViewBtn.classList.add('active');
            if (calendarViewBtn) calendarViewBtn.classList.remove('active');
        } else {
            if (listView) listView.style.display = 'none';
            if (calendarView) calendarView.style.display = 'block';
            if (listViewBtn) listViewBtn.classList.remove('active');
            if (calendarViewBtn) calendarViewBtn.classList.add('active');
            
            this.renderCalendar();
        }
    }
    
    initializeCalendar() {
        this.renderCalendar();
    }
    
    renderCalendar() {
        const calendarGrid = document.getElementById('calendarGrid');
        const currentMonthElement = document.getElementById('currentMonth');
        
        if (!calendarGrid) return;
        
        // Update month display
        if (currentMonthElement) {
            const monthNames = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            currentMonthElement.textContent = `${monthNames[this.currentMonth]} ${this.currentYear}`;
        }
        
        // Get first day of month and number of days
        const firstDay = new Date(this.currentYear, this.currentMonth, 1);
        const lastDay = new Date(this.currentYear, this.currentMonth + 1, 0);
        const daysInMonth = lastDay.getDate();
        const startingDayOfWeek = firstDay.getDay();
        
        // Create calendar HTML
        let calendarHTML = `
            <div class="calendar-header-row">
                <div class="calendar-day-header">Sun</div>
                <div class="calendar-day-header">Mon</div>
                <div class="calendar-day-header">Tue</div>
                <div class="calendar-day-header">Wed</div>
                <div class="calendar-day-header">Thu</div>
                <div class="calendar-day-header">Fri</div>
                <div class="calendar-day-header">Sat</div>
            </div>
        `;
        
        // Add empty cells for days before the first day of the month
        for (let i = 0; i < startingDayOfWeek; i++) {
            calendarHTML += '<div class="calendar-day empty"></div>';
        }
        
        // Add days of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const festivalsOnDay = this.getFestivalsOnDay(day);
            const hasFestivals = festivalsOnDay.length > 0;
            
            calendarHTML += `
                <div class="calendar-day ${hasFestivals ? 'has-festivals' : ''}" data-day="${day}">
                    <div class="day-number">${day}</div>
                    ${hasFestivals ? `
                        <div class="festival-indicators">
                            ${festivalsOnDay.map(festival => `
                                <div class="festival-indicator" 
                                     title="${festival.name}" 
                                     onclick="festivalManager.showFestivalDetails(${festival.id})">
                                </div>
                            `).join('')}
                        </div>
                    ` : ''}
                </div>
            `;
        }
        
        calendarGrid.innerHTML = calendarHTML;
    }
    
    getFestivalsOnDay(day) {
        const targetDate = new Date(this.currentYear, this.currentMonth, day);
        
        return this.filteredFestivals.filter(festival => {
            const startDate = new Date(festival.start_date);
            const endDate = new Date(festival.end_date);
            
            return targetDate >= startDate && targetDate <= endDate;
        });
    }
    
    navigateMonth(direction) {
        this.currentMonth += direction;
        
        if (this.currentMonth < 0) {
            this.currentMonth = 11;
            this.currentYear--;
        } else if (this.currentMonth > 11) {
            this.currentMonth = 0;
            this.currentYear++;
        }
        
        this.renderCalendar();
    }
    
    showFestivalDetails(festivalId) {
        const festival = this.festivals.find(f => f.id === festivalId);
        if (!festival) return;
        
        const modal = document.getElementById('festivalModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.getElementById('modalBody');
        
        if (!modal || !modalTitle || !modalBody) return;
        
        modalTitle.textContent = festival.name;
        modalBody.innerHTML = `
            <div class="festival-details-modal">
                <div class="festival-details-header">
                    <div class="festival-date-badge large">
                        <div class="date-month">${new Date(festival.start_date).toLocaleDateString('en-US', { month: 'short' })}</div>
                        <div class="date-day">${new Date(festival.start_date).getDate()}</div>
                    </div>
                    <div class="festival-info">
                        <h4>${festival.name}</h4>
                        <p class="festival-type">${festival.type}</p>
                        <p class="festival-location">
                            <i class="fas fa-map-marker-alt"></i>
                            ${festival.location}
                        </p>
                    </div>
                </div>
                
                <div class="festival-details-content">
                    <div class="festival-dates">
                        <h5>Festival Dates</h5>
                        <p>${this.formatDateRange(new Date(festival.start_date), new Date(festival.end_date))}</p>
                    </div>
                    
                    <div class="festival-description">
                        <h5>About</h5>
                        <p>${festival.description}</p>
                    </div>
                    
                    <div class="festival-actions">
                        <a href="${festival.website}" target="_blank" class="btn btn-outline">
                            <i class="fas fa-external-link-alt"></i>
                            Visit Website
                        </a>
                        <a href="${festival.ticket_link}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-ticket-alt"></i>
                            Get Tickets
                        </a>
                    </div>
                </div>
            </div>
        `;
        
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    closeFestivalModal() {
        const modal = document.getElementById('festivalModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }
    
    resetFilters() {
        const typeFilter = document.getElementById('typeFilter');
        const monthFilter = document.getElementById('monthFilter');
        const searchFilter = document.getElementById('searchFilter');
        
        if (typeFilter) typeFilter.value = '';
        if (monthFilter) monthFilter.value = '';
        if (searchFilter) searchFilter.value = '';
        
        this.applyFilters();
    }
    
    updateFestivalCount() {
        const countElement = document.getElementById('festivalsCount');
        if (countElement) {
            countElement.textContent = this.filteredFestivals.length;
        }
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
    window.festivalManager = new FestivalManager();
    
    // Close modal when clicking outside
    const modal = document.getElementById('festivalModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                window.festivalManager.closeFestivalModal();
            }
        });
    }
    
    // Close modal with escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && modal.style.display === 'flex') {
            window.festivalManager.closeFestivalModal();
        }
    });
});

// Global functions for onclick handlers
function showFestivalDetails(festivalId) {
    if (window.festivalManager) {
        window.festivalManager.showFestivalDetails(festivalId);
    }
}

function closeFestivalModal() {
    if (window.festivalManager) {
        window.festivalManager.closeFestivalModal();
    }
}