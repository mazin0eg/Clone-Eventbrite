<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - Events</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6D28D9',
                        secondary: '#1E40AF',
                        accent: '#DB2777',
                        background: '#1F2937',
                        inputBg: '#374151',
                        textColor: '#F3F4F6',
                    },
                },
            },
        };
    </script>
</head>
<body class="bg-background min-h-screen">
       <!-- Navigation -->
<nav class="bg-background fixed top-0 w-full h-20 flex justify-between items-center bg-gradient-to-b from-black/60 to-transparent z-50 px-4 md:px-8">
    <!-- Logo -->
    <div class="text-white text-2xl font-semibold">
        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="40" viewBox="0 0 120 40" fill="none">
            <path d="M10 20C10 14.4772 14.4772 10 20 10H100C105.523 10 110 14.4772 110 20V20C110 25.5228 105.523 30 100 30H20C14.4772 30 10 25.5228 10 20V20Z" fill="#6D28D9"/>
            <text x="20" y="28" font-family="Arial" font-size="20" fill="#FFFFFF">Evento</text>
        </svg>
    </div>

    <!-- Navigation Menu -->
    <div class="flex items-center space-x-6">
    <a href="home.php" class="text-textColor hover:text-accent transition-all flex items-center gap-2">
            <i class='bx bx-home-alt'></i>Home
        </a>
        <a href="Event.php" class="text-accent hover:text-accent transition-all flex items-center gap-2">
            <i class='bx bx-calendar-event'></i>Events
        </a>
        <a href="ticket.php" class="text-textColor hover:text-accent transition-all flex items-center gap-2">
            <i class='bx bx-ticket'></i>Tickets
        </a>
        <!-- Auth Section -->
        <div class="relative ml-4">
            <!-- Sign In Button (Visible when logged out) -->
            <a href="login.html" id="signInBtn" class="px-4 py-2 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor transition-all flex items-center gap-2">
                <i class='bx bx-log-in'></i>Sign In
            </a>

            <!-- Profile Section (Hidden by default) -->
            <div id="profileSection" class="hidden">
                <button id="profileBtn" class="flex items-center gap-3 p-2 rounded-full hover:bg-primary/20 transition-all">
                    <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-accent">
                    <span class="text-textColor">John Doe</span>
                    <i class='bx bx-chevron-down text-textColor' id="arrowIcon"></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-inputBg rounded-xl shadow-lg py-1 hidden">
                    <a href="profile.php" class="block px-4 py-2 text-sm text-textColor hover:bg-primary/20 transition-all flex items-center gap-2">
                        <i class='bx bx-user'></i>Profile
                    </a>
                    <button id="logoutBtn" class="w-full text-left px-4 py-2 text-sm text-accent hover:bg-primary/20 transition-all flex items-center gap-2">
                        <i class='bx bx-log-out'></i>Logout
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <div class="pt-24 px-4 md:px-8">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Sidebar Filters -->
            <aside class="md:w-64 space-y-6">
                <!-- Search -->
                <div class="bg-inputBg rounded-xl p-4">
                    <div class="relative">
                        <input type="text" placeholder="Search events..." class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor/70 outline-none hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                        <i class='bx bx-search absolute left-3 top-2.5 text-textColor/70'></i>
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-inputBg rounded-xl p-4">
                    <h3 class="text-lg font-semibold text-textColor mb-4">Categories</h3>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-textColor cursor-pointer hover:text-accent transition-colors">
                            <input type="checkbox" class="rounded bg-primary/20 border-none focus:ring-2 ring-accent">
                            Music
                        </label>
                        <label class="flex items-center gap-2 text-textColor cursor-pointer hover:text-accent transition-colors">
                            <input type="checkbox" class="rounded bg-primary/20 border-none focus:ring-2 ring-accent">
                            Technology
                        </label>
                        <label class="flex items-center gap-2 text-textColor cursor-pointer hover:text-accent transition-colors">
                            <input type="checkbox" class="rounded bg-primary/20 border-none focus:ring-2 ring-accent">
                            Sports
                        </label>
                        <label class="flex items-center gap-2 text-textColor cursor-pointer hover:text-accent transition-colors">
                            <input type="checkbox" class="rounded bg-primary/20 border-none focus:ring-2 ring-accent">
                            Arts
                        </label>
                    </div>
                </div>

                <!-- Price Range -->
                <div class="bg-inputBg rounded-xl p-4">
                    <h3 class="text-lg font-semibold text-textColor mb-4">Price Range</h3>
                    <input type="range" min="0" max="1000" class="w-full h-2 bg-primary/20 rounded-lg appearance-none cursor-pointer">
                    <div class="flex justify-between text-textColor/70 text-sm mt-2">
                        <span>$0</span>
                        <span>$1000</span>
                    </div>
                </div>

                <!-- Date Filter -->
                <div class="bg-inputBg rounded-xl p-4">
                    <h3 class="text-lg font-semibold text-textColor mb-4">Date</h3>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-textColor cursor-pointer hover:text-accent transition-colors">
                            <input type="radio" name="date" class="bg-primary/20 border-none focus:ring-2 ring-accent">
                            Today
                        </label>
                        <label class="flex items-center gap-2 text-textColor cursor-pointer hover:text-accent transition-colors">
                            <input type="radio" name="date" class="bg-primary/20 border-none focus:ring-2 ring-accent">
                            This Week
                        </label>
                        <label class="flex items-center gap-2 text-textColor cursor-pointer hover:text-accent transition-colors">
                            <input type="radio" name="date" class="bg-primary/20 border-none focus:ring-2 ring-accent">
                            This Month
                        </label>
                    </div>
                </div>
            </aside>

            <!-- Events Grid -->
            <main class="flex-1">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Event Cards (12 cards for example) -->
                    <!-- Event Card Template (repeated 12 times) -->
                    <div class="bg-inputBg rounded-xl overflow-hidden group hover:transform hover:scale-[1.02] transition-all">
                        <div class="relative">
                            <img src="/api/placeholder/400/200" alt="Event" class="w-full h-48 object-cover">
                            <span class="absolute top-4 right-4 px-3 py-1 rounded-full bg-primary/90 text-white text-sm">Music</span>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-semibold text-textColor">Concert Night</h3>
                                <span class="px-3 py-1 rounded-full bg-primary/20 text-accent text-sm">$49.99</span>
                            </div>
                            <p class="text-textColor/70 text-sm mb-4">Live music performance</p>
                            <div class="flex items-center gap-2 text-textColor/60 text-sm mb-4">
                                <i class='bx bx-calendar'></i>
                                <span>Dec 15, 2024</span>
                                <i class='bx bx-map ml-2'></i>
                                <span>Music Hall</span>
                            </div>
                           <a href="detail.php"><button class="w-full py-2 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor transition-all">Get Tickets</button></a> 
                        </div>
                    </div>
                    <!-- Repeat event card 11 more times -->
                </div>

                <!-- Pagination -->
                <div class="flex justify-center items-center gap-2 mt-8">
                    <button class="w-10 h-10 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor flex items-center justify-center transition-all">
                        <i class='bx bx-chevron-left'></i>
                    </button>
                    <button class="w-10 h-10 rounded-full bg-primary text-textColor flex items-center justify-center">1</button>
                    <button class="w-10 h-10 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor flex items-center justify-center transition-all">2</button>
                    <button class="w-10 h-10 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor flex items-center justify-center transition-all">3</button>
                    <button class="w-10 h-10 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor flex items-center justify-center transition-all">
                        <i class='bx bx-chevron-right'></i>
                    </button>
                </div>
            </main>
        </div>
    </div>
