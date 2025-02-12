<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
        <nav class="fixed top-0 w-full h-20 flex justify-around items-center bg-gradient-to-b from-black/60 to-transparent z-50">
            <!-- Beautiful SVG Logo for Evento -->
            <div class="text-white text-2xl font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="40" viewBox="0 0 120 40" fill="none">
                    <path d="M10 20C10 14.4772 14.4772 10 20 10H100C105.523 10 110 14.4772 110 20V20C110 25.5228 105.523 30 100 30H20C14.4772 30 10 25.5228 10 20V20Z" fill="#6D28D9" />
                    <text x="20" y="28" font-family="Arial" font-size="20" fill="#FFFFFF">Evento</text>
                </svg>
            </div>

            <div class="hidden md:block" id="navMenu">
                <ul class="flex space-x-6">
                    <li><a href="#" class="text-textColor hover:border-b-2 border-accent pb-4 transition-all flex items-center gap-2">
                            <i class='bx bx-home-alt'></i>Home</a></li>
                    <li><a href="#" class="text-textColor hover:border-b-2 border-accent pb-4 transition-all flex items-center gap-2">
                            <i class='bx bx-book-content'></i>Blog</a></li>
                    <li><a href="#" class="text-textColor hover:border-b-2 border-accent pb-4 transition-all flex items-center gap-2">
                            <i class='bx bx-server'></i>Services</a></li>
                    <li><a href="#" class="text-textColor hover:border-b-2 border-accent pb-4 transition-all flex items-center gap-2">
                            <i class='bx bx-info-circle'></i>About</a></li>
                </ul>
            </div>

            <div class="hidden md:flex space-x-4">
                <a href="login.php" class="px-6 py-2 rounded-full bg-primary/40 hover:bg-primary/30 transition-all text-textColor flex items-center gap-2">
                    <i class='bx bx-log-in'></i>Sign In</a>
                <a href="register.php" class="px-6 py-2 rounded-full bg-primary/70 hover:bg-primary/50 transition-all text-textColor flex items-center gap-2">
                    <i class='bx bx-user-plus'></i>Sign Up</a>
            </div>

            <div class="md:hidden">
                <i class="bx bx-menu text-textColor text-2xl p-2 bg-primary/20 rounded-full cursor-pointer hover:bg-primary/15 transition-all" onclick="toggleMenu()"></i>
            </div>
        </nav>

        <!-- Register Form -->
        <div class="flex justify-center items-center min-h-screen">
            <div class="w-full max-w-xl p-6 transform transition-all duration-500 opacity-0 -translate-x-full bg-inputBg rounded-lg shadow-lg" id="registerForm">
                <div class="text-center mb-6">
                    <p class="text-textColor text-sm mb-2">Have an account? <a href="login.php" class="font-medium hover:underline text-accent">Sign In</a></p>
                    <h2 class="text-textColor text-2xl font-semibold">Register</h2>
                </div>

                <form class="space-y-4" action="/register" method="POST" enctype="multipart/form-data">
                    <!-- Avatar Upload -->
                    <div class="flex justify-center mb-6">
                        <label for="avatar" class="cursor-pointer group">
                            <div class="w-24 h-24 rounded-full bg-primary/20 flex items-center justify-center hover:bg-primary/25 transition-all overflow-hidden relative">
                                <!-- Default camera icon -->
                                <i class="bx bx-camera text-textColor text-3xl transition-all" id="defaultAvatarIcon"></i>
                                <!-- Image preview -->
                                <img id="avatarPreview" class="hidden w-full h-full object-cover" alt="Avatar preview">
                                <!-- Hover overlay -->
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <i class="bx bx-camera text-white text-2xl"></i>
                                </div>
                            </div>
                            <input type="file" id="avatar" name="avatar" class="hidden" accept="image/*">
                        </label>
                    </div>

                    <!-- Grid Layout for Form Fields -->
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Enhanced Role Selection -->
                        <div class="col-span-2">
                            <div class="grid grid-cols-2 gap-4">
                                <label class="cursor-pointer">
                                    <input type="radio" name="role" value="participant" class="peer hidden">
                                    <div class="h-24 rounded-xl bg-primary/20 flex flex-col items-center justify-center gap-2 
                                                peer-checked:bg-primary/40 peer-checked:ring-2 peer-checked:ring-accent
                                                hover:bg-primary/25 transition-all group">
                                        <i class="bx bx-user-pin text-4xl text-textColor group-hover:scale-110 transition-transform"></i>
                                        <span class="text-textColor font-medium">Participant</span>
                                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                            <i class="bx bx-check text-accent text-xl"></i>
                                        </div>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="role" value="organizer" class="peer hidden">
                                    <div class="h-24 rounded-xl bg-primary/20 flex flex-col items-center justify-center gap-2 
                                                peer-checked:bg-primary/40 peer-checked:ring-2 peer-checked:ring-accent
                                                hover:bg-primary/25 transition-all group">
                                        <i class="bx bx-crown text-4xl text-textColor group-hover:scale-110 transition-transform"></i>
                                        <span class="text-textColor font-medium">Organizer</span>
                                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                            <i class="bx bx-check text-accent text-xl"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Username Field -->
                        <div class="relative group">
                            <input type="text" placeholder="Username" class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                            <i class="bx bx-user absolute left-3 top-2.5 text-textColor"></i>
                        </div>

                        <!-- Phone Field -->
                        <div class="relative group">
                            <input type="tel" placeholder="Phone" class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                            <i class="bx bx-phone absolute left-3 top-2.5 text-textColor"></i>
                        </div>

                        <!-- Email Field -->
                        <div class="relative col-span-2 group">
                            <input type="email" placeholder="Email" class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                            <i class="bx bx-envelope absolute left-3 top-2.5 text-textColor"></i>
                        </div>

                        <!-- Password Fields -->
                        <div class="relative group">
                            <input type="password" placeholder="Password" class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                            <i class="bx bx-lock-alt absolute left-3 top-2.5 text-textColor"></i>
                        </div>

                        <div class="relative group">
                            <input type="password" placeholder="Confirm Password" class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                            <i class="bx bx-lock-alt absolute left-3 top-2.5 text-textColor"></i>
                        </div>

                        <!-- Register Button -->
                        <button type="submit" class="col-span-2 h-10 rounded-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 text-textColor font-medium transition-all transform hover:scale-[1.02] active:scale-[0.98]">Register</button>

                        <!-- Terms and Conditions -->
                        <div class="col-span-2 flex justify-between text-textColor text-xs">
                            <div class="flex items-center gap-2">
                                <input type="checkbox" id="remember" class="rounded bg-primary/20 border-none focus:ring-2 ring-accent">
                                <label for="remember">Remember Me</label>
                            </div>
                            <a href="#" class="hover:underline hover:text-accent transition-colors">Terms & conditions</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    const avatarInput = document.getElementById('avatar');
    const avatarPreview = document.getElementById('avatarPreview');
    const defaultIcon = document.getElementById('defaultAvatarIcon');
    
    // Form animation
    registerForm.classList.remove('-translate-x-full', 'opacity-0');
    
    // Handle avatar image preview
    avatarInput.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                avatarPreview.src = e.target.result;
                avatarPreview.classList.remove('hidden');
                defaultIcon.classList.add('hidden');
            }
            
            reader.readAsDataURL(this.files[0]);
        }
    });
});

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
            const registerForm = document.getElementById('registerForm');
            registerForm.classList.remove('-translate-x-full', 'opacity-0');
        });
    </script>
</body>

</html>