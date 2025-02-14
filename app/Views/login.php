<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
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
    <div class="min-h-screen bg-black/40">
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
            <div class="hidden md:flex items-center space-x-6" id="navMenu">
                <a href="index.html" class="text-textColor hover:text-accent transition-all flex items-center gap-2">
                    <i class='bx bx-home-alt'></i>Home
                </a>
                <a href="events.html" class="text-textColor hover:text-accent transition-all flex items-center gap-2">
                    <i class='bx bx-calendar-event'></i>Events
                </a>
                <a href="tickets.html" class="text-textColor hover:text-accent transition-all flex items-center gap-2">
                    <i class='bx bx-ticket'></i>Tickets
                </a>
            </div>
        </nav>

        <!-- Sign In Form -->
        <div class="flex justify-center items-center min-h-screen">
            <div class="w-full max-w-md p-8 transform transition-all duration-500 opacity-0 -translate-x-full bg-inputBg rounded-lg shadow-lg" id="signInForm">
                <div class="text-center mb-8">
                   
                    <h2 class="text-textColor text-2xl font-semibold mb-2">Welcome Back!</h2>
                    <p class="text-textColor/70 text-sm">Don't have an account? <a href="<?= ROOTURL?>/authController/register" class="font-medium hover:underline text-accent">Sign Up</a></p>
                </div>

                <form class="space-y-6" action="/login" method="POST">
                    <!-- Email Field -->
                    <div class="relative group">
                        <input type="email" placeholder="Email" class="w-full h-12 px-12 rounded-full bg-primary/20 text-textColor placeholder-textColor/70 outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                        <i class="bx bx-envelope absolute left-4 top-3.5 text-textColor text-xl"></i>
                    </div>

                    <!-- Password Field -->
                    <div class="relative group">
                        <input type="password" placeholder="Password" class="w-full h-12 px-12 rounded-full bg-primary/20 text-textColor placeholder-textColor/70 outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                        <i class="bx bx-lock-alt absolute left-4 top-3.5 text-textColor text-xl"></i>
                    </div>

                    <!-- Remember Me and Forgot Password -->
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" id="remember" class="rounded bg-primary/20 border-none focus:ring-2 ring-accent">
                            <label for="remember" class="text-textColor">Remember Me</label>
                        </div>
                        <a href="#" class="text-accent hover:underline">Forgot Password?</a>
                    </div>

                    <!-- Sign In Button -->
                    <button type="submit" class="w-full h-12 rounded-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 text-textColor font-medium transition-all transform hover:scale-[1.02] active:scale-[0.98] focus:ring-2 focus:ring-accent flex items-center justify-center gap-2">
                        <i class='bx bx-log-in'></i>
                        Sign In
                    </button>

                 
                </form>
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
        }

        document.addEventListener('DOMContentLoaded', () => {
            const signInForm = document.getElementById('signInForm');
            signInForm.classList.remove('-translate-x-full', 'opacity-0');
        });
        // Add this to your existing script section
function checkLoginStatus() {
    const isLoggedIn = true; // Replace with your actual login check
    const signInButton = document.getElementById('signInButton');
    const userProfile = document.getElementById('userProfile');
    
    if (isLoggedIn) {
        signInButton.classList.add('hidden');
        userProfile.classList.remove('hidden');
    } else {
        signInButton.classList.remove('hidden');
        userProfile.classList.add('hidden');
    }
}

// Call this when the page loads
document.addEventListener('DOMContentLoaded', checkLoginStatus);
    </script>
</body>
</html>
