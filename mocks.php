<?php
$page_title = 'Mock Interviews';
require_once 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Mock Interview Platform</h1>
            <p>Practice with real interview scenarios and get personalized feedback from industry experts</p>
            <div class="hero-buttons">
                <a href="#schedule" class="btn btn-primary">Schedule Mock Interview</a>
                <a href="#practice" class="btn btn-outline">Start Practice Session</a>
            </div>
        </div>
    </div>
</section>

<!-- Mock Interview Types Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Mock Interview Types</h2>
            <p>Choose from various interview formats to match your target company's process</p>
        </div>
        <div class="courses-grid">
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <i class="fas fa-code"></i>
                </div>
                <div class="course-content">
                    <h3>Technical Coding Interview</h3>
                    <p>Practice algorithmic problem-solving with live coding sessions. Get real-time feedback on your approach, code quality, and communication skills.</p>
                    <div class="course-meta">
                        <span class="course-duration">
                            <i class="fas fa-clock"></i> 45-60 mins
                        </span>
                        <span class="course-level">
                            <i class="fas fa-users"></i> 1-on-1
                        </span>
                    </div>
                    <a href="#schedule" class="btn btn-primary">Schedule Now</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="fas fa-server"></i>
                </div>
                <div class="course-content">
                    <h3>System Design Interview</h3>
                    <p>Design scalable systems with experienced architects. Learn to think at scale and communicate complex technical concepts effectively.</p>
                    <div class="course-meta">
                        <span class="course-duration">
                            <i class="fas fa-clock"></i> 60-90 mins
                        </span>
                        <span class="course-level">
                            <i class="fas fa-users"></i> 1-on-1
                        </span>
                    </div>
                    <a href="#schedule" class="btn btn-primary">Schedule Now</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="course-content">
                    <h3>Behavioral Interview</h3>
                    <p>Master the STAR method and practice common behavioral questions. Build confidence in storytelling and showcasing your experiences.</p>
                    <div class="course-meta">
                        <span class="course-duration">
                            <i class="fas fa-clock"></i> 30-45 mins
                        </span>
                        <span class="course-level">
                            <i class="fas fa-users"></i> 1-on-1
                        </span>
                    </div>
                    <a href="#schedule" class="btn btn-primary">Schedule Now</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <i class="fas fa-building"></i>
                </div>
                <div class="course-content">
                    <h3>Company-Specific Prep</h3>
                    <p>Tailored mock interviews based on specific company processes including Google, Amazon, Microsoft, Facebook, and more.</p>
                    <div class="course-meta">
                        <span class="course-duration">
                            <i class="fas fa-clock"></i> 60-120 mins
                        </span>
                        <span class="course-level">
                            <i class="fas fa-users"></i> 1-on-1
                        </span>
                    </div>
                    <a href="#schedule" class="btn btn-primary">Schedule Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Practice Platform Section -->
