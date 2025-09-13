<?php
// Sample data for Indie Film Tracker

// This week's screenings
$this_weeks_screenings = [
    [
        'title' => 'The Last Light',
        'director' => 'Sarah Chen',
        'poster' => 'assets/images/posters/last-light.jpg',
        'date' => 'Dec 15, 2024',
        'time' => '7:30 PM',
        'venue' => 'Downtown Cinema'
    ],
    [
        'title' => 'Urban Echoes',
        'director' => 'Marcus Rodriguez',
        'poster' => 'assets/images/posters/urban-echoes.jpg',
        'date' => 'Dec 16, 2024',
        'time' => '8:00 PM',
        'venue' => 'Art House Theater'
    ],
    [
        'title' => 'Silent Dreams',
        'director' => 'Elena Volkov',
        'poster' => 'assets/images/posters/silent-dreams.jpg',
        'date' => 'Dec 17, 2024',
        'time' => '6:45 PM',
        'venue' => 'Independent Film Center'
    ],
    [
        'title' => 'Digital Nomads',
        'director' => 'James Park',
        'poster' => 'assets/images/posters/digital-nomads.jpg',
        'date' => 'Dec 18, 2024',
        'time' => '7:15 PM',
        'venue' => 'Community Arts Center'
    ],
    [
        'title' => 'Night Shift',
        'director' => 'Maria Santos',
        'poster' => 'assets/images/posters/night-shift.jpg',
        'date' => 'Dec 19, 2024',
        'time' => '9:00 PM',
        'venue' => 'Midnight Cinema'
    ]
];

// Upcoming festivals
$upcoming_festivals = [
    [
        'name' => 'Sundance Film Festival',
        'location' => 'Park City, UT',
        'month' => 'Jan',
        'day' => '18',
        'type' => 'Major Festival'
    ],
    [
        'name' => 'SXSW Film Festival',
        'location' => 'Austin, TX',
        'month' => 'Mar',
        'day' => '08',
        'type' => 'Major Festival'
    ],
    [
        'name' => 'Tribeca Film Festival',
        'location' => 'New York, NY',
        'month' => 'Apr',
        'day' => '15',
        'type' => 'Major Festival'
    ],
    [
        'name' => 'Cannes Film Festival',
        'location' => 'Cannes, France',
        'month' => 'May',
        'day' => '14',
        'type' => 'International'
    ],
    [
        'name' => 'Toronto International Film Festival',
        'location' => 'Toronto, Canada',
        'month' => 'Sep',
        'day' => '05',
        'type' => 'International'
    ]
];

