<?php
// Include configuration and data
require_once 'includes/config.php';
require_once 'includes/data.php';

$page_title = "About - Indie Film Tracker";
$current_page = 'about';

// Handle contact form submission
$form_message = '';
$form_error = '';

if ($_POST) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $form_error = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_error = 'Please enter a valid email address.';
    } else {
        // In a real application, you would send the email here
        // For demo purposes, we'll just show a success message
        $form_message = 'Thank you for your message! We\'ll get back to you soon.';
        
        // Clear form data
        $name = $email = $subject = $message = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="Learn about Indie Film Tracker - your ultimate destination for discovering and tracking independent films, festivals, and screenings.">
    
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
                    <h1 class="page-title">About Indie Film Tracker</h1>
                    <p class="page-subtitle">Your ultimate destination for independent cinema</p>
                </div>
            </div>
        </section>

        <!-- Mission Section -->
        <section class="mission-section">
            <div class="container">
                <div class="mission-content">
                    <div class="mission-text">
                        <h2>Our Mission</h2>
                        <p>Indie Film Tracker is dedicated to celebrating and promoting independent cinema from around the world. We believe that independent films offer unique perspectives, innovative storytelling, and authentic voices that deserve to be discovered and appreciated.</p>
                        
                        <p>Our platform serves as a bridge between filmmakers and audiences, providing a comprehensive resource for discovering new films, tracking festival screenings, and connecting with the vibrant indie film community.</p>
                        
                        <div class="mission-stats">
                            <div class="stat-item">
                                <h3><?php echo count($films_data); ?>+</h3>
                                <p>Independent Films</p>
                            </div>
                            <div class="stat-item">
                                <h3><?php echo count($festivals_data); ?>+</h3>
                                <p>Film Festivals</p>
                            </div>
                            <div class="stat-item">
                                <h3>50+</h3>
                                <p>Countries Represented</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mission-image">
                        <img src="assets/images/about-mission.jpg" alt="Independent Film Scene" class="mission-img">
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section">
            <div class="container">
                <h2 class="section-title">What We Offer</h2>
                <div class="features-grid grid grid-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Discover Films</h3>
                        <p>Explore our curated collection of independent films from around the world. Filter by genre, year, country, and more to find your next favorite film.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3>Festival Calendar</h3>
                        <p>Stay updated with upcoming film festivals and screenings. Never miss an opportunity to experience independent cinema in your area.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <h3>Personal Watchlist</h3>
                        <p>Create and manage your personal watchlist. Track films you want to watch and mark those you've already seen.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Community</h3>
                        <p>Connect with fellow indie film enthusiasts. Share recommendations and discover new voices in independent cinema.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Mobile Friendly</h3>
                        <p>Access our platform on any device. Our responsive design ensures a great experience on desktop, tablet, and mobile.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h3>Dark Theme</h3>
                        <p>Enjoy a cinematic viewing experience with our carefully crafted dark theme designed for film enthusiasts.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="team-section">
            <div class="container">
                <h2 class="section-title">Our Team</h2>
                <div class="team-grid grid grid-3">
                    <div class="team-member">
                        <div class="member-avatar">
                            <img src="assets/images/team-1.jpg" alt="Sarah Chen" class="avatar-img">
                        </div>
                        <h3>Sarah Chen</h3>
                        <p class="member-role">Founder & CEO</p>
                        <p class="member-bio">Passionate about independent cinema and dedicated to supporting emerging filmmakers.</p>
                        <div class="member-social">
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                    
                    <div class="team-member">
                        <div class="member-avatar">
                            <img src="assets/images/team-2.jpg" alt="Marcus Rodriguez" class="avatar-img">
                        </div>
                        <h3>Marcus Rodriguez</h3>
                        <p class="member-role">Head of Content</p>
                        <p class="member-bio">Film critic and curator with over 10 years of experience in independent cinema.</p>
                        <div class="member-social">
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    
                    <div class="team-member">
                        <div class="member-avatar">
                            <img src="assets/images/team-3.jpg" alt="Elena Volkov" class="avatar-img">
                        </div>
                        <h3>Elena Volkov</h3>
                        <p class="member-role">Community Manager</p>
                        <p class="member-bio">Building connections between filmmakers and audiences worldwide.</p>
                        <div class="member-social">
                            <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-section" id="contact">
            <div class="container">
                <div class="contact-content">
                    <div class="contact-info">
                        <h2>Get in Touch</h2>
                        <p>Have questions, suggestions, or want to collaborate? We'd love to hear from you!</p>
                        
                        <div class="contact-details">
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <h4>Email</h4>
                                    <p>hello@indiefilmtracker.com</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <h4>Phone</h4>
                                    <p>+1 (555) 123-4567</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <h4>Address</h4>
                                    <p>123 Film Street<br>Los Angeles, CA 90210</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="social-links">
                            <h4>Follow Us</h4>
                            <div class="social-icons">
                                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-form-container">
                        <form class="contact-form" method="POST" action="#contact">
                            <h3>Send us a Message</h3>
                            
                            <?php if ($form_message): ?>
                            <div class="form-message success">
                                <i class="fas fa-check-circle"></i>
                                <?php echo $form_message; ?>
                            </div>
                            <?php endif; ?>
                            
                            <?php if ($form_error): ?>
                            <div class="form-message error">
                                <i class="fas fa-exclamation-circle"></i>
                                <?php echo $form_error; ?>
                            </div>
                            <?php endif; ?>
                            
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="subject">Subject *</label>
                                <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($subject ?? ''); ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" rows="5" required><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i>
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>