<section class="section bg-secondary" id="practice">
    <div class="container">
        <div class="section-title">
            <h2>Interactive Practice Platform</h2>
            <p>Practice coding problems and system design scenarios at your own pace</p>
        </div>
        <div class="about-company">
            <div class="about-content animate-fade-in-left">
                <h3>Coding Practice Arena</h3>
                <p>Access our extensive library of coding problems categorized by difficulty, topic, and company. Practice with our advanced IDE that supports multiple programming languages.</p>
                <div style="margin: 2rem 0;">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Features:</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.5rem;"><i class="fas fa-check" style="color: var(--accent-color); margin-right: 0.5rem;"></i> 1000+ curated coding problems</li>
                        <li style="margin-bottom: 0.5rem;"><i class="fas fa-check" style="color: var(--accent-color); margin-right: 0.5rem;"></i> Real-time code execution and testing</li>
                        <li style="margin-bottom: 0.5rem;"><i class="fas fa-check" style="color: var(--accent-color); margin-right: 0.5rem;"></i> Detailed solution explanations</li>
                        <li style="margin-bottom: 0.5rem;"><i class="fas fa-check" style="color: var(--accent-color); margin-right: 0.5rem;"></i> Performance analytics and tracking</li>
                        <li style="margin-bottom: 0.5rem;"><i class="fas fa-check" style="color: var(--accent-color); margin-right: 0.5rem;"></i> Company-tagged problems</li>
                    </ul>
                </div>
                <a href="#" class="btn btn-primary">Start Practicing</a>
            </div>
            <div class="about-images animate-fade-in-right">
                <div class="about-image" style="grid-column: 1 / -1;">
                    <div style="height: 300px; background: linear-gradient(135deg, #1e1e1e 0%, #2d2d30 100%); display: flex; align-items: center; justify-content: center; color: #00ff00; font-family: 'Courier New', monospace; font-size: 0.9rem; padding: 2rem; border-radius: var(--radius-lg); position: relative; overflow: hidden;">
                        <div style="text-align: left; width: 100%;">
                            <div style="color: #608b4e;">// Two Sum Problem</div>
                            <div style="color: #569cd6;">function</div>
                            <div style="color: #dcdcaa; margin-left: 1rem;">twoSum(nums, target) {</div>
                            <div style="color: #569cd6; margin-left: 2rem;">const</div>
                            <div style="color: #9cdcfe; margin-left: 3rem;">map = new Map();</div>
                            <div style="color: #c586c0; margin-left: 2rem;">for</div>
                            <div style="color: #9cdcfe; margin-left: 3rem;">(let i = 0; i < nums.length; i++) {</div>
                            <div style="color: #569cd6; margin-left: 4rem;">const</div>
                            <div style="color: #9cdcfe; margin-left: 5rem;">complement = target - nums[i];</div>
                            <div style="color: #c586c0; margin-left: 4rem;">if</div>
                            <div style="color: #9cdcfe; margin-left: 5rem;">(map.has(complement)) {</div>
                            <div style="color: #c586c0; margin-left: 6rem;">return</div>
                            <div style="color: #9cdcfe; margin-left: 7rem;">[map.get(complement), i];</div>
                            <div style="margin-left: 5rem;">}</div>
                            <div style="margin-left: 4rem;">}</div>
                            <div style="margin-left: 3rem;">}</div>
                            <div style="margin-left: 2rem;">}</div>
                            <div style="position: absolute; top: 10px; right: 15px; color: #007acc; font-size: 1.5rem;">
                                <i class="fas fa-play-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mock Interview Process Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>How Our Mock Interviews Work</h2>
            <p>A structured approach to help you succeed in real interviews</p>
        </div>
        <div class="courses-grid">
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div style="font-size: 2rem; font-weight: 700; color: white;">1</div>
                </div>
                <div class="course-content">
                    <h3>Schedule & Prepare</h3>
                    <p>Choose your interview type, select a time slot, and receive preparation materials tailored to your session.</p>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <div style="font-size: 2rem; font-weight: 700; color: white;">2</div>
                </div>
                <div class="course-content">
                    <h3>Live Interview Session</h3>
                    <p>Participate in a realistic interview with an experienced interviewer from top tech companies via video call.</p>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <div style="font-size: 2rem; font-weight: 700; color: white;">3</div>
                </div>
                <div class="course-content">
                    <h3>Detailed Feedback</h3>
                    <p>Receive comprehensive feedback on your performance, including strengths, areas for improvement, and actionable recommendations.</p>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <div style="font-size: 2rem; font-weight: 700; color: white;">4</div>
                </div>
                <div class="course-content">
                    <h3>Follow-up Support</h3>
                    <p>Get access to additional resources, practice problems, and optional follow-up sessions to address specific areas.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interviewer Profiles Section -->