// Sample films data
$films_data = [
    [
        'id' => 1,
        'title' => 'The Last Light',
        'director' => 'Sarah Chen',
        'year' => 2024,
        'runtime' => '98 min',
        'genre' => 'Drama',
        'country' => 'USA',
        'poster' => 'assets/images/posters/last-light.jpg',
        'description' => 'A poignant story about loss, hope, and the power of human connection in the face of adversity.',
        'rating' => 4.5,
        'status' => 'released'
    ],
    [
        'id' => 2,
        'title' => 'Urban Echoes',
        'director' => 'Marcus Rodriguez',
        'year' => 2024,
        'runtime' => '112 min',
        'genre' => 'Thriller',
        'country' => 'USA',
        'poster' => 'assets/images/posters/urban-echoes.jpg',
        'description' => 'A gripping thriller set in the heart of the city, exploring themes of identity and survival.',
        'rating' => 4.2,
        'status' => 'released'
    ],
    [
        'id' => 3,
        'title' => 'Silent Dreams',
        'director' => 'Elena Volkov',
        'year' => 2023,
        'runtime' => '89 min',
        'genre' => 'Romance',
        'country' => 'Russia',
        'poster' => 'assets/images/posters/silent-dreams.jpg',
        'description' => 'A beautiful love story that transcends language barriers and cultural differences.',
        'rating' => 4.7,
        'status' => 'released'
    ],
    [
        'id' => 4,
        'title' => 'Digital Nomads',
        'director' => 'James Park',
        'year' => 2024,
        'runtime' => '105 min',
        'genre' => 'Comedy',
        'country' => 'South Korea',
        'poster' => 'assets/images/posters/digital-nomads.jpg',
        'description' => 'A hilarious comedy about modern work culture and the pursuit of freedom.',
        'rating' => 4.0,
        'status' => 'released'
    ],
    [
        'id' => 5,
        'title' => 'Night Shift',
        'director' => 'Maria Santos',
        'year' => 2024,
        'runtime' => '95 min',
        'genre' => 'Horror',
        'country' => 'Mexico',
        'poster' => 'assets/images/posters/night-shift.jpg',
        'description' => 'A spine-chilling horror film that explores the darkness that comes with the night.',
        'rating' => 4.3,
        'status' => 'released'
    ],
    [
        'id' => 6,
        'title' => 'Mountain Pass',
        'director' => 'David Kim',
        'year' => 2023,
        'runtime' => '127 min',
        'genre' => 'Adventure',
        'country' => 'Canada',
        'poster' => 'assets/images/posters/mountain-pass.jpg',
        'description' => 'An epic adventure story about overcoming obstacles and finding inner strength.',
        'rating' => 4.6,
        'status' => 'released'
    ],
    [
        'id' => 7,
        'title' => 'Coffee Shop Chronicles',
        'director' => 'Anna Thompson',
        'year' => 2024,
        'runtime' => '82 min',
        'genre' => 'Comedy',
        'country' => 'USA',
        'poster' => 'assets/images/posters/coffee-shop.jpg',
        'description' => 'A heartwarming comedy about the lives that intersect in a small coffee shop.',
        'rating' => 4.1,
        'status' => 'released'
    ],
    [
        'id' => 8,
        'title' => 'The Forgotten City',
        'director' => 'Ahmed Hassan',
        'year' => 2023,
        'runtime' => '118 min',
        'genre' => 'Drama',
        'country' => 'Egypt',
        'poster' => 'assets/images/posters/forgotten-city.jpg',
        'description' => 'A powerful drama about memory, history, and the stories we choose to remember.',
        'rating' => 4.8,
        'status' => 'released'
    ],
    [
        'id' => 9,
        'title' => 'Electric Dreams',
        'director' => 'Lisa Wang',
        'year' => 2024,
        'runtime' => '103 min',
        'genre' => 'Sci-Fi',
        'country' => 'China',
        'poster' => 'assets/images/posters/electric-dreams.jpg',
        'description' => 'A thought-provoking sci-fi film about technology and human consciousness.',
        'rating' => 4.4,
        'status' => 'released'
    ],
    [
        'id' => 10,
        'title' => 'The Last Dance',
        'director' => 'Carlos Mendez',
        'year' => 2023,
        'runtime' => '91 min',
        'genre' => 'Romance',
        'country' => 'Spain',
        'poster' => 'assets/images/posters/last-dance.jpg',
        'description' => 'A passionate romance set against the backdrop of flamenco culture.',
        'rating' => 4.5,
        'status' => 'released'
    ],
    [
        'id' => 11,
        'title' => 'Underground',
        'director' => 'Sophie Laurent',
        'year' => 2024,
        'runtime' => '109 min',
        'genre' => 'Thriller',
        'country' => 'France',
        'poster' => 'assets/images/posters/underground.jpg',
        'description' => 'A tense thriller that takes place in the Paris metro system.',
        'rating' => 4.2,
        'status' => 'released'
    ],
    [
        'id' => 12,
        'title' => 'Desert Winds',
        'director' => 'Omar Al-Rashid',
        'year' => 2023,
        'runtime' => '96 min',
        'genre' => 'Drama',
        'country' => 'UAE',
        'poster' => 'assets/images/posters/desert-winds.jpg',
        'description' => 'A moving drama about family, tradition, and the winds of change.',
        'rating' => 4.7,
        'status' => 'released'
    ]
];