<!-- Footer -->
<footer class="bg-black/40 text-textColor py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo and Description -->
            <div class="col-span-1 md:col-span-2">
             <a href="home.php"><svg xmlns="http://www.w3.org/2000/svg" width="120" height="40" viewBox="0 0 120 40" fill="none">
                    <path d="M10 20C10 14.4772 14.4772 10 20 10H100C105.523 10 110 14.4772 110 20V20C110 25.5228 105.523 30 100 30H20C14.4772 30 10 25.5228 10 20V20Z" fill="#6D28D9"/>
                    <text x="20" y="28" font-family="Arial" font-size="20" fill="#FFFFFF">Evento</text>
                </svg></a>   
                <p class="mt-4 text-textColor/70">Discover and book amazing events happening around you. Join our community of event enthusiasts.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-textColor/70 hover:text-accent">About Us</a></li>
                    <li><a href="#" class="text-textColor/70 hover:text-accent">Contact</a></li>
                    <li><a href="#" class="text-textColor/70 hover:text-accent">FAQs</a></li>
                    <li><a href="#" class="text-textColor/70 hover:text-accent">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                <ul class="space-y-2">
                    <li class="flex items-center gap-2">
                        <i class='bx bx-envelope text-accent'></i>
                        <a href="mailto:info@evento.com" class="text-textColor/70 hover:text-accent">info@evento.com</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class='bx bx-phone text-accent'></i>
                        <a href="tel:+1234567890" class="text-textColor/70 hover:text-accent">+1 (234) 567-890</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class='bx bx-map text-accent'></i>
                        <span class="text-textColor/70">123 Event Street, City</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Social Links & Copyright -->
        <div class="mt-8 pt-8 border-t border-textColor/10 flex flex-col md:flex-row justify-between items-center">
            <div class="flex space-x-4 mb-4 md:mb-0">
                <a href="#" class="text-textColor/70 hover:text-accent text-xl"><i class='bx bxl-facebook'></i></a>
                <a href="#" class="text-textColor/70 hover:text-accent text-xl"><i class='bx bxl-twitter'></i></a>
                <a href="#" class="text-textColor/70 hover:text-accent text-xl"><i class='bx bxl-instagram'></i></a>
                <a href="#" class="text-textColor/70 hover:text-accent text-xl"><i class='bx bxl-linkedin'></i></a>
            </div>
            <p class="text-textColor/70 text-sm">© 2024 Evento. All rights reserved.</p>
        </div>
    </div>