<section class="section bg-secondary">
    <div class="container">
        <div class="section-title">
            <h2>Meet Our Expert Interviewers</h2>
            <p>Learn from professionals who have conducted hundreds of real interviews at top companies</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-author" style="margin-bottom: 1rem;">
                    <div class="author-avatar" style="background: linear-gradient(135deg, #667eea, #764ba2);">DK</div>
                    <div class="author-info">
                        <h4>David Kim</h4>
                        <p>Senior SDE at Google</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <p><strong>Specializes in:</strong> Algorithms, Data Structures, System Design</p>
                    <p><strong>Experience:</strong> 6+ years at Google, conducted 200+ interviews</p>
                    <p><strong>Rating:</strong> ⭐⭐⭐⭐⭐ (4.9/5 from 150+ sessions)</p>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-author" style="margin-bottom: 1rem;">
                    <div class="author-avatar" style="background: linear-gradient(135deg, #f093fb, #f5576c);">LW</div>
                    <div class="author-info">
                        <h4>Lisa Wang</h4>
                        <p>Principal Engineer at Amazon</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <p><strong>Specializes in:</strong> System Design, Leadership, Behavioral</p>
                    <p><strong>Experience:</strong> 8+ years at Amazon, 300+ interviews conducted</p>
                    <p><strong>Rating:</strong> ⭐⭐⭐⭐⭐ (4.8/5 from 200+ sessions)</p>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-author" style="margin-bottom: 1rem;">
                    <div class="author-avatar" style="background: linear-gradient(135deg, #4facfe, #00f2fe);">MS</div>
                    <div class="author-info">
                        <h4>Michael Smith</h4>
                        <p>Staff Engineer at Microsoft</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <p><strong>Specializes in:</strong> Frontend, Full-Stack, JavaScript</p>
                    <p><strong>Experience:</strong> 7+ years at Microsoft, 250+ interviews</p>
                    <p><strong>Rating:</strong> ⭐⭐⭐⭐⭐ (4.9/5 from 180+ sessions)</p>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-author" style="margin-bottom: 1rem;">
                    <div class="author-avatar" style="background: linear-gradient(135deg, #43e97b, #38f9d7);">AP</div>
                    <div class="author-info">
                        <h4>Anita Patel</h4>
                        <p>Engineering Manager at Facebook</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <p><strong>Specializes in:</strong> Leadership, Behavioral, Career Growth</p>
                    <p><strong>Experience:</strong> 5+ years at Facebook, 180+ interviews</p>
                    <p><strong>Rating:</strong> ⭐⭐⭐⭐⭐ (4.9/5 from 120+ sessions)</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Mock Interview Pricing</h2>
            <p>Flexible pricing options to fit your preparation needs and budget</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card" style="border: 2px solid var(--border-color);">
                <div class="testimonial-content text-center">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Single Session</h3>
                    <div style="font-size: 2rem; font-weight: 700; color: var(--secondary-color); margin-bottom: 1rem;">₹19999</div>
                    <p style="margin-bottom: 1.5rem;">Perfect for targeted practice</p>
                    <ul style="list-style: none; padding: 0; text-align: left; margin-bottom: 2rem;">
                        <li style="margin-bottom: 0.5rem;">✓ 45-60 minute session</li>
                        <li style="margin-bottom: 0.5rem;">✓ Expert interviewer</li>
                        <li style="margin-bottom: 0.5rem;">✓ Detailed feedback report</li>
                        <li style="margin-bottom: 0.5rem;">✓ Recording of session</li>
                        <li style="margin-bottom: 0.5rem;">✓ Follow-up resources</li>
                    </ul>
                    <a href="#schedule" class="btn btn-outline">Book Session</a>
                </div>
            </div>
            <div class="testimonial-card" style="border: 2px solid var(--primary-color); position: relative;">
                <div style="position: absolute; top: -15px; left: 50%; transform: translateX(-50%); background: var(--primary-color); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">MOST POPULAR</div>
                <div class="testimonial-content text-center">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Interview Package</h3>
                    <div style="font-size: 2rem; font-weight: 700; color: var(--secondary-color); margin-bottom: 1rem;">₹19999</div>
                    <p style="margin-bottom: 1.5rem;">Comprehensive preparation</p>
                    <ul style="list-style: none; padding: 0; text-align: left; margin-bottom: 2rem;">
                        <li style="margin-bottom: 0.5rem;">✓ 3 mock interview sessions</li>
                        <li style="margin-bottom: 0.5rem;">✓ Mix of technical & behavioral</li>
                        <li style="margin-bottom: 0.5rem;">✓ Progress tracking</li>
                        <li style="margin-bottom: 0.5rem;">✓ Priority scheduling</li>
                        <li style="margin-bottom: 0.5rem;">✓ Personalized study plan</li>
                        <li style="margin-bottom: 0.5rem;">✓ Save $38 vs individual</li>
                    </ul>
                    <a href="#schedule" class="btn btn-primary">Get Package</a>
                </div>
            </div>
            <div class="testimonial-card" style="border: 2px solid var(--secondary-color);">
                <div class="testimonial-content text-center">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Premium Prep</h3>
                    <div style="font-size: 2rem; font-weight: 700; color: var(--secondary-color); margin-bottom: 1rem;">₹29999</div>
                    <p style="margin-bottom: 1.5rem;">Complete interview mastery</p>
                    <ul style="list-style: none; padding: 0; text-align: left; margin-bottom: 2rem;">
                        <li style="margin-bottom: 0.5rem;">✓ 6 mock interview sessions</li>
                        <li style="margin-bottom: 0.5rem;">✓ All interview types covered</li>
                        <li style="margin-bottom: 0.5rem;">✓ 1-on-1 mentoring sessions</li>
                        <li style="margin-bottom: 0.5rem;">✓ Resume & LinkedIn review</li>
                        <li style="margin-bottom: 0.5rem;">✓ Salary negotiation guidance</li>
                        <li style="margin-bottom: 0.5rem;">✓ Job referral assistance</li>
                    </ul>
                    <a href="#schedule" class="btn" style="background: var(--secondary-color); color: white;">Go Premium</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Schedule Section -->
