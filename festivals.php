<?php
// Include configuration and data
require_once 'includes/config.php';
require_once 'includes/data.php';

$page_title = "Film Festivals - Indie Film Tracker";
$current_page = 'festivals';

// Sort festivals by start date
usort($festivals_data, function($a, $b) {
    return strtotime($a['start_date']) - strtotime($b['start_date']);
});

// Get current date for filtering
$current_date = date('Y-m-d');
$upcoming_festivals = array_filter($festivals_data, function($festival) use ($current_date) {
    return $festival['start_date'] >= $current_date;
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="Discover upcoming film festivals around the world. Find dates, locations, and ticket information.">
    
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
                    <h1 class="page-title">Film Festivals</h1>
                    <p class="page-subtitle">Discover upcoming film festivals around the world</p>
                </div>
            </div>
        </section>

        <!-- Festival Filters -->
        <section class="filters-section">
            <div class="container">
                <div class="filters">
                    <div class="filter-group">
                        <label class="filter-label">Type:</label>
                        <select class="filter-select" id="typeFilter">
                            <option value="">All Types</option>
                            <option value="Major Festival">Major Festival</option>
                            <option value="International">International</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label class="filter-label">Month:</label>
                        <select class="filter-select" id="monthFilter">
                            <option value="">All Months</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label class="filter-label">Search:</label>
                        <input type="text" class="filter-select" id="searchFilter" placeholder="Search festivals...">
                    </div>
                    
                    <button class="btn btn-ghost filter-reset" id="resetFilters">Reset Filters</button>
                </div>
            </div>
        </section>

        <!-- Calendar View Toggle -->
        <section class="view-toggle-section">
            <div class="container">
                <div class="view-toggle">
                    <button class="btn btn-ghost active" id="listViewBtn">
                        <i class="fas fa-list"></i>
                        List View
                    </button>
                    <button class="btn btn-ghost" id="calendarViewBtn">
                        <i class="fas fa-calendar"></i>
                        Calendar View
                    </button>
                </div>
            </div>
        </section>

        <!-- Festivals List View -->
        <section class="festivals-section" id="listView">
            <div class="container">
                <div class="festivals-header">
                    <h2 class="section-title">
                        <span id="festivalsCount"><?php echo count($upcoming_festivals); ?></span> Upcoming Festivals
                    </h2>
                </div>
                
                <div class="festivals-grid" id="festivalsGrid">
                    <?php foreach ($upcoming_festivals as $festival): ?>
                    <div class="festival-card" data-festival-id="<?php echo $festival['id']; ?>">
                        <div class="festival-date-badge">
                            <div class="date-month"><?php echo date('M', strtotime($festival['start_date'])); ?></div>
                            <div class="date-day"><?php echo date('j', strtotime($festival['start_date'])); ?></div>
                        </div>
                        
                        <div class="festival-content">
                            <div class="festival-header">
                                <h3 class="festival-name"><?php echo $festival['name']; ?></h3>
                                <span class="festival-type"><?php echo $festival['type']; ?></span>
                            </div>
                            
                            <div class="festival-details">
                                <p class="festival-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php echo $festival['location']; ?>
                                </p>
                                <p class="festival-dates">
                                    <i class="fas fa-calendar"></i>
                                    <?php echo date('M j', strtotime($festival['start_date'])); ?> - 
                                    <?php echo date('M j, Y', strtotime($festival['end_date'])); ?>
                                </p>
                                <p class="festival-description"><?php echo $festival['description']; ?></p>
                            </div>
                            
                            <div class="festival-actions">
                                <a href="<?php echo $festival['website']; ?>" target="_blank" class="btn btn-outline">
                                    <i class="fas fa-external-link-alt"></i>
                                    Website
                                </a>
                                <a href="<?php echo $festival['ticket_link']; ?>" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-ticket-alt"></i>
                                    Get Tickets
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Calendar View -->
        <section class="calendar-section" id="calendarView" style="display: none;">
            <div class="container">
                <div class="calendar-header">
                    <h2 class="section-title">Festival Calendar</h2>
                    <div class="calendar-navigation">
                        <button class="btn btn-ghost" id="prevMonth">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <h3 id="currentMonth"><?php echo date('F Y'); ?></h3>
                        <button class="btn btn-ghost" id="nextMonth">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                
                <div class="calendar-container">
                    <div class="calendar-grid" id="calendarGrid">
                        <!-- Calendar will be generated by JavaScript -->
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Festival Details Modal -->
    <div class="modal" id="festivalModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Festival Details</h3>
                <button class="modal-close" onclick="closeFestivalModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Festival details will be loaded here -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/festivals.js"></script>
    
    <!-- Pass PHP data to JavaScript -->
    <script>
        window.festivalsData = <?php echo json_encode($upcoming_festivals); ?>;
    </script>
</body>
</html>