</footer>
    <script>
        function toggleMenu() {
            const menu = document.getElementById('navMenu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('flex');
            menu.classList.toggle('flex-col');
            menu.classList.toggle('absolute');
            menu.classList.toggle('top-20');
            menu.classList.toggle('left-0');
            menu.classList.toggle('w-full');
            menu.classList.toggle('bg-primary/20');
            menu.classList.toggle('backdrop-blur-lg');
            menu.classList.toggle('p-4');
        }

        function logout() {
            // Add logout logic here
            alert('Logging out...');
        }
        document.addEventListener('DOMContentLoaded', function() {
    // Get DOM elements
    const signInBtn = document.getElementById('signInBtn');
    const profileSection = document.getElementById('profileSection');
    const profileBtn = document.getElementById('profileBtn');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const logoutBtn = document.getElementById('logoutBtn');
    const arrowIcon = document.getElementById('arrowIcon');

    // For testing - set to true to show profile section
    let isLoggedIn = true; // Change to false for production

    // Update UI based on login state
    function updateUI() {
        if (isLoggedIn) {
            signInBtn.classList.add('hidden');
            profileSection.classList.remove('hidden');
        } else {
            signInBtn.classList.remove('hidden');
            profileSection.classList.add('hidden');
            dropdownMenu.classList.add('hidden');
        }
    }

    // Toggle dropdown
    profileBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdownMenu.classList.toggle('hidden');
        arrowIcon.classList.toggle('rotate-180');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!profileBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.add('hidden');
            arrowIcon.classList.remove('rotate-180');
        }
    });

    // Handle logout
    logoutBtn.addEventListener('click', function() {
        isLoggedIn = false;
        updateUI();
        // Add your logout logic here
        window.location.href = 'login.html';
    });

    // Initial UI setup
    updateUI();
});
    </script>
</body>
</html>