<section class="section bg-secondary" id="schedule">
    <div class="container">
        <div class="section-title">
            <h2>Schedule Your Mock Interview</h2>
            <p>Book a session with our expert interviewers and take the next step in your preparation</p>
        </div>
        <div class="about-company">
            <div class="about-content animate-fade-in-left">
                <h3>Ready to Practice?</h3>
                <p>Choose your preferred interview type, select an available time slot, and get matched with an expert interviewer who has experience at your target companies.</p>
                <div style="margin: 2rem 0;">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Available Time Slots:</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.5rem;"><i class="fas fa-clock" style="color: var(--accent-color); margin-right: 0.5rem;"></i> Weekdays: 9 AM - 9 PM (PST)</li>
                        <li style="margin-bottom: 0.5rem;"><i class="fas fa-clock" style="color: var(--accent-color); margin-right: 0.5rem;"></i> Weekends: 10 AM - 6 PM (PST)</li>
                        <li style="margin-bottom: 0.5rem;"><i class="fas fa-globe" style="color: var(--accent-color); margin-right: 0.5rem;"></i> Multiple timezone support</li>
                        <li style="margin-bottom: 0.5rem;"><i class="fas fa-calendar" style="color: var(--accent-color); margin-right: 0.5rem;"></i> Book up to 2 weeks in advance</li>
                    </ul>
                </div>
                <a href="#" class="btn btn-primary">Schedule Now</a>
            </div>
            <div class="about-images animate-fade-in-right">
                <div class="about-image" style="grid-column: 1 / -1;">
                    <div style="height: 300px; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); display: flex; align-items: center; justify-content: center; color: var(--text-primary); padding: 2rem; border-radius: var(--radius-lg); position: relative; border: 2px solid var(--border-color);">
                        <div style="text-align: center; width: 100%;">
                            <div style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <h3 style="margin-bottom: 1rem; color: var(--text-primary);">Book Your Session</h3>
                            <p style="color: var(--text-secondary); margin-bottom: 2rem;">Select your preferred date and time</p>
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5rem; max-width: 200px; margin: 0 auto;">
                                <div style="background: var(--primary-color); color: white; padding: 0.5rem; border-radius: 4px; font-size: 0.8rem;">Mon 15</div>
                                <div style="background: var(--bg-primary); border: 1px solid var(--border-color); padding: 0.5rem; border-radius: 4px; font-size: 0.8rem;">Tue 16</div>
                                <div style="background: var(--bg-primary); border: 1px solid var(--border-color); padding: 0.5rem; border-radius: 4px; font-size: 0.8rem;">Wed 17</div>
                                <div style="background: var(--bg-primary); border: 1px solid var(--border-color); padding: 0.5rem; border-radius: 4px; font-size: 0.8rem;">Thu 18</div>
                                <div style="background: var(--bg-primary); border: 1px solid var(--border-color); padding: 0.5rem; border-radius: 4px; font-size: 0.8rem;">Fri 19</div>
                                <div style="background: var(--bg-primary); border: 1px solid var(--border-color); padding: 0.5rem; border-radius: 4px; font-size: 0.8rem;">Sat 20</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Success Stories</h2>
            <p>Real results from students who practiced with our mock interview platform</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <p>"The mock interviews were incredibly realistic! My interviewer from Google gave me detailed feedback that helped me identify exactly what I needed to improve. I got the job after just 2 sessions!"</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">JD</div>
                    <div class="author-info">
                        <h4>John Davis</h4>
                        <p>Now at Google</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <p>"The system design mock interview was a game-changer. I learned how to structure my thoughts and communicate complex ideas clearly. Landed my dream job at Amazon!"</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">SM</div>
                    <div class="author-info">
                        <h4>Sarah Martinez</h4>
                        <p>Now at Amazon</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <p>"The behavioral interview practice helped me craft compelling stories using the STAR method. The feedback was invaluable and boosted my confidence significantly."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">RK</div>
                    <div class="author-info">
                        <h4>Raj Kumar</h4>
                        <p>Now at Microsoft</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
