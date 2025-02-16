<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - 404 Not Found</title>
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
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'spin-slow': 'spin 6s linear infinite',
                        'bounce-slow': 'bounce 2s infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                },
            },
        };
    </script>
</head>

<body class="bg-background min-h-screen">
    <div class="min-h-screen bg-black/40 flex flex-col">
        <!-- Navigation -->
        <?php require_once APPROOT . '/app/Views/header.php'; ?>

        <!-- 404 Content -->
        <main class="flex-grow flex flex-col items-center justify-center px-4 mt-20">
            <!-- Animated Elements -->
            <div class="relative w-full max-w-2xl mx-auto">
                <!-- Floating 404 Text -->
                <h1 class="text-9xl font-bold text-accent text-center animate-float mb-8">404</h1>

                <!-- Spinning Icons -->
                <div class="absolute top-0 left-0 animate-spin-slow">
                    <i class='bx bx-music text-4xl text-primary/40'></i>
                </div>
                <div class="absolute top-0 right-0 animate-spin-slow">
                    <i class='bx bx-calendar text-4xl text-secondary/40'></i>
                </div>

                <!-- Bouncing Elements -->
                <div class="flex justify-center gap-4 mb-8">
                    <i class='bx bx-error-circle text-6xl text-accent animate-bounce-slow'></i>
                </div>
            </div>

            <!-- Error Message -->
            <div class="text-center mb-8 animate-fade-in">
                <h2 class="text-2xl md:text-4xl font-bold text-textColor mb-4">Oops! Page Not Found</h2>
                <p class="text-textColor/70 text-lg mb-8">The page you're looking for doesn't exist or has been moved.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4">
                <a href="home.php"
                    class="px-8 py-3 rounded-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 text-textColor font-medium transition-all transform hover:scale-[1.02] inline-flex items-center gap-2">
                    <i class='bx bx-home'></i>Go Home
                </a>
                <button onclick="window.history.back()"
                    class="px-8 py-3 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor font-medium transition-all transform hover:scale-[1.02] inline-flex items-center gap-2">
                    <i class='bx bx-arrow-back'></i>Go Back
                </button>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-black/40 text-textColor py-6 px-4">
            <div class="max-w-6xl mx-auto text-center">
                <p class="text-textColor/70 text-sm">© 2024 Evento. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script src="<?= ROOTURL . '/public/js/menu.js' ?>"></script>
    <script src="<?= ROOTURL . '/public/js/404.js' ?>"></script>

</body>

</html>