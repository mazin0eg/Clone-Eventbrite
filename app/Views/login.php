<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        <?php
        require_once APPROOT . '/app/Views/header.php';
        ?>


        <!-- Sign In Form -->
        <div class="flex justify-center items-center min-h-screen">
            <div class="w-full max-w-md p-8 transform transition-all duration-500 opacity-0 -translate-x-full bg-inputBg rounded-lg shadow-lg"
                id="signInForm">
                <div class="text-center mb-8">

                    <h2 class="text-textColor text-2xl font-semibold mb-2">Welcome Back!</h2>
                    <p class="text-textColor/70 text-sm">Don't have an account? <a
                            href="<?= ROOTURL ?>/authController/register"
                            class="font-medium hover:underline text-accent">Sign Up</a></p>
                </div>

                <form class="space-y-6" action="<?= ROOTURL ?>/authController/loginUser" method="POST">
                    <!-- Email Field -->
                    <div class="relative group">
                        <input type="email" placeholder="Email" name="email"
                            class="w-full h-12 px-12 rounded-full bg-primary/20 text-textColor placeholder-textColor/70 outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                        <i class="bx bx-envelope absolute left-4 top-3.5 text-textColor text-xl"></i>
                    </div>

                    <!-- Password Field -->
                    <div class="relative group">
                        <input type="password" placeholder="Password" name="password"
                            class="w-full h-12 px-12 rounded-full bg-primary/20 text-textColor placeholder-textColor/70 outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                        <i class="bx bx-lock-alt absolute left-4 top-3.5 text-textColor text-xl"></i>
                    </div>

                    <!-- Remember Me and Forgot Password -->
                    <!-- <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" id="remember"
                                class="rounded bg-primary/20 border-none focus:ring-2 ring-accent">
                            <label for="remember" class="text-textColor">Remember Me</label>
                        </div>
                        <a href="#" class="text-accent hover:underline">Forgot Password?</a>
                    </div> -->

                    <!-- Sign In Button -->
                    <button type="submit"
                        class="w-full h-12 rounded-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 text-textColor font-medium transition-all transform hover:scale-[1.02] active:scale-[0.98] focus:ring-2 focus:ring-accent flex items-center justify-center gap-2">
                        <i class='bx bx-log-in'></i>
                        Sign In
                    </button>


                </form>
            </div>
        </div>
    </div>

    <script src="<?= ROOTURL . '/public/js/menu.js'?>"></script>
    <script src="<?= ROOTURL . '/public/js/login.js'?>"></script>
   
</body>

</html>