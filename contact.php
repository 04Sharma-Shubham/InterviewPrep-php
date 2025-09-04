<?php
$page_title = 'Contact Us';
require_once 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Contact Us</h1>
            <p>Get in touch with our team for support, partnerships, or any questions about our services</p>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="section">
    <div class="container">
        <div class="about-company">
            <div class="about-content animate-fade-in-left">
                <h2>Send Us a Message</h2>
                <p>Have questions about our courses, need technical support, or want to discuss partnership opportunities? We'd love to hear from you!</p>
                
                <form class="contact-form" id="contactForm" style="margin-top: 2rem;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                        <div class="form-group">
                            <label for="firstName" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-primary);">First Name *</label>
                            <input type="text" id="firstName" name="firstName" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md); font-size: 1rem; transition: var(--transition-normal);">
                        </div>
                        <div class="form-group">
                            <label for="lastName" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-primary);">Last Name *</label>
                            <input type="text" id="lastName" name="lastName" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md); font-size: 1rem; transition: var(--transition-normal);">
                        </div>
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-primary);">Email Address *</label>
                        <input type="email" id="email" name="email" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md); font-size: 1rem; transition: var(--transition-normal);">
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label for="phone" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-primary);">Phone Number</label>
                        <input type="tel" id="phone" name="phone" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md); font-size: 1rem; transition: var(--transition-normal);">
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label for="subject" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-primary);">Subject *</label>
                        <select id="subject" name="subject" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md); font-size: 1rem; background: white; transition: var(--transition-normal);">
                            <option value="">Select a subject</option>
                            <option value="course-inquiry">Course Inquiry</option>
                            <option value="technical-support">Technical Support</option>
                            <option value="billing">Billing & Payments</option>
                            <option value="partnership">Partnership Opportunities</option>
                            <option value="feedback">Feedback & Suggestions</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="message" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-primary);">Message *</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Please describe your inquiry in detail..." style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md); font-size: 1rem; font-family: inherit; resize: vertical; transition: var(--transition-normal);"></textarea>
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                            <input type="checkbox" id="newsletter" name="newsletter" style="margin: 0;">
                            <span style="font-size: 0.9rem; color: var(--text-secondary);">Subscribe to our newsletter for updates and interview tips</span>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        <span class="btn-text">Send Message</span>
                        <span class="btn-loading" style="display: none;">
                            <div class="spinner"></div>
                            Sending...
                        </span>
                    </button>
                </form>
            </div>
            
            <div class="about-images animate-fade-in-right">
                <div class="about-image" style="grid-column: 1 / -1;">
                    <div style="height: 400px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; padding: 2rem; border-radius: var(--radius-lg); position: relative;">
                        <div style="text-align: center;">
                            <div style="font-size: 4rem; margin-bottom: 1rem;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h3 style="margin-bottom: 1rem;">Get in Touch</h3>
                            <p style="opacity: 0.9; line-height: 1.6;">We typically respond to all inquiries within 24 hours. For urgent matters, please call us directly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section class="section bg-secondary">
    <div class="container">
        <div class="section-title">
            <h2>Get in Touch</h2>
            <p>Multiple ways to reach us for different types of inquiries</p>
        </div>
        <div class="courses-grid">
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="course-content">
                    <h3>Phone Support</h3>
                    <p style="margin-bottom: 1rem;">Speak directly with our support team for immediate assistance.</p>
                    <div style="color: var(--primary-color); font-weight: 600; margin-bottom: 0.5rem;">
                        <i class="fas fa-phone" style="margin-right: 0.5rem;"></i>
                        +1 (555) 123-4567
                    </div>
                    <div style="color: var(--text-secondary); font-size: 0.9rem;">
                        Mon-Fri: 9 AM - 6 PM PST<br>
                        Sat: 10 AM - 4 PM PST
                    </div>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="course-content">
                    <h3>Email Support</h3>
                    <p style="margin-bottom: 1rem;">Send us detailed inquiries and we'll respond within 24 hours.</p>
                    <div style="color: var(--primary-color); font-weight: 600; margin-bottom: 0.5rem;">
                        <i class="fas fa-envelope" style="margin-right: 0.5rem;"></i>
                        support@interviewprep.com
                    </div>
                    <div style="color: var(--text-secondary); font-size: 0.9rem;">
                        General inquiries & support<br>
                        Response time: 24 hours
                    </div>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="course-content">
                    <h3>Live Chat</h3>
                    <p style="margin-bottom: 1rem;">Get instant help with our live chat support during business hours.</p>
                    <div style="color: var(--primary-color); font-weight: 600; margin-bottom: 0.5rem;">
                        <i class="fas fa-comments" style="margin-right: 0.5rem;"></i>
                        Available on website
                    </div>
                    <div style="color: var(--text-secondary); font-size: 0.9rem;">
                        Mon-Fri: 9 AM - 6 PM PST<br>
                        Average response: 2 minutes
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Office Locations Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Our Offices</h2>
            <p>Visit us at our locations around the world</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">🏢 San Francisco HQ</h3>
                    <div style="text-align: left; color: var(--text-secondary); line-height: 1.8;">
                        <p><i class="fas fa-map-marker-alt" style="color: var(--primary-color); margin-right: 0.5rem;"></i>123 Tech Street, Suite 400<br>San Francisco, CA 94105</p>
                        <p><i class="fas fa-phone" style="color: var(--primary-color); margin-right: 0.5rem;"></i>+1 (555) 123-4567</p>
                        <p><i class="fas fa-clock" style="color: var(--primary-color); margin-right: 0.5rem;"></i>Mon-Fri: 9 AM - 6 PM PST</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">🌆 New York Office</h3>
                    <div style="text-align: left; color: var(--text-secondary); line-height: 1.8;">
                        <p><i class="fas fa-map-marker-alt" style="color: var(--primary-color); margin-right: 0.5rem;"></i>456 Innovation Ave, Floor 15<br>New York, NY 10001</p>
                        <p><i class="fas fa-phone" style="color: var(--primary-color); margin-right: 0.5rem;"></i>+1 (555) 987-6543</p>
                        <p><i class="fas fa-clock" style="color: var(--primary-color); margin-right: 0.5rem;"></i>Mon-Fri: 9 AM - 6 PM EST</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">🌍 London Office</h3>
                    <div style="text-align: left; color: var(--text-secondary); line-height: 1.8;">
                        <p><i class="fas fa-map-marker-alt" style="color: var(--primary-color); margin-right: 0.5rem;"></i>789 Canary Wharf<br>London E14 5AB, UK</p>
                        <p><i class="fas fa-phone" style="color: var(--primary-color); margin-right: 0.5rem;"></i>+44 20 7946 0958</p>
                        <p><i class="fas fa-clock" style="color: var(--primary-color); margin-right: 0.5rem;"></i>Mon-Fri: 9 AM - 6 PM GMT</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section bg-secondary">
    <div class="container">
        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
            <p>Quick answers to common questions about our services</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">How quickly will I receive a response?</h4>
                    <p>We aim to respond to all inquiries within 24 hours during business days. For urgent technical issues, our live chat provides immediate assistance during business hours.</p>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Do you offer refunds for courses?</h4>
                    <p>Yes, we offer a 30-day money-back guarantee for all our courses. If you're not satisfied with the content, contact us within 30 days of purchase for a full refund.</p>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Can I schedule a consultation call?</h4>
                    <p>Absolutely! We offer free 30-minute consultation calls to discuss your career goals and recommend the best learning path. Use our contact form to request a consultation.</p>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Do you provide corporate training?</h4>
                    <p>Yes, we offer customized corporate training programs for companies looking to upskill their development teams. Contact our partnerships team for more information.</p>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Is technical support available 24/7?</h4>
                    <p>Our live chat and phone support are available during business hours. For after-hours support, you can email us or submit a support ticket, and we'll respond first thing the next business day.</p>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">How can I become an instructor?</h4>
                    <p>We're always looking for experienced professionals to join our instructor team. If you have industry experience and a passion for teaching, please reach out through our contact form with your background and areas of expertise.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Media Section -->
