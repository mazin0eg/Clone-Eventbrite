<!-- Sidebar -->
<aside class="w-64 glassmorphism fixed h-full transition-transform duration-300 z-50" id="sidebar">
    <!-- Logo -->
    <div class="p-4 border-b border-primary/20">
        <a href="#" class="flex items-center gap-2">
            <div class="text-2xl font-bold bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                Evento
            </div>
        </a>
    </div>

    <!-- User Profile Preview -->
    <div class="p-4 border-b border-primary/20">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-primary to-accent p-[2px]">
                <div class="w-full h-full rounded-full overflow-hidden">
                    <img src="https://via.placeholder.com/100" alt="Profile" class="w-full h-full object-cover">
                </div>
            </div>
            <div>
                <h3 class="text-textColor font-medium">John Doe</h3>
                <p class="text-textColor/60 text-sm">Organizer</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="p-4 custom-scrollbar overflow-y-auto h-[calc(100vh-200px)]">
        <ul class="space-y-2">
            <li>
                <a href="/dashboard"
                    class="flex items-center gap-3 text-textColor hover:bg-primary/20 p-3 rounded-lg transition-all nav-link 
                    <?= (isset($data['current_page']) && $data['current_page'] == 'dashboard') ? 'active bg-primary/20' : '' ?>">
                    <i class='bx bxs-dashboard text-xl'></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/createevent"
                    class="flex items-center gap-3 text-textColor hover:bg-primary/20 p-3 rounded-lg transition-all nav-link 
                    <?= (isset($data['current_page']) && $data['current_page'] == 'createevent') ? 'active bg-primary/20' : '' ?>">
                    <i class='bx bx-plus-circle text-xl'></i>
                    Add Event
                </a>
            </li>
            <li>
                <a href="/events"
                    class="flex items-center gap-3 text-textColor hover:bg-primary/20 p-3 rounded-lg transition-all nav-link 
                    <?= (isset($data['current_page']) && $data['current_page'] == 'events') ? 'active bg-primary/20' : '' ?>">
                    <i class='bx bx-calendar-event text-xl'></i>
                    Events
                </a>
            </li>
            <li>
                <a href="/tickets"
                    class="flex items-center gap-3 text-textColor hover:bg-primary/20 p-3 rounded-lg transition-all nav-link 
                    <?= (isset($data['current_page']) && $data['current_page'] == 'tickets') ? 'active bg-primary/20' : '' ?>">
                    <i class='bx bx-receipt text-xl'></i>
                    Tickets
                </a>
            </li>
            <li>
                <a href="/profile"
                    class="flex items-center gap-3 text-textColor hover:bg-primary/20 p-3 rounded-lg transition-all nav-link 
                    <?= (isset($data['current_page']) && $data['current_page'] == 'profile') ? 'active bg-primary/20' : '' ?>">
                    <i class='bx bx-user text-xl'></i>
                    Profile
                </a>
            </li>
        </ul>
    </nav>

    <!-- Logout Link -->
    <div class="absolute bottom-0 w-full p-4 border-t border-primary/20">
        <a href="/authController/logout"
            class="w-full flex items-center gap-3 text-textColor hover:bg-accent/20 p-3 rounded-lg transition-all group">
            <i class='bx bx-log-out text-xl group-hover:rotate-180 transition-transform'></i>
            Logout
        </a>
    </div>
</aside>