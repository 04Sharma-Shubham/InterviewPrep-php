<?php
$page_title = 'Resources';
require_once 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Learning Resources</h1>
            <p>Comprehensive collection of tools, guides, and materials to accelerate your interview preparation</p>
            <div class="hero-buttons">
                <a href="#ide" class="btn btn-primary">Try Online IDE</a>
                <a href="#guides" class="btn btn-outline">Browse Guides</a>
            </div>
        </div>
    </div>
</section>

<!-- Online IDE Section -->
<section class="section" id="ide">
    <div class="container">
        <div class="section-title">
            <h2>Online Coding IDE</h2>
            <p>Practice coding with our powerful online IDE that supports multiple programming languages</p>
        </div>
        <div class="about-company">
            <div class="about-content animate-fade-in-left">
                <h3>Code Anywhere, Anytime</h3>
                <p>Our advanced online IDE provides a complete development environment in your browser. No setup required - start coding immediately with syntax highlighting, auto-completion, and real-time execution.</p>
                <div style="margin: 2rem 0;">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Supported Languages:</h4>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.5rem;">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fab fa-java" style="color: #f89820;"></i>
                            <span>Java</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fab fa-python" style="color: #3776ab;"></i>
                            <span>Python</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fab fa-js-square" style="color: #f7df1e;"></i>
                            <span>JavaScript</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-code" style="color: #00599c;"></i>
                            <span>C++</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-code" style="color: #239120;"></i>
                            <span>C#</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-database" style="color: #336791;"></i>
                            <span>SQL</span>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-primary">Launch IDE</a>
            </div>
            <div class="about-images animate-fade-in-right">
                <div class="about-image" style="grid-column: 1 / -1;">
                    <div style="height: 350px; background: linear-gradient(135deg, #1e1e1e 0%, #2d2d30 100%); display: flex; flex-direction: column; color: #d4d4d4; font-family: 'Courier New', monospace; font-size: 0.85rem; border-radius: var(--radius-lg); position: relative; overflow: hidden;">
                        <!-- IDE Header -->
                        <div style="background: #323233; padding: 0.5rem 1rem; display: flex; align-items: center; gap: 1rem; border-bottom: 1px solid #464647;">
                            <div style="display: flex; gap: 0.3rem;">
                                <div style="width: 12px; height: 12px; border-radius: 50%; background: #ff5f57;"></div>
                                <div style="width: 12px; height: 12px; border-radius: 50%; background: #ffbd2e;"></div>
                                <div style="width: 12px; height: 12px; border-radius: 50%; background: #28ca42;"></div>
                            </div>
                            <div style="color: #cccccc; font-size: 0.8rem;">main.py</div>
                        </div>
                        <!-- IDE Content -->
                        <div style="flex: 1; padding: 1rem; overflow: hidden;">
                            <div style="color: #608b4e;"># Binary Search Implementation</div>
                            <div style="color: #569cd6;">def</div>
                            <div style="color: #dcdcaa; margin-left: 1rem;">binary_search(arr, target):</div>
                            <div style="color: #9cdcfe; margin-left: 2rem;">left, right = 0, len(arr) - 1</div>
                            <div style="color: #c586c0; margin-left: 2rem;">while</div>
                            <div style="color: #9cdcfe; margin-left: 3rem;">left <= right:</div>
                            <div style="color: #9cdcfe; margin-left: 4rem;">mid = (left + right) // 2</div>
                            <div style="color: #c586c0; margin-left: 4rem;">if</div>
                            <div style="color: #9cdcfe; margin-left: 5rem;">arr[mid] == target:</div>
                            <div style="color: #c586c0; margin-left: 6rem;">return</div>
                            <div style="color: #9cdcfe; margin-left: 7rem;">mid</div>
                            <div style="color: #c586c0; margin-left: 4rem;">elif</div>
                            <div style="color: #9cdcfe; margin-left: 5rem;">arr[mid] < target:</div>
                            <div style="color: #9cdcfe; margin-left: 6rem;">left = mid + 1</div>
                            <div style="color: #c586c0; margin-left: 4rem;">else:</div>
                            <div style="color: #9cdcfe; margin-left: 5rem;">right = mid - 1</div>
                            <div style="color: #c586c0; margin-left: 2rem;">return</div>
                            <div style="color: #9cdcfe; margin-left: 3rem;">-1</div>
                        </div>
                        <!-- Run Button -->
                        <div style="position: absolute; bottom: 15px; right: 15px;">
                            <div style="background: var(--primary-color); color: white; padding: 0.5rem 1rem; border-radius: 4px; font-size: 0.8rem; display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-play"></i>
                                Run Code
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Study Guides Section -->
<section class="section bg-secondary" id="guides">
    <div class="container">
        <div class="section-title">
            <h2>Study Guides & Cheat Sheets</h2>
            <p>Quick reference materials and comprehensive guides for all major topics</p>
        </div>
        <div class="courses-grid">
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <i class="fas fa-list-alt"></i>
                </div>
                <div class="course-content">
                    <h3>Data Structures Cheat Sheet</h3>
                    <p>Quick reference for arrays, linked lists, stacks, queues, trees, graphs, and hash tables with time complexities.</p>
                    <a href="#" class="btn btn-primary">Download PDF</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="fas fa-calculator"></i>
                </div>
                <div class="course-content">
                    <h3>Algorithm Patterns Guide</h3>
                    <p>Common algorithmic patterns including two pointers, sliding window, dynamic programming, and backtracking.</p>
                    <a href="#" class="btn btn-primary">Download PDF</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <i class="fas fa-server"></i>
                </div>
                <div class="course-content">
                    <h3>System Design Primer</h3>
                    <p>Essential concepts for system design interviews including scalability, load balancing, and database design.</p>
                    <a href="#" class="btn btn-primary">Download PDF</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <i class="fab fa-java"></i>
                </div>
                <div class="course-content">
                    <h3>Java Interview Questions</h3>
                    <p>Top 100 Java interview questions covering OOP, collections, multithreading, and JVM concepts.</p>
                    <a href="#" class="btn btn-primary">Download PDF</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <i class="fab fa-python"></i>
                </div>
                <div class="course-content">
                    <h3>Python Quick Reference</h3>
                    <p>Python syntax, built-in functions, data structures, and common libraries used in technical interviews.</p>
                    <a href="#" class="btn btn-primary">Download PDF</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="course-content">
                    <h3>Behavioral Interview Guide</h3>
                    <p>STAR method framework, common behavioral questions, and sample answers for different scenarios.</p>
                    <a href="#" class="btn btn-primary">Download PDF</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Problem Sets Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Curated Problem Sets</h2>
            <p>Carefully selected problems organized by topic and difficulty level</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">🎯 Top 50 Must-Do Problems</h3>
                    <p style="margin-bottom: 1rem;">Essential problems that cover all major patterns and concepts</p>
                    <div style="text-align: left; color: var(--text-secondary); margin-bottom: 1rem;">
                        <p><strong>Difficulty:</strong> Mixed (Easy to Hard)</p>
                        <p><strong>Topics:</strong> Arrays, Strings, Trees, Graphs, DP</p>
                        <p><strong>Estimated Time:</strong> 2-3 weeks</p>
                    </div>
                    <a href="#" class="btn btn-primary">Start Solving</a>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">🏢 Company-Specific Problems</h3>
                    <p style="margin-bottom: 1rem;">Problems frequently asked at specific companies</p>
                    <div style="text-align: left; color: var(--text-secondary); margin-bottom: 1rem;">
                        <p><strong>Companies:</strong> Google, Amazon, Microsoft, Facebook</p>
                        <p><strong>Problems:</strong> 200+ tagged problems</p>
                        <p><strong>Updated:</strong> Monthly with new questions</p>
                    </div>
                    <a href="#" class="btn btn-primary">Browse by Company</a>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">⚡ Daily Coding Challenge</h3>
                    <p style="margin-bottom: 1rem;">New problem every day to keep your skills sharp</p>
                    <div style="text-align: left; color: var(--text-secondary); margin-bottom: 1rem;">
                        <p><strong>Format:</strong> One problem per day</p>
                        <p><strong>Difficulty:</strong> Adaptive based on performance</p>
                        <p><strong>Streak:</strong> Track your solving streak</p>
                    </div>
                    <a href="#" class="btn btn-primary">Join Challenge</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Tutorials Section -->
