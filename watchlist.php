<?php
// Include configuration and data
require_once 'includes/config.php';
require_once 'includes/data.php';

$page_title = "My Watchlist - Indie Film Tracker";
$current_page = 'watchlist';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="Manage your personal watchlist of independent films. Track what you want to watch and what you've already seen.">
    
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
                    <h1 class="page-title">My Watchlist</h1>
                    <p class="page-subtitle">Track the films you want to watch and manage your viewing history</p>
                </div>
            </div>
        </section>

        <!-- Watchlist Tabs -->
        <section class="watchlist-tabs-section">
            <div class="container">
                <div class="watchlist-tabs">
                    <button class="tab-btn active" data-tab="want-to-watch">
                        <i class="fas fa-bookmark"></i>
                        Want to Watch
                        <span class="tab-count" id="wantToWatchCount">0</span>
                    </button>
                    <button class="tab-btn" data-tab="watched">
                        <i class="fas fa-check-circle"></i>
                        Watched
                        <span class="tab-count" id="watchedCount">0</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Want to Watch Tab -->
        <section class="watchlist-content" id="want-to-watch-tab">
            <div class="container">
                <div class="watchlist-header">
                    <h2 class="section-title">Films to Watch</h2>
                    <div class="watchlist-actions">
                        <button class="btn btn-ghost" id="clearWantToWatch">
                            <i class="fas fa-trash"></i>
                            Clear All
                        </button>
                    </div>
                </div>
                
                <div class="watchlist-grid grid grid-auto" id="wantToWatchGrid">
                    <div class="empty-state" id="wantToWatchEmpty" style="display: none;">
                        <i class="fas fa-bookmark"></i>
                        <h3>No films in your watchlist</h3>
                        <p>Start adding films you want to watch by browsing our collection.</p>
                        <a href="discover.php" class="btn btn-primary">Discover Films</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Watched Tab -->
        <section class="watchlist-content" id="watched-tab" style="display: none;">
            <div class="container">
                <div class="watchlist-header">
                    <h2 class="section-title">Watched Films</h2>
                    <div class="watchlist-actions">
                        <button class="btn btn-ghost" id="clearWatched">
                            <i class="fas fa-trash"></i>
                            Clear All
                        </button>
                    </div>
                </div>
                
                <div class="watchlist-grid grid grid-auto" id="watchedGrid">
                    <div class="empty-state" id="watchedEmpty" style="display: none;">
                        <i class="fas fa-check-circle"></i>
                        <h3>No watched films yet</h3>
                        <p>Mark films as watched to keep track of what you've seen.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics Section -->
        <section class="watchlist-stats">
            <div class="container">
                <h2 class="section-title">Your Statistics</h2>
                <div class="stats-grid grid grid-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number" id="totalWantToWatch">0</h3>
                            <p class="stat-label">Want to Watch</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number" id="totalWatched">0</h3>
                            <p class="stat-label">Watched</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number" id="completionRate">0%</h3>
                            <p class="stat-label">Completion Rate</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/watchlist.js"></script>
    
    <!-- Pass PHP data to JavaScript -->
    <script>
        window.filmsData = <?php echo json_encode($films_data); ?>;
    </script>
</body>
</html>