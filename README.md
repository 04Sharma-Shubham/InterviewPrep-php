# Indie Film Tracker

A complete responsive website for discovering and tracking independent films, festivals, and screenings. Built with PHP, CSS, and vanilla JavaScript.

## Features

### 🎬 Film Discovery
- Browse a curated collection of independent films
- Advanced filtering by genre, year, country, and search terms
- Detailed film information with ratings and descriptions
- Responsive grid layout with hover effects

### 🎭 Festival Calendar
- Interactive calendar view of upcoming film festivals
- List and calendar view toggle
- Festival details with dates, locations, and ticket links
- Filter by festival type and month

### 📚 Personal Watchlist
- Add films to your personal watchlist
- Mark films as watched or unwatched
- Track your viewing statistics
- Persistent storage using localStorage

### 🎨 Modern Design
- Dark cinematic theme with gold and crimson accents
- Fully responsive for mobile, tablet, and desktop
- Smooth animations and transitions
- Clean, semantic code structure

### 🔍 Smart Search
- Global search functionality
- Real-time filtering without page reloads
- Search across film titles, directors, and descriptions

## Technology Stack

- **Backend**: PHP 7.4+ (for templating and data loading)
- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Styling**: Custom CSS with CSS Variables for theming
- **Icons**: Font Awesome 6.4.0
- **Fonts**: Inter (body) and Playfair Display (headings)

## File Structure

```
indie-film-tracker/
├── index.php                 # Home page
├── discover.php             # Film discovery page
├── festivals.php            # Festivals page
├── watchlist.php            # Personal watchlist
├── about.php                # About page with contact form
├── includes/
│   ├── config.php           # Configuration settings
│   ├── data.php             # Sample film and festival data
│   ├── header.php           # Navigation header
│   └── footer.php           # Site footer
├── assets/
│   ├── css/
│   │   ├── main.css         # Core styles and variables
│   │   ├── components.css   # Component-specific styles
│   │   └── responsive.css   # Responsive design rules
│   ├── js/
│   │   ├── main.js          # Global functionality
│   │   ├── carousel.js      # Carousel component
│   │   ├── discover.js      # Film discovery features
│   │   ├── festivals.js     # Festival management
│   │   └── watchlist.js     # Watchlist functionality
│   └── images/              # Image assets
└── README.md               # This file
```

## Installation

1. **Clone or download** the project files to your web server
2. **Ensure PHP 7.4+** is installed and running
3. **Set up a local server** (XAMPP, WAMP, or similar) or upload to a web hosting service
4. **Access the site** through your web browser

### Local Development

For local development, you can use PHP's built-in server:

```bash
cd indie-film-tracker
php -S localhost:8000
```

Then visit `http://localhost:8000` in your browser.

## Configuration

### Basic Settings
Edit `includes/config.php` to customize:
- Site name and URL
- Admin email
- Default theme
- Pagination settings

### Adding Films
Add new films to the `$films_data` array in `includes/data.php`:

```php
[
    'id' => 13,
    'title' => 'Your Film Title',
    'director' => 'Director Name',
    'year' => 2024,
    'runtime' => '120 min',
    'genre' => 'Drama',
    'country' => 'USA',
    'poster' => 'assets/images/posters/your-film.jpg',
    'description' => 'Film description...',
    'rating' => 4.5,
    'status' => 'released'
]
```

### Adding Festivals
Add new festivals to the `$festivals_data` array in `includes/data.php`:

```php
[
    'id' => 9,
    'name' => 'Your Festival Name',
    'location' => 'City, Country',
    'start_date' => '2025-06-01',
    'end_date' => '2025-06-07',
    'type' => 'Major Festival',
    'website' => 'https://your-festival.com',
    'description' => 'Festival description...',
    'ticket_link' => 'https://your-festival.com/tickets'
]
```

## Customization

### Theme Colors
Modify CSS variables in `assets/css/main.css`:

```css
:root {
    --bg-primary: #0a0a0a;        /* Main background */
    --text-accent: #d4af37;       /* Gold accent */
    --accent-crimson: #dc143c;    /* Crimson accent */
    /* ... other variables */
}
```

### Responsive Breakpoints
Adjust breakpoints in `assets/css/responsive.css`:

```css
/* Mobile Portrait (up to 767px) */
@media (max-width: 767px) {
    /* Mobile styles */
}

/* Tablet Portrait (768px and up) */
@media (min-width: 768px) {
    /* Tablet styles */
}
```

## Browser Support

- **Chrome** 60+
- **Firefox** 55+
- **Safari** 12+
- **Edge** 79+

## Features in Detail

### Responsive Design
- Mobile-first approach
- Flexible grid system
- Touch-friendly interactions
- Optimized for all screen sizes

### Performance
- Lazy loading for images
- Debounced search inputs
- Efficient DOM manipulation
- Minimal external dependencies

### Accessibility
- Semantic HTML structure
- Keyboard navigation support
- Screen reader friendly
- High contrast ratios

### User Experience
- Smooth animations and transitions
- Intuitive navigation
- Clear visual feedback
- Persistent user preferences

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test across different browsers
5. Submit a pull request

## License

This project is open source and available under the [MIT License](LICENSE).

## Support

For support or questions, please contact us through the contact form on the About page or create an issue in the repository.

---

**Indie Film Tracker** - Celebrating independent cinema, one film at a time. 🎬