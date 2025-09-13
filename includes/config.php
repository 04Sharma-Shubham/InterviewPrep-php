<?php
// Configuration file for Indie Film Tracker

// Site configuration
define('SITE_NAME', 'Indie Film Tracker');
define('SITE_URL', 'http://localhost');
define('ADMIN_EMAIL', 'admin@indiefilmtracker.com');

// Theme configuration
define('DEFAULT_THEME', 'dark');

// Pagination
define('FILMS_PER_PAGE', 12);
define('FESTIVALS_PER_PAGE', 8);

// File paths
define('DATA_DIR', __DIR__ . '/../data/');
define('IMAGES_DIR', __DIR__ . '/../assets/images/');

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>