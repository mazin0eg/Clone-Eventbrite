<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - Home</title>
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
        <!-- Header with gradient background -->
        <?php
        require_once APPROOT . '/app/Views/header.php';
        ?>

        <!-- Hero Section -->
        <section class="pt-32 pb-16 px-4">
            <div class="max-w-6xl mx-auto text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-textColor mb-6">Discover Amazing Events</h1>
                <p class="text-textColor/80 text-lg mb-8">Find and book tickets for the best events in your area</p>
                <div class="flex flex-col md:flex-row gap-4 justify-center">
                    <a href="events.html"
                        class="px-8 py-3 rounded-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 text-textColor font-medium transition-all transform hover:scale-[1.02] inline-flex items-center gap-2">
                        <i class='bx bx-calendar-event'></i>Browse Events
                    </a>
                    <a href="#featured"
                        class="px-8 py-3 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor font-medium transition-all transform hover:scale-[1.02] inline-flex items-center gap-2">
                        <i class='bx bx-star'></i>Featured Events
                    </a>
                </div>
            </div>
        </section>

        <!-- Categories Section -->
        <section class="py-16 px-4 bg-black/20">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-textColor mb-8">Popular Categories</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="events.html?category=music" class="group">
                        <div class="bg-inputBg rounded-xl p-6 text-center hover:bg-primary/20 transition-all">
                            <i
                                class='bx bx-music text-4xl text-accent mb-2 group-hover:scale-110 transition-transform'></i>
                            <h3 class="text-textColor font-medium">Music</h3>
                        </div>
                    </a>
                    <a href="events.html?category=tech" class="group">
                        <div class="bg-inputBg rounded-xl p-6 text-center hover:bg-primary/20 transition-all">
                            <i
                                class='bx bx-laptop text-4xl text-accent mb-2 group-hover:scale-110 transition-transform'></i>
                            <h3 class="text-textColor font-medium">Technology</h3>
                        </div>
                    </a>
                    <a href="events.html?category=sports" class="group">
                        <div class="bg-inputBg rounded-xl p-6 text-center hover:bg-primary/20 transition-all">
                            <i
                                class='bx bx-basketball text-4xl text-accent mb-2 group-hover:scale-110 transition-transform'></i>
                            <h3 class="text-textColor font-medium">Sports</h3>
                        </div>
                    </a>
                    <a href="events.html?category=art" class="group">
                        <div class="bg-inputBg rounded-xl p-6 text-center hover:bg-primary/20 transition-all">
                            <i
                                class='bx bx-palette text-4xl text-accent mb-2 group-hover:scale-110 transition-transform'></i>
                            <h3 class="text-textColor font-medium">Arts</h3>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Featured Events Section -->
        <section id="featured" class="py-16 px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-textColor mb-8">Featured Events</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Event Card 1 -->
                    <div
                        class="bg-inputBg rounded-xl overflow-hidden group hover:transform hover:scale-[1.02] transition-all">
                        <div class="relative">
                            <img src="/api/placeholder/400/200" alt="Event 1" class="w-full h-48 object-cover">
                            <span
                                class="absolute top-4 right-4 px-3 py-1 rounded-full bg-accent/90 text-white text-sm">Featured</span>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-semibold text-textColor">Music Festival</h3>
                                <span class="px-3 py-1 rounded-full bg-primary/20 text-accent text-sm">$49.99</span>
                            </div>
                            <p class="text-textColor/70 text-sm mb-4">Experience amazing live performances</p>
                            <div class="flex items-center gap-2 text-textColor/60 text-sm mb-4">
                                <i class='bx bx-calendar'></i>
                                <span>Dec 15, 2024</span>
                                <i class='bx bx-map ml-2'></i>
                                <span>Central Park</span>
                            </div>
                            <button
                                class="w-full py-2 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor transition-all">Get
                                Tickets</button>
                        </div>
                    </div>

                    <!-- Event Card 2 -->
                    <div
                        class="bg-inputBg rounded-xl overflow-hidden group hover:transform hover:scale-[1.02] transition-all">
                        <div class="relative">
                            <img src="/api/placeholder/400/200" alt="Event 2" class="w-full h-48 object-cover">
                            <span
                                class="absolute top-4 right-4 px-3 py-1 rounded-full bg-accent/90 text-white text-sm">Featured</span>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-semibold text-textColor">Tech Conference</h3>
                                <span class="px-3 py-1 rounded-full bg-primary/20 text-accent text-sm">$99.99</span>
                            </div>
                            <p class="text-textColor/70 text-sm mb-4">Learn from industry experts</p>
                            <div class="flex items-center gap-2 text-textColor/60 text-sm mb-4">
                                <i class='bx bx-calendar'></i>
                                <span>Dec 20, 2024</span>
                                <i class='bx bx-map ml-2'></i>
                                <span>Convention Center</span>
                            </div>
                            <button
                                class="w-full py-2 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor transition-all">Get
                                Tickets</button>
                        </div>
                    </div>

                    <!-- Event Card 3 -->
                    <div
                        class="bg-inputBg rounded-xl overflow-hidden group hover:transform hover:scale-[1.02] transition-all">
                        <div class="relative">
                            <img src="/api/placeholder/400/200" alt="Event 3" class="w-full h-48 object-cover">
                            <span
                                class="absolute top-4 right-4 px-3 py-1 rounded-full bg-accent/90 text-white text-sm">Featured</span>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-semibold text-textColor">Food Festival</h3>
                                <span class="px-3 py-1 rounded-full bg-primary/20 text-accent text-sm">$29.99</span>
                            </div>
                            <p class="text-textColor/70 text-sm mb-4">Taste international cuisines</p>
                            <div class="flex items-center gap-2 text-textColor/60 text-sm mb-4">
                                <i class='bx bx-calendar'></i>
                                <span>Dec 25, 2024</span>
                                <i class='bx bx-map ml-2'></i>
                                <span>City Square</span>
                            </div>
                            <button
                                class="w-full py-2 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor transition-all">Get
                                Tickets</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <footer class="bg-black/40 text-textColor py-12 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo and Description -->
                <div class="col-span-1 md:col-span-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="40" viewBox="0 0 120 40" fill="none">
                        <path
                            d="M10 20C10 14.4772 14.4772 10 20 10H100C105.523 10 110 14.4772 110 20V20C110 25.5228 105.523 30 100 30H20C14.4772 30 10 25.5228 10 20V20Z"
                            fill="#6D28D9" />
                        <text x="20" y="28" font-family="Arial" font-size="20" fill="#FFFFFF">Evento</text>
                    </svg>
                    <p class="mt-4 text-textColor/70">Discover and book amazing events happening around you. Join our
                        community of event enthusiasts.</p>
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
                            <a href="mailto:info@evento.com"
                                class="text-textColor/70 hover:text-accent">info@evento.com</a>
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
    <script src="<?= ROOTURL . '/public/js/menu.js'?>"></script>
</body>

</html>