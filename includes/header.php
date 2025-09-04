<?php
require_once 'config.php';

// Get current page for active navigation
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $site_config['description']; ?>">
    <meta name="keywords" content="<?php echo $site_config['keywords']; ?>">
    <meta name="author" content="<?php echo $site_config['author']; ?>">
    
    <title><?php echo isset($page_title) ? $page_title . ' - ' . SITE_NAME : $site_config['title']; ?></title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <!-- Logo -->
                <div class="nav-logo">
                    <a href="index.php">
                        <h2><i class="fas fa-code"></i> <?php echo SITE_NAME; ?></h2>
                    </a>
                </div>
                
                <!-- Navigation Menu -->
                <ul class="nav-menu">
                    <?php foreach ($nav_menu as $title => $link): ?>
                        <li class="nav-item">
                            <a href="<?php echo $link; ?>" 
                               class="nav-link <?php echo ($current_page == $link) ? 'active' : ''; ?>">
                                <?php echo $title; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                
                <!-- Mobile Menu Toggle -->
                <div class="nav-toggle" id="mobile-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Wrapper -->
    <main class="main-content">
