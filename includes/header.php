<header class="header">
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a href="index.php" class="brand-link">
                    <i class="fas fa-film"></i>
                    <span>Indie Film Tracker</span>
                </a>
            </div>
            
            <div class="navbar-menu" id="navbarMenu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link <?php echo ($current_page == 'home') ? 'active' : ''; ?>">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="discover.php" class="nav-link <?php echo ($current_page == 'discover') ? 'active' : ''; ?>">
                            <i class="fas fa-search"></i>
                            <span>Discover Films</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="festivals.php" class="nav-link <?php echo ($current_page == 'festivals') ? 'active' : ''; ?>">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Festivals</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="watchlist.php" class="nav-link <?php echo ($current_page == 'watchlist') ? 'active' : ''; ?>">
                            <i class="fas fa-bookmark"></i>
                            <span>Watchlist</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link <?php echo ($current_page == 'about') ? 'active' : ''; ?>">
                            <i class="fas fa-info-circle"></i>
                            <span>About</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="navbar-actions">
                <div class="search-container">
                    <button class="search-toggle" id="searchToggle">
                        <i class="fas fa-search"></i>
                    </button>
                    <div class="search-dropdown" id="searchDropdown">
                        <input type="text" placeholder="Search films..." id="globalSearch" class="search-input">
                        <div class="search-results" id="searchResults"></div>
                    </div>
                </div>
                
                <button class="theme-toggle" id="themeToggle" title="Toggle theme">
                    <i class="fas fa-moon"></i>
                </button>
                
                <button class="mobile-menu-toggle" id="mobileMenuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>
</header>