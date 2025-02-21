<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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

        <!-- Register Form -->
        <div class="flex justify-center items-center min-h-screen mt-10">
            <div class="w-full max-w-xl p-6 transform transition-all duration-500 opacity-0 -translate-x-full bg-inputBg rounded-lg shadow-lg"
                id="registerForm">
                <div class="text-center mb-6">
                    <p class="text-textColor text-sm mb-2">Have an account? <a
                            href="<?= ROOTURL ?>/authController/login"
                            class="font-medium hover:underline text-accent">Sign In</a></p>
                    <h2 class="text-textColor text-2xl font-semibold">Register</h2>
                </div>

                <form class="space-y-4" action="<?= ROOTURL ?>/authController/registerUser" method="POST"
                    enctype="multipart/form-data">
                    <!-- Avatar Upload -->
                    <div class="flex justify-center mb-6">
                        <label for="avatar" class="cursor-pointer group">
                            <div
                                class="w-24 h-24 rounded-full bg-primary/20 flex items-center justify-center hover:bg-primary/25 transition-all overflow-hidden relative">
                                <i class="bx bx-camera text-textColor text-3xl transition-all"
                                    id="defaultAvatarIcon"></i>
                                <img id="avatarPreview" class="hidden w-full h-full object-cover" alt="Avatar preview">
                                <div
                                    class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
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
                                    <input type="radio" name="role" value="participant" class="peer hidden" required>
                                    <div class="h-24 rounded-xl bg-primary/20 flex flex-col items-center justify-center gap-2 
                                        peer-checked:bg-primary/40 peer-checked:ring-2 peer-checked:ring-accent
                                        hover:bg-primary/25 transition-all group">
                                        <i
                                            class="bx bx-user-pin text-4xl text-textColor group-hover:scale-110 transition-transform"></i>
                                        <span class="text-textColor font-medium">Participant</span>
                                        <div
                                            class="absolute bottom-2 left-1/2 transform -translate-x-1/2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                            <i class="bx bx-check text-accent text-xl"></i>
                                        </div>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="role" value="organisateur" class="peer hidden" required>
                                    <div class="h-24 rounded-xl bg-primary/20 flex flex-col items-center justify-center gap-2 
                                        peer-checked:bg-primary/40 peer-checked:ring-2 peer-checked:ring-accent
                                        hover:bg-primary/25 transition-all group">
                                        <i
                                            class="bx bx-crown text-4xl text-textColor group-hover:scale-110 transition-transform"></i>
                                        <span class="text-textColor font-medium">Organizer</span>
                                        <div
                                            class="absolute bottom-2 left-1/2 transform -translate-x-1/2 opacity-0 peer-checked:opacity-100 transition-opacity">
                                            <i class="bx bx-check text-accent text-xl"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Username Field -->
                        <div class="relative group">
                            <input type="text" name="username" placeholder="Username" required
                                class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                            <i class="bx bx-user absolute left-3 top-2.5 text-textColor"></i>
                        </div>

                        <!-- Phone Field -->
                        <div class="relative group">
                            <input type="tel" name="phone" placeholder="Phone" required
                                class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                            <i class="bx bx-phone absolute left-3 top-2.5 text-textColor"></i>
                        </div>

                        <!-- Email Field -->
                        <div class="relative col-span-2 group">
                            <input type="email" name="email" placeholder="Email" required
                                class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                            <i class="bx bx-envelope absolute left-3 top-2.5 text-textColor"></i>
                        </div>

                        <!-- Password Fields -->
                        <div class="relative group">
                            <input type="password" name="password" placeholder="Password" required
                                class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                            <i class="bx bx-lock-alt absolute left-3 top-2.5 text-textColor"></i>
                        </div>

                        <div class="relative group">
                            <input type="password" name="confirmPassword" placeholder="Confirm Password" required
                                class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor outline-none group-hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                            <i class="bx bx-lock-alt absolute left-3 top-2.5 text-textColor"></i>
                        </div>

                        <!-- Register Button -->
                        <button type="submit"
                            class="col-span-2 h-10 rounded-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 text-textColor font-medium transition-all transform hover:scale-[1.02] active:scale-[0.98]">Register</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="<?= ROOTURL . '/public/js/menu.js'?>"></script>
    <script src="<?= ROOTURL . '/public/js/register.js'?>"></script>
</body>

</html>