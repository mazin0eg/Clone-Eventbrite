<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - Ticket Detail</title>
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
    <?php
    require_once APPROOT . '/app/Views/header.php';
    ?>

    <!-- Main Content -->
    <div class="pt-24 px-4 md:px-8">
        <div class="max-w-6xl mx-auto">
            <!-- Event Hero Section -->
            <div class="relative h-[400px] rounded-2xl overflow-hidden mb-8">
                <img src="/api/placeholder/1200/400" alt="Event" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8">
                    <span class="px-4 py-2 rounded-full bg-primary text-white text-sm mb-4 inline-block">Music
                        Festival</span>
                    <h1 class="text-4xl font-bold text-white mb-2">Summer Music Festival 2024</h1>
                    <div class="flex flex-wrap gap-6 text-white/80">
                        <div class="flex items-center gap-2">
                            <i class='bx bx-calendar text-accent'></i>
                            <span>December 15, 2024</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class='bx bx-time text-accent'></i>
                            <span>8:00 PM</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class='bx bx-map text-accent'></i>
                            <span>Central Park, New York</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Details Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Left Column - Event Details -->
                <div class="md:col-span-2 space-y-8">
                    <!-- About Section -->
                    <div class="bg-inputBg rounded-xl p-6">
                        <h2 class="text-2xl font-semibold text-textColor mb-4">About Event</h2>
                        <p class="text-textColor/80 leading-relaxed">
                            Join us for the biggest music festival of the year! Experience an incredible lineup of
                            artists across multiple stages,
                            featuring both established stars and emerging talents. Immerse yourself in a day filled with
                            live performances,
                            great food, and unforgettable memories.
                        </p>
                    </div>

                    <!-- Lineup Section -->
                    <div class="bg-inputBg rounded-xl p-6">
                        <h2 class="text-2xl font-semibold text-textColor mb-4">Event Lineup</h2>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4 p-4 bg-primary/10 rounded-xl">
                                <img src="/api/placeholder/80/80" alt="Artist"
                                    class="w-16 h-16 rounded-lg object-cover">
                                <div>
                                    <h3 class="text-lg font-semibold text-textColor">Main Stage</h3>
                                    <p class="text-textColor/70">8:00 PM - 11:00 PM</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 p-4 bg-primary/10 rounded-xl">
                                <img src="/api/placeholder/80/80" alt="Artist"
                                    class="w-16 h-16 rounded-lg object-cover">
                                <div>
                                    <h3 class="text-lg font-semibold text-textColor">Second Stage</h3>
                                    <p class="text-textColor/70">7:00 PM - 10:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Location Section -->
                    <div class="bg-inputBg rounded-xl p-6">
                        <h2 class="text-2xl font-semibold text-textColor mb-4">Location</h2>
                        <div class="aspect-video rounded-xl overflow-hidden bg-primary/10">
                            <img src="/api/placeholder/800/400" alt="Map" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                <!-- Right Column - Ticket Options -->
                <div class="space-y-6">
                    <!-- Ticket Types -->
                    <div class="bg-inputBg rounded-xl p-6 sticky top-24">
                        <h2 class="text-2xl font-semibold text-textColor mb-6">Select Tickets</h2>

                        <!-- VIP Ticket -->
                        <div class="space-y-4">
                            <div class="p-4 border border-accent/30 rounded-xl">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h3 class="text-lg font-semibold text-textColor">VIP Pass</h3>
                                        <p class="text-accent">$199.99</p>
                                    </div>
                                    <span class="px-3 py-1 rounded-full bg-accent/20 text-accent text-sm">Best
                                        Value</span>
                                </div>
                                <ul class="text-textColor/70 text-sm space-y-2 mb-4">
                                    <li class="flex items-center gap-2">
                                        <i class='bx bx-check text-accent'></i>
                                        Priority entrance
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class='bx bx-check text-accent'></i>
                                        VIP lounge access
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class='bx bx-check text-accent'></i>
                                        Meet & greet with artists
                                    </li>
                                </ul>
                                <button onclick="openPaymentModal('VIP Pass', 199.99)"
                                    class="w-full py-3 rounded-full bg-accent hover:bg-accent/90 text-white transition-all">
                                    Get VIP Ticket
                                </button>
                            </div>

                            <!-- Regular Ticket -->
                            <div class="p-4 border border-primary/30 rounded-xl">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h3 class="text-lg font-semibold text-textColor">Regular Pass</h3>
                                        <p class="text-accent">$99.99</p>
                                    </div>
                                    <span
                                        class="px-3 py-1 rounded-full bg-primary/20 text-primary text-sm">Popular</span>
                                </div>
                                <ul class="text-textColor/70 text-sm space-y-2 mb-4">
                                    <li class="flex items-center gap-2">
                                        <i class='bx bx-check text-primary'></i>
                                        General admission
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class='bx bx-check text-primary'></i>
                                        Access to all stages
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class='bx bx-check text-primary'></i>
                                        Food court access
                                    </li>
                                </ul>
                                <button onclick="openPaymentModal('Regular Pass', 99.99)"
                                    class="w-full py-3 rounded-full bg-primary hover:bg-primary/90 text-white transition-all">
                                    Get Regular Ticket
                                </button>
                            </div>

                            <!-- Free Pass Ticket -->
                            <div class="p-4 border border-secondary/30 rounded-xl">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h3 class="text-lg font-semibold text-textColor">Free Pass</h3>
                                        <p class="text-secondary">$0.00</p>
                                    </div>
                                    <span class="px-3 py-1 rounded-full bg-secondary/20 text-secondary text-sm">Limited
                                        Offer</span>
                                </div>
                                <ul class="text-textColor/70 text-sm space-y-2 mb-4">
                                    <li class="flex items-center gap-2">
                                        <i class='bx bx-check text-secondary'></i>
                                        General admission
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class='bx bx-check text-secondary'></i>
                                        Access to main stage
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class='bx bx-check text-secondary'></i>
                                        Limited seating
                                    </li>
                                </ul>
                                <button onclick="openPaymentModal('Free Pass', 0.00)"
                                    class="w-full py-3 rounded-full bg-secondary hover:bg-secondary/90 text-white transition-all">
                                    Get Free Pass
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div id="paymentModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
        <div class="bg-background rounded-2xl p-6 w-full max-w-md mx-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-textColor">Payment Details</h2>
                <button onclick="closePaymentModal()" class="text-textColor/70 hover:text-textColor">
                    <i class='bx bx-x text-2xl'></i>
                </button>
            </div>

            <form onsubmit="handlePayment(event)" class="space-y-6">
                <!-- Ticket Summary -->
                <div class="bg-inputBg rounded-xl p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-textColor/70">Ticket Type</span>
                        <span id="ticketType" class="text-textColor font-medium">VIP Pass</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-textColor/70">Price</span>
                        <span id="ticketPrice" class="text-accent font-medium">$199.99</span>
                    </div>
                </div>

                <!-- Card Details -->
                <div id="cardDetails" class="space-y-4">
                    <div>
                        <label class="block text-textColor/70 mb-2">Card Number</label>
                        <input type="text" placeholder="1234 5678 9012 3456"
                            class="w-full h-12 px-4 rounded-xl bg-inputBg text-textColor placeholder-textColor/50 outline-none focus:ring-2 ring-accent transition-all">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-textColor/70 mb-2">Expiry Date</label>
                            <input type="text" placeholder="MM/YY"
                                class="w-full h-12 px-4 rounded-xl bg-inputBg text-textColor placeholder-textColor/50 outline-none focus:ring-2 ring-accent transition-all">
                        </div>
                        <div>
                            <label class="block text-textColor/70 mb-2">CVV</label>
                            <input type="text" placeholder="123"
                                class="w-full h-12 px-4 rounded-xl bg-inputBg text-textColor placeholder-textColor/50 outline-none focus:ring-2 ring-accent transition-all">
                        </div>
                    </div>
                    <div>
                        <label class="block text-textColor/70 mb-2">Name on Card</label>
                        <input type="text" placeholder="John Doe"
                            class="w-full h-12 px-4 rounded-xl bg-inputBg text-textColor placeholder-textColor/50 outline-none focus:ring-2 ring-accent transition-all">
                    </div>
                </div>

                <!-- Payment Button -->
                <button type="submit"
                    class="w-full py-4 rounded-full bg-accent hover:bg-accent/90 text-white font-medium transition-all">
                    Complete Payment
                </button>
            </form>
        </div>
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
    <script src="<?= ROOTURL . '/public/js/menu.js' ?>"></script>
    <script src="<?= ROOTURL . '/public/js/payment.js' ?>"></script>

</body>

</html>