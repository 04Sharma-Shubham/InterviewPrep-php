<?php
// Include configuration and data
require_once 'includes/config.php';
require_once 'includes/data.php';

$page_title = "Discover Films - Indie Film Tracker";
$current_page = 'discover';

// Get filter parameters
$genre_filter = isset($_GET['genre']) ? $_GET['genre'] : '';
$year_filter = isset($_GET['year']) ? $_GET['year'] : '';
$country_filter = isset($_GET['country']) ? $_GET['country'] : '';
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// Filter films based on parameters
$filtered_films = $films_data;

if (!empty($genre_filter)) {
    $filtered_films = array_filter($filtered_films, function($film) use ($genre_filter) {
        return $film['genre'] === $genre_filter;
    });
}

if (!empty($year_filter)) {
    $filtered_films = array_filter($filtered_films, function($film) use ($year_filter) {
        return $film['year'] == $year_filter;
    });
}

if (!empty($country_filter)) {
    $filtered_films = array_filter($filtered_films, function($film) use ($country_filter) {
        return $film['country'] === $country_filter;
    });
}

if (!empty($search_query)) {
    $filtered_films = array_filter($filtered_films, function($film) use ($search_query) {
        return stripos($film['title'], $search_query) !== false || 
               stripos($film['director'], $search_query) !== false;
    });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="Discover and explore independent films from around the world. Filter by genre, year, country and more.">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="dark-theme">
    <!-- Navigation -->
    <?php include 'includes/header.php'; ?>
    
    <!-- Main Content -->
    <main style="margin-top: 80px;">
        <!-- Page Header -->
        <section class="page-header">
            <div class="container">
                <div class="page-header-content">
                    <h1 class="page-title">Discover Films</h1>
                    <p class="page-subtitle">Explore our curated collection of independent films from around the world</p>
                </div>
            </div>
        </section>

        <!-- Filters -->
        <section class="filters-section">
            <div class="container">
                <div class="filters">
                    <div class="filter-group">
                        <label class="filter-label">Genre:</label>
                        <select class="filter-select" id="genreFilter">
                            <option value="">All Genres</option>
                            <?php foreach ($genres as $genre): ?>
                            <option value="<?php echo $genre; ?>" <?php echo ($genre_filter === $genre) ? 'selected' : ''; ?>>
                                <?php echo $genre; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label class="filter-label">Year:</label>
                        <select class="filter-select" id="yearFilter">
                            <option value="">All Years</option>
                            <?php foreach ($years as $year): ?>
                            <option value="<?php echo $year; ?>" <?php echo ($year_filter == $year) ? 'selected' : ''; ?>>
                                <?php echo $year; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label class="filter-label">Country:</label>
                        <select class="filter-select" id="countryFilter">
                            <option value="">All Countries</option>
                            <?php foreach ($countries as $country): ?>
                            <option value="<?php echo $country; ?>" <?php echo ($country_filter === $country) ? 'selected' : ''; ?>>
                                <?php echo $country; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label class="filter-label">Search:</label>
                        <input type="text" class="filter-select" id="searchFilter" placeholder="Search films..." value="<?php echo htmlspecialchars($search_query); ?>">
                    </div>
                    
                    <button class="btn btn-ghost filter-reset" id="resetFilters">Reset Filters</button>
                </div>
            </div>
        </section>

        <!-- Films Grid -->
        <section class="films-section">
            <div class="container">
                <div class="films-header">
                    <h2 class="section-title">
                        <span id="filmsCount"><?php echo count($filtered_films); ?></span> Films Found
                    </h2>
                    <div class="sort-options">
                        <label for="sortSelect">Sort by:</label>
                        <select id="sortSelect" class="filter-select">
                            <option value="title">Title A-Z</option>
                            <option value="title-desc">Title Z-A</option>
                            <option value="year">Year (Newest)</option>
                            <option value="year-desc">Year (Oldest)</option>
                            <option value="rating">Rating (Highest)</option>
                            <option value="rating-desc">Rating (Lowest)</option>
                        </select>
                    </div>
                </div>
                
                <div class="films-grid grid grid-auto" id="filmsGrid">
                    <?php if (empty($filtered_films)): ?>
                    <div class="empty-state">
                        <i class="fas fa-film"></i>
                        <h3>No films found</h3>
                        <p>Try adjusting your filters or search terms to find more films.</p>
                        <button class="btn btn-primary" onclick="resetFilters()">Reset Filters</button>
                    </div>
                    <?php else: ?>
                    <?php foreach ($filtered_films as $film): ?>
                    <div class="film-card" data-film-id="<?php echo $film['id']; ?>">
                        <div class="film-poster-container">
                            <img src="<?php echo $film['poster']; ?>" alt="<?php echo $film['title']; ?>" class="film-poster">
                            <div class="film-actions">
                                <button class="action-btn" onclick="toggleWatchlist(<?php echo $film['id']; ?>)" title="Add to Watchlist">
                                    <i class="fas fa-bookmark"></i>
                                </button>
                                <button class="action-btn" onclick="showFilmDetails(<?php echo $film['id']; ?>)" title="View Details">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                            </div>
                        </div>
                        <div class="film-info">
                            <h3 class="film-title"><?php echo $film['title']; ?></h3>
                            <p class="film-director"><?php echo $film['director']; ?></p>
                            <div class="film-meta">
                                <span class="film-year"><?php echo $film['year']; ?></span>
                                <span class="film-runtime"><?php echo $film['runtime']; ?></span>
                            </div>
                            <div class="film-rating">
                                <i class="fas fa-star"></i>
                                <span><?php echo $film['rating']; ?></span>
                            </div>
                            <div class="film-genre">
                                <span class="genre-tag"><?php echo $film['genre']; ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <!-- Film Details Modal -->
    <div class="modal" id="filmModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Film Details</h3>
                <button class="modal-close" onclick="closeFilmModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Film details will be loaded here -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/discover.js"></script>
    
    <!-- Pass PHP data to JavaScript -->
    <script>
        window.filmsData = <?php echo json_encode($films_data); ?>;
        window.filteredFilms = <?php echo json_encode($filtered_films); ?>;
    </script>
</body>
</html>