<section class="section bg-secondary">
    <div class="container">
        <div class="section-title">
            <h2>Video Tutorials</h2>
            <p>Step-by-step video explanations of complex concepts and problem-solving techniques</p>
        </div>
        <div class="courses-grid">
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <i class="fas fa-play-circle"></i>
                </div>
                <div class="course-content">
                    <h3>Dynamic Programming Masterclass</h3>
                    <p>Complete guide to dynamic programming with 20+ problems solved step by step.</p>
                    <div class="course-meta">
                        <span class="course-duration">
                            <i class="fas fa-clock"></i> 4 hours
                        </span>
                        <span class="course-level">
                            <i class="fas fa-video"></i> 15 videos
                        </span>
                    </div>
                    <a href="#" class="btn btn-primary">Watch Now</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="fas fa-play-circle"></i>
                </div>
                <div class="course-content">
                    <h3>Graph Algorithms Explained</h3>
                    <p>Visual explanations of BFS, DFS, Dijkstra's algorithm, and other graph traversal techniques.</p>
                    <div class="course-meta">
                        <span class="course-duration">
                            <i class="fas fa-clock"></i> 3 hours
                        </span>
                        <span class="course-level">
                            <i class="fas fa-video"></i> 12 videos
                        </span>
                    </div>
                    <a href="#" class="btn btn-primary">Watch Now</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <i class="fas fa-play-circle"></i>
                </div>
                <div class="course-content">
                    <h3>System Design Case Studies</h3>
                    <p>Real-world system design examples including designing Twitter, Uber, and Netflix.</p>
                    <div class="course-meta">
                        <span class="course-duration">
                            <i class="fas fa-clock"></i> 6 hours
                        </span>
                        <span class="course-level">
                            <i class="fas fa-video"></i> 8 videos
                        </span>
                    </div>
                    <a href="#" class="btn btn-primary">Watch Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tools & Utilities Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Interview Tools & Utilities</h2>
            <p>Helpful tools to enhance your interview preparation and practice sessions</p>
        </div>
        <div class="courses-grid">
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <i class="fas fa-stopwatch"></i>
                </div>
                <div class="course-content">
                    <h3>Coding Timer</h3>
                    <p>Practice solving problems within time constraints. Set custom timers for different problem types.</p>
                    <a href="#" class="btn btn-primary">Use Timer</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="course-content">
                    <h3>Progress Tracker</h3>
                    <p>Track your problem-solving progress, identify weak areas, and monitor improvement over time.</p>
                    <a href="#" class="btn btn-primary">View Progress</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <i class="fas fa-random"></i>
                </div>
                <div class="course-content">
                    <h3>Random Problem Generator</h3>
                    <p>Get random problems based on your skill level and preferred topics for varied practice.</p>
                    <a href="#" class="btn btn-primary">Generate Problem</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <i class="fas fa-microphone"></i>
                </div>
                <div class="course-content">
                    <h3>Voice Recorder</h3>
                    <p>Practice explaining your solutions out loud and review your communication skills.</p>
                    <a href="#" class="btn btn-primary">Start Recording</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="course-content">
                    <h3>Resume Builder</h3>
                    <p>Create a professional tech resume with our templates designed for software engineering roles.</p>
                    <a href="#" class="btn btn-primary">Build Resume</a>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                    <i class="fas fa-calculator"></i>
                </div>
                <div class="course-content">
                    <h3>Complexity Calculator</h3>
                    <p>Analyze time and space complexity of your algorithms with our interactive calculator.</p>
                    <a href="#" class="btn btn-primary">Calculate Complexity</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Community Resources Section -->
