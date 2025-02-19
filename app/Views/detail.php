<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - <?= htmlspecialchars($data['event']['titre']) ?></title>
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

    <?php
    require_once APPROOT . '/app/Views/header.php';
    ?>
    <?php if (empty($data['event'])): ?>
        <!-- Empty State -->
        <div class="h-screen flex items-center justify-center px-4">
            <div class="text-center">
                <div class="bg-inputBg rounded-xl p-8 max-w-md mx-auto">
                    <i class='bx bx-error-circle text-6xl text-accent mb-4'></i>
                    <h2 class="text-2xl font-semibold text-textColor mb-4">Event Not Found</h2>
                    <p class="text-textColor/70 mb-6">Sorry, the event you're looking for doesn't exist or has been removed.
                    </p>
                    <a href="<?= ROOTURL ?>/EventController/index">
                        <button class="px-6 py-3 rounded-full bg-primary hover:bg-primary/90 text-white transition-all">
                            <i class='bx bx-arrow-back mr-2'></i>Browse Events
                        </button>
                    </a>
                </div>
            </div>
        </div>


    <?php else: ?>


        <!-- Main Content -->
        <div class="pt-24 px-4 md:px-8">
            <div class="max-w-6xl mx-auto">
                <!-- Event Hero Section -->
                <div class="relative h-[400px] rounded-2xl overflow-hidden mb-8">
                    <img src="<?= ROOTURL . '/storage/uploads/' . htmlspecialchars($data['event']['image']) ?>" alt="Event"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8">
                        <span class="px-4 py-2 rounded-full bg-primary text-white text-sm mb-4 inline-block">
                            <?= htmlspecialchars($data['event']['category_name']) ?>
                        </span>
                        <h1 class="text-4xl font-bold text-white mb-2">
                            <?= htmlspecialchars($data['event']['titre']) ?>
                        </h1>
                        <div class="flex flex-wrap gap-6 text-white/80">
                            <div class="flex items-center gap-2">
                                <i class='bx bx-calendar text-accent'></i>
                                <span><?= htmlspecialchars((new DateTime($data['event']['date']))->format('F j, Y')) ?></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class='bx bx-map text-accent'></i>
                                <span><?= htmlspecialchars($data['event']['lieu']) ?></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class='bx bx-user text-accent'></i>
                                <span>Capacity: <?= htmlspecialchars($data['event']['capacite']) ?></span>
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
                                <?= htmlspecialchars($data['event']['description']) ?>
                            </p>
                        </div>

                        <!-- Location Section -->
                        <div class="bg-inputBg rounded-xl p-6">
                            <h2 class="text-2xl font-semibold text-textColor mb-4">Location</h2>
                            <div class="aspect-video rounded-xl overflow-hidden bg-primary/10">
                                <div class="w-full h-full flex items-center justify-center text-textColor/70">
                                    <i class='bx bx-map text-4xl mr-2'></i>
                                    <span><?= htmlspecialchars($data['event']['lieu']) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Ticket Options -->
                    <div class="space-y-6">
                        <!-- Ticket Types -->
                        <div class="bg-inputBg rounded-xl p-6 sticky top-24">
                            <h2 class="text-2xl font-semibold text-textColor mb-6">Select Tickets</h2>

                            <!-- Regular Ticket -->
                            <div class="p-4 border border-primary/30 rounded-xl">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h3 class="text-lg font-semibold text-textColor">Regular Pass</h3>
                                        <p class="text-accent">$<?= htmlspecialchars($data['event']['prix']) ?></p>
                                    </div>
                                    <span class="px-3 py-1 rounded-full bg-primary/20 text-primary text-sm">Available</span>
                                </div>
                                <ul class="text-textColor/70 text-sm space-y-2 mb-4">
                                    <li class="flex items-center gap-2">
                                        <i class='bx bx-check text-primary'></i>
                                        General admission
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class='bx bx-check text-primary'></i>
                                        Full event access
                                    </li>
                                </ul>
                                <button
                                    onclick="openPaymentModal('Regular Pass', <?= htmlspecialchars($data['event']['prix']) ?>)"
                                    class="w-full py-3 rounded-full bg-primary hover:bg-primary/90 text-white transition-all">
                                    Get Ticket
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>


    <!-- Payment Modal -->
    <div id="paymentModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
        <!-- Payment modal content remains unchanged -->
    </div>

    <script src="<?= ROOTURL . '/public/js/payment.js' ?>"></script>
</body>

</html>