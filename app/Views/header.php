<?php
$user = null;
if (isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
}
?>

<!-- Header with gradient background -->
<header
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
    <nav class="flex items-center space-x-6">
        <!-- Common Links for all users -->
        <a href="<?= ROOTURL ?>/HomeController/index"
            class="text-textColor hover:text-accent transition-all flex items-center gap-2">
            <i class='bx bx-home-alt'></i>Home
        </a>
        <a ref="<?= ROOTURL ?>/EventController/index"
            class="text-textColor hover:text-accent transition-all flex items-center gap-2">
            <i class='bx bx-calendar-event'></i>Events
        </a>

        <?php if (isset($user)): ?>
            <?php $role = $user->getRole(); ?>

            <?php if ($role === 'organisateur'): ?>
                <a href="<?= ROOTURL ?>/EventController/index"
                    class="text-textColor hover:text-accent transition-all flex items-center gap-2">
                    <i class='bx bx-layout'></i>Dashboard
                </a>
            <?php elseif ($role === 'admin'): ?>
                <a href="<?= ROOTURL ?>/AdminController/index"
                    class="text-textColor hover:text-accent transition-all flex items-center gap-2">
                    <i class='bx bx-cog'></i>Admin Space
                </a>
            <?php elseif ($role === 'participant'): ?>
                <a href="/TicketController/index"
                    class="text-textColor hover:text-accent transition-all flex items-center gap-2">
                    <i class='bx bx-ticket'></i>Tickets
                </a>
            <?php endif; ?>

            <!-- Profile Section for logged-in users -->
            <div class="relative ml-4">
                <button onclick="toggleDropdown()"
                    class="flex items-center gap-3 p-2 rounded-full hover:bg-primary/20 transition-all">
                    <img src="<?= ROOTURL . '/storage/uploads/' . htmlspecialchars($user->getAvatar()) ?>" alt="Profile"
                        class="w-10 h-10 rounded-full object-cover border-2 border-accent">
                    <span class="text-textColor"><?php echo $user->getName(); ?></span>
                    <i class='bx bx-chevron-down text-textColor'></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-inputBg rounded-xl shadow-lg py-1 hidden">
                    <button onclick="logout()"
                        class="w-full text-left px-4 py-2 text-sm text-accent hover:bg-primary/20 transition-all flex items-center gap-2">
                        <i class='bx bx-log-out'></i>Logout
                    </button>
                </div>
            </div>

        <?php else: ?>
            <!-- Sign In Button for logged-out users -->
            <a href="<?= ROOTURL ?>/AuthController/index"
                class="px-4 py-2 rounded-full bg-primary/20 hover:bg-primary/30 text-textColor transition-all flex items-center gap-2">
                <i class='bx bx-log-in'></i>Sign In
            </a>
        <?php endif; ?>
    </nav>
</header>