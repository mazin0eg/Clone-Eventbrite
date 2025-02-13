<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - Tickets</title>
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
        <a href="Event.php" class="text-textColor hover:text-accent transition-all flex items-center gap-2">
            <i class='bx bx-calendar-event'></i>Events
        </a>
        <a href="ticket.php" class="text-accent hover:text-accent transition-all flex items-center gap-2">
            <i class='bx bx-ticket'></i>Tickets
        </a>

        <!-- Auth Section -->
        <div class="relative ml-4">
            <!-- Sign In Button (Visible when logged out) -->
            <a href="login.php" id="signInBtn" class="px-4 py-2 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor transition-all flex items-center gap-2">
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
        <!-- Tickets Section -->
        <div class="max-w-6xl mx-auto">
            <!-- Search and Filter Bar -->
            <div class="bg-inputBg rounded-xl p-4 mb-6">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="relative flex-1">
                        <input type="text" placeholder="Search tickets..." class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor/70 outline-none hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                        <i class='bx bx-search absolute left-3 top-2.5 text-textColor/70'></i>
                    </div>
                    <div class="flex gap-4">
                        <select class="h-10 px-4 rounded-full bg-primary/20 text-textColor outline-none hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                            <option value="">Sort by</option>
                            <option value="date">Date</option>
                            <option value="price">Price</option>
                            <option value="name">Name</option>
                        </select>
                        <button class="px-4 h-10 rounded-full bg-accent text-white hover:bg-accent/90 transition-all">
                            Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tickets List -->
            <div class="space-y-4">
                <!-- Ticket Item -->
                <div class="bg-inputBg rounded-xl p-4 hover:transform hover:scale-[1.01] transition-all">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
                        <img src="/api/placeholder/120/120" alt="Event" class="w-24 h-24 rounded-lg object-cover">
                        <div class="flex-1">
                            <div class="flex flex-col md:flex-row md:items-center gap-2 mb-2">
                                <h3 class="text-xl font-semibold text-textColor">Summer Music Festival</h3>
                                <span class="px-3 py-1 rounded-full bg-primary/20 text-accent text-sm">VIP Pass</span>
                            </div>
                            <div class="flex flex-wrap gap-4 text-textColor/70 text-sm">
                                <div class="flex items-center gap-2">
                                    <i class='bx bx-calendar'></i>
                                    <span>Dec 15, 2024</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class='bx bx-time'></i>
                                    <span>8:00 PM</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class='bx bx-map'></i>
                                    <span>Central Park</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-end gap-2">
                            <span class="text-2xl font-bold text-accent">$99.99</span>
                            <button class="px-6 py-2 rounded-full bg-primary hover:bg-primary/90 text-white transition-all">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- More Ticket Items (duplicated for demonstration) -->
                <div class="bg-inputBg rounded-xl p-4 hover:transform hover:scale-[1.01] transition-all">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
                        <img src="/api/placeholder/120/120" alt="Event" class="w-24 h-24 rounded-lg object-cover">
                        <div class="flex-1">
                            <div class="flex flex-col md:flex-row md:items-center gap-2 mb-2">
                                <h3 class="text-xl font-semibold text-textColor">Tech Conference 2024</h3>
                                <span class="px-3 py-1 rounded-full bg-primary/20 text-accent text-sm">Early Bird</span>
                            </div>
                            <div class="flex flex-wrap gap-4 text-textColor/70 text-sm">
                                <div class="flex items-center gap-2">
                                    <i class='bx bx-calendar'></i>
                                    <span>Dec 20, 2024</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class='bx bx-time'></i>
                                    <span>9:00 AM</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class='bx bx-map'></i>
                                    <span>Convention Center</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-end gap-2">
                            <span class="text-2xl font-bold text-accent">$149.99</span>
                            <button class="px-6 py-2 rounded-full bg-primary hover:bg-primary/90 text-white transition-all">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
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
        </div>
    </div>

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