<section class="section bg-secondary">
    <div class="container">
        <div class="section-title">
            <h2>Community Resources</h2>
            <p>Connect with fellow learners and access community-driven content</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">💬 Discussion Forums</h3>
                    <p style="margin-bottom: 1rem;">Ask questions, share solutions, and learn from the community</p>
                    <div style="text-align: left; color: var(--text-secondary); margin-bottom: 1rem;">
                        <p><strong>Active Members:</strong> 25,000+</p>
                        <p><strong>Topics:</strong> All technical subjects</p>
                        <p><strong>Response Time:</strong> Usually within 2 hours</p>
                    </div>
                    <a href="#" class="btn btn-primary">Join Forums</a>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">👥 Study Groups</h3>
                    <p style="margin-bottom: 1rem;">Join or create study groups for collaborative learning</p>
                    <div style="text-align: left; color: var(--text-secondary); margin-bottom: 1rem;">
                        <p><strong>Active Groups:</strong> 500+</p>
                        <p><strong>Topics:</strong> Company-specific, Topic-based</p>
                        <p><strong>Format:</strong> Virtual meetups, pair programming</p>
                    </div>
                    <a href="#" class="btn btn-primary">Find Groups</a>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">📚 Resource Library</h3>
                    <p style="margin-bottom: 1rem;">Community-contributed resources, notes, and solutions</p>
                    <div style="text-align: left; color: var(--text-secondary); margin-bottom: 1rem;">
                        <p><strong>Resources:</strong> 1000+ documents</p>
                        <p><strong>Types:</strong> Notes, solutions, tips</p>
                        <p><strong>Quality:</strong> Peer-reviewed content</p>
                    </div>
                    <a href="#" class="btn btn-primary">Browse Library</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Free Resources CTA -->
<section class="section">
    <div class="container">
        <div class="text-center">
            <h2 style="margin-bottom: 1rem;">Start Learning Today</h2>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; color: var(--text-secondary);">Access our free resources and begin your interview preparation journey</p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="#" class="btn btn-primary">Access Free Resources</a>
                <a href="courses.php" class="btn btn-outline">Explore Premium Courses</a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
