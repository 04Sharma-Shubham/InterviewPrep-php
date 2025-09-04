</main>
    <!-- End Main Content Wrapper -->

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="footer-sections">
                    <!-- Company Info -->
                    <div class="footer-section">
                        <div class="footer-logo">
                            <h3><i class="fas fa-code"></i> <?php echo SITE_NAME; ?></h3>
                            <p>Master your technical interviews with expert guidance, comprehensive courses, and real-world practice sessions.</p>
                        </div>
                        <div class="social-links">
                            <?php foreach ($social_links as $platform => $url): ?>
                                <a href="<?php echo $url; ?>" target="_blank" rel="noopener noreferrer" class="social-link">
                                    <i class="fab fa-<?php echo $platform; ?>"></i>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="footer-section">
                        <h4>Quick Links</h4>
                        <ul class="footer-links">
                            <?php foreach ($nav_menu as $title => $link): ?>
                                <li><a href="<?php echo $link; ?>"><?php echo $title; ?></a></li>
                            <?php endforeach; ?>
                            <li><a href="terms.php">Terms & Conditions</a></li>
                            <li><a href="#privacy">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <!-- Courses -->
                    <div class="footer-section">
                        <h4>Popular Courses</h4>
                        <ul class="footer-links">
                            <li><a href="#java">Java Programming</a></li>
                            <li><a href="#python">Python Development</a></li>
                            <li><a href="#javascript">JavaScript & Web Dev</a></li>
                            <li><a href="#dsa">Data Structures & Algorithms</a></li>
                            <li><a href="#sql">Database & SQL</a></li>
                            <li><a href="#cpp">C++ Programming</a></li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div class="footer-section">
                        <h4>Stay Updated</h4>
                        <p>Subscribe to our newsletter for the latest updates and interview tips.</p>
                        <form class="newsletter-form" id="newsletterForm">
                            <div class="input-group">
                                <input type="email" placeholder="Enter your email" required>
                                <button type="submit">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                        <div class="contact-info">
                            <p><i class="fas fa-envelope"></i> info@interviewprep.com</p>
                            <p><i class="fas fa-phone"></i> +1 (555) 123-4567</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Stats -->
                <div class="footer-stats">
                    <div class="stat-item">
                        <span class="stat-number" data-target="<?php echo $stats['total_learners']; ?>">0</span>
                        <span class="stat-label">Total Learners</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-target="<?php echo $stats['students_placed']; ?>">0</span>
                        <span class="stat-label">Students Placed</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-target="<?php echo $stats['courses_offered']; ?>">0</span>
                        <span class="stat-label">Courses Offered</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-target="<?php echo $stats['mock_interviews']; ?>">0</span>
                        <span class="stat-label">Mock Interviews</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
                    <p>Empowering careers through expert interview preparation.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript Files -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/carousel.js"></script>
</body>
</html>
