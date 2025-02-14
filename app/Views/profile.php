<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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
    <nav
        class="bg-background fixed top-0 w-full h-20 flex justify-between items-center bg-gradient-to-b from-black/60 to-transparent z-50 px-4 md:px-8">
        <!-- Logo -->
        <div class="text-white text-2xl font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="40" viewBox="0 0 120 40" fill="none">
                <path
                    d="M10 20C10 14.4772 14.4772 10 20 10H100C105.523 10 110 14.4772 110 20V20C110 25.5228 105.523 30 100 30H20C14.4772 30 10 25.5228 10 20V20Z"
                    fill="#6D28D9" />
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
            <a href="ticket.php" class="text-textColor hover:text-accent transition-all flex items-center gap-2">
                <i class='bx bx-ticket'></i>Tickets
            </a>

            <!-- Auth Section -->
            <div class="relative ml-4">
                <!-- Sign In Button (Visible when logged out) -->
                <a href="login.html" id="signInBtn"
                    class="px-4 py-2 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor transition-all flex items-center gap-2">
                    <i class='bx bx-log-in'></i>Sign In
                </a>

                <!-- Profile Section (Hidden by default) -->
                <div id="profileSection" class="hidden">
                    <button id="profileBtn"
                        class="flex items-center gap-3 p-2 rounded-full hover:bg-primary/20 transition-all">
                        <img src="<?= ROOTURL .  ?>" alt="Profile"
                            class="w-10 h-10 rounded-full object-cover border-2 border-accent">
                        <span class="text-textColor">John Doe</span>
                        <i class='bx bx-chevron-down text-textColor' id="arrowIcon"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu"
                        class="absolute right-0 mt-2 w-48 bg-inputBg rounded-xl shadow-lg py-1 hidden">
                        <button id="logoutBtn"
                            class="w-full text-left px-4 py-2 text-sm text-accent hover:bg-primary/20 transition-all flex items-center gap-2">
                            <i class='bx bx-log-out'></i>Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="min-h-screen bg-black/40">


        <!-- Profile Section -->
        <div class="flex flex-col items-center pt-24">
            <div class="relative w-32 h-32 rounded-full overflow-hidden border-4 border-primary">
                <img src="profile-placeholder.png" alt="Profile Picture" class="w-full h-full object-cover">
                <label for="avatar"
                    class="absolute inset-0 flex items-center justify-center bg-black/50 opacity-0 hover:opacity-100 transition-opacity cursor-pointer">
                    <i class="bx bx-camera text-white text-2xl"></i>
                </label>
                <input type="file" id="avatar" class="hidden" accept="image/*">
            </div>
            <h2 class="text-textColor text-2xl font-semibold mt-4">John Doe</h2>
            <p class="text-textColor/70 text-sm">john.doe@example.com</p>
        </div>

        <!-- Profile Info -->
        <div class="max-w-lg mx-auto mt-8 p-6 bg-inputBg rounded-lg shadow-lg">
            <h3 class="text-textColor text-lg font-semibold mb-4">Profile Information</h3>
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <i class='bx bx-user text-textColor text-xl'></i>
                    <input type="text" value="John Doe"
                        class="w-full bg-transparent border-b border-textColor outline-none text-textColor">
                </div>
                <div class="flex items-center gap-4">
                    <i class='bx bx-phone text-textColor text-xl'></i>
                    <input type="phone" value="Phone"
                        class="w-full bg-transparent border-b border-textColor outline-none text-textColor">
                </div>
                <div class="flex items-center gap-4">
                    <i class='bx bx-envelope text-textColor text-xl'></i>
                    <input type="email" value="john.doe@example.com"
                        class="w-full bg-transparent border-b border-textColor outline-none text-textColor">
                </div>

                <div class="flex items-center gap-4">
                    <i class='bx bx-lock-alt text-textColor text-xl'></i>
                    <input type="password" placeholder="New Password"
                        class="w-full bg-transparent border-b border-textColor outline-none text-textColor">
                </div>
            </div>
            <button
                class="w-full mt-6 py-2 bg-primary text-textColor rounded-lg hover:bg-primary/80 transition-all">Save
                Changes</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
            profileBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle('hidden');
                arrowIcon.classList.toggle('rotate-180');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (e) {
                if (!profileBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                    arrowIcon.classList.remove('rotate-180');
                }
            });

            // Handle logout
            logoutBtn.addEventListener('click', function () {
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