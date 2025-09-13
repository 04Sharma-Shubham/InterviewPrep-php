<?php
// Include configuration and data
require_once 'includes/config.php';
require_once 'includes/data.php';

$page_title = "Indie Film Tracker - Discover Independent Cinema";
$current_page = 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="Discover and track independent films, festivals, and screenings. Your ultimate guide to indie cinema.">
    
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
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-background">
                <img src="assets/images/hero-film.jpg" alt="Indie Film Scene" class="hero-image">
                <div class="hero-overlay"></div>
            </div>
            <div class="hero-content">
                <div class="container">
                    <h1 class="hero-title">Discover Independent Cinema</h1>
                    <p class="hero-subtitle">Track films, explore festivals, and connect with the indie film community</p>
                    <div class="hero-buttons">
                        <a href="discover.php" class="btn btn-primary">Explore Films</a>
                        <a href="festivals.php" class="btn btn-secondary">View Festivals</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- This Week's Screenings -->
        <section class="screenings-section">
            <div class="container">
                <h2 class="section-title">This Week's Screenings</h2>
                <div class="carousel-container">
                    <div class="carousel-wrapper">
                        <div class="carousel" id="screeningsCarousel">
                            <?php foreach ($this_weeks_screenings as $screening): ?>
                            <div class="carousel-item">
                                <div class="screening-card">
                                    <img src="<?php echo $screening['poster']; ?>" alt="<?php echo $screening['title']; ?>" class="screening-poster">
                                    <div class="screening-info">
                                        <h3><?php echo $screening['title']; ?></h3>
                                        <p class="director"><?php echo $screening['director']; ?></p>
                                        <p class="date-time">
                                            <i class="fas fa-calendar"></i>
                                            <?php echo $screening['date']; ?> at <?php echo $screening['time']; ?>
                                        </p>
                                        <p class="venue">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <?php echo $screening['venue']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button class="carousel-btn carousel-prev" id="carouselPrev">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="carousel-btn carousel-next" id="carouselNext">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- Upcoming Festivals -->
        <section class="festivals-preview">
            <div class="container">
                <h2 class="section-title">Upcoming Festivals</h2>
                <div class="festivals-strip">
                    <?php foreach ($upcoming_festivals as $festival): ?>
                    <div class="festival-item">
                        <div class="festival-date">
                            <span class="month"><?php echo $festival['month']; ?></span>
                            <span class="day"><?php echo $festival['day']; ?></span>
                        </div>
                        <div class="festival-details">
                            <h3><?php echo $festival['name']; ?></h3>
                            <p><?php echo $festival['location']; ?></p>
                            <span class="festival-type"><?php echo $festival['type']; ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center">
                    <a href="festivals.php" class="btn btn-outline">View All Festivals</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/carousel.js"></script>
</body>
</html>