<section class="section">
    <div class="container">
        <div class="text-center">
            <h2 style="margin-bottom: 1rem;">Follow Us on Social Media</h2>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; color: var(--text-secondary);">Stay updated with the latest interview tips, success stories, and platform updates</p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-bottom: 2rem;">
                <?php foreach ($social_links as $platform => $url): ?>
                    <a href="<?php echo $url; ?>" target="_blank" rel="noopener noreferrer" class="social-link" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="fab fa-<?php echo $platform; ?>"></i>
                    </a>
                <?php endforeach; ?>
            </div>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="courses.php" class="btn btn-primary">Explore Courses</a>
                <a href="mocks.php" class="btn btn-outline">Try Mock Interview</a>
            </div>
        </div>
    </div>
</section>

<script>
// Contact form handling
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const submitBtn = form.querySelector('button[type="submit"]');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');
    
    // Show loading state
    btnText.style.display = 'none';
    btnLoading.style.display = 'flex';
    submitBtn.disabled = true;
    
    // Simulate form submission
    setTimeout(() => {
        // Reset form
        form.reset();
        
        // Reset button state
        btnText.style.display = 'block';
        btnLoading.style.display = 'none';
        submitBtn.disabled = false;
        
        // Show success message
        showNotification('Thank you for your message! We\'ll get back to you within 24 hours.', 'success');
    }, 2000);
});

// Form field focus effects
document.querySelectorAll('input, select, textarea').forEach(field => {
    field.addEventListener('focus', function() {
        this.style.borderColor = 'var(--primary-color)';
        this.style.boxShadow = '0 0 0 3px rgba(37, 99, 235, 0.1)';
    });
    
    field.addEventListener('blur', function() {
        this.style.borderColor = 'var(--border-color)';
        this.style.boxShadow = 'none';
    });
});
</script>

<?php require_once 'includes/footer.php'; ?>
