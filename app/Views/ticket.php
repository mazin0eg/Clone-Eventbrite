<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - Tickets</title>
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
    <!-- Navigation -->
    <?php require_once APPROOT . '/app/Views/header.php'; ?>

    <!-- Main Content -->
    <div class="pt-24 px-4 md:px-8">
        <!-- Tickets Section -->
        <div class="max-w-6xl mx-auto">
            <!-- Search and Filter Bar -->
            <div class="bg-inputBg rounded-xl p-4 mb-6">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="relative flex-1">
                        <input type="text" placeholder="Search tickets..."
                            class="w-full h-10 px-10 rounded-full bg-primary/20 text-textColor placeholder-textColor/70 outline-none hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
                        <i class='bx bx-search absolute left-3 top-2.5 text-textColor/70'></i>
                    </div>
                    <div class="flex gap-4">
                        <select
                            class="h-10 px-4 rounded-full bg-primary/20 text-textColor outline-none hover:bg-primary/25 focus:ring-2 focus:ring-accent transition-all">
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
                            <button
                                class="px-6 py-2 rounded-full bg-primary hover:bg-primary/90 text-white transition-all">
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
                            <button
                                class="px-6 py-2 rounded-full bg-primary hover:bg-primary/90 text-white transition-all">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center items-center gap-2 mt-8">
                <button
                    class="w-10 h-10 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor flex items-center justify-center transition-all">
                    <i class='bx bx-chevron-left'></i>
                </button>
                <button
                    class="w-10 h-10 rounded-full bg-primary text-textColor flex items-center justify-center">1</button>
                <button
                    class="w-10 h-10 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor flex items-center justify-center transition-all">2</button>
                <button
                    class="w-10 h-10 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor flex items-center justify-center transition-all">3</button>
                <button
                    class="w-10 h-10 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor flex items-center justify-center transition-all">
                    <i class='bx bx-chevron-right'></i>
                </button>
            </div>
        </div>
    </div>

    <script src="<?= ROOTURL . '/public/js/menu.js' ?>"></script>
</body>

</html>