// Festivals data
$festivals_data = [
    [
        'id' => 1,
        'name' => 'Sundance Film Festival',
        'location' => 'Park City, Utah, USA',
        'start_date' => '2025-01-18',
        'end_date' => '2025-01-28',
        'type' => 'Major Festival',
        'website' => 'https://festival.sundance.org',
        'description' => 'The premier showcase for independent films, featuring the best in American and international cinema.',
        'ticket_link' => 'https://festival.sundance.org/tickets'
    ],
    [
        'id' => 2,
        'name' => 'SXSW Film Festival',
        'location' => 'Austin, Texas, USA',
        'start_date' => '2025-03-08',
        'end_date' => '2025-03-16',
        'type' => 'Major Festival',
        'website' => 'https://www.sxsw.com/festivals/film/',
        'description' => 'A convergence of film, music, and interactive media in the heart of Texas.',
        'ticket_link' => 'https://www.sxsw.com/attend/'
    ],
    [
        'id' => 3,
        'name' => 'Tribeca Film Festival',
        'location' => 'New York, New York, USA',
        'start_date' => '2025-04-15',
        'end_date' => '2025-04-26',
        'type' => 'Major Festival',
        'website' => 'https://www.tribecafilm.com',
        'description' => 'Celebrating independent filmmaking in the cultural capital of the world.',
        'ticket_link' => 'https://www.tribecafilm.com/tickets'
    ],
    [
        'id' => 4,
        'name' => 'Cannes Film Festival',
        'location' => 'Cannes, France',
        'start_date' => '2025-05-14',
        'end_date' => '2025-05-25',
        'type' => 'International',
        'website' => 'https://www.festival-cannes.com',
        'description' => 'The most prestigious film festival in the world, showcasing the finest in international cinema.',
        'ticket_link' => 'https://www.festival-cannes.com/en/attend/'
    ],
    [
        'id' => 5,
        'name' => 'Toronto International Film Festival',
        'location' => 'Toronto, Ontario, Canada',
        'start_date' => '2025-09-05',
        'end_date' => '2025-09-15',
        'type' => 'International',
        'website' => 'https://www.tiff.net',
        'description' => 'One of the largest public film festivals in the world, celebrating diverse voices in cinema.',
        'ticket_link' => 'https://www.tiff.net/tickets'
    ],
    [
        'id' => 6,
        'name' => 'Berlin International Film Festival',
        'location' => 'Berlin, Germany',
        'start_date' => '2025-02-06',
        'end_date' => '2025-02-16',
        'type' => 'International',
        'website' => 'https://www.berlinale.de',
        'description' => 'The Berlinale is one of the world\'s leading film festivals and most important media events.',
        'ticket_link' => 'https://www.berlinale.de/en/tickets/'
    ],
    [
        'id' => 7,
        'name' => 'Venice Film Festival',
        'location' => 'Venice, Italy',
        'start_date' => '2025-08-27',
        'end_date' => '2025-09-06',
        'type' => 'International',
        'website' => 'https://www.labiennale.org/en/cinema',
        'description' => 'The oldest film festival in the world, celebrating artistic excellence in cinema.',
        'ticket_link' => 'https://www.labiennale.org/en/cinema/tickets'
    ],
    [
        'id' => 8,
        'name' => 'Telluride Film Festival',
        'location' => 'Telluride, Colorado, USA',
        'start_date' => '2025-08-29',
        'end_date' => '2025-09-01',
        'type' => 'Major Festival',
        'website' => 'https://www.telluridefilmfestival.org',
        'description' => 'A celebration of film in the beautiful mountain setting of Telluride.',
        'ticket_link' => 'https://www.telluridefilmfestival.org/tickets'
    ]
];

// Get unique values for filters
$genres = array_unique(array_column($films_data, 'genre'));
$years = array_unique(array_column($films_data, 'year'));
$countries = array_unique(array_column($films_data, 'country'));

// Sort arrays
sort($genres);
rsort($years);
sort($countries);
?>