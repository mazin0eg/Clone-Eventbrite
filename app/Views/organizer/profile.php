<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - Advanced Dashboard</title>
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
                        success: '#059669',
                        warning: '#D97706',
                        background: '#1F2937',
                        inputBg: '#374151',
                        cardBg: 'rgba(55, 65, 81, 0.5)',
                        textColor: '#F3F4F6',
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'spin-slow': 'spin 6s linear infinite',
                        'slide-in': 'slideIn 0.5s ease-out',
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'scale-in': 'scaleIn 0.3s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        slideIn: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(0)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        scaleIn: {
                            '0%': { transform: 'scale(0.9)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
                        }
                    },
                    backdropBlur: {
                        xs: '2px',
                    }
                },
            },
        };
    </script>
    <style>
        .glassmorphism {
            background: rgba(31, 41, 55, 0.7);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(109, 40, 217, 0.2);
        }

        .counter-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            min-width: 20px;
            height: 20px;
            padding: 0 6px;
            border-radius: 10px;
            background: linear-gradient(to right, #DB2777, #6D28D9);
            color: white;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-link.active {
            background: linear-gradient(to right, rgba(109, 40, 217, 0.2), rgba(30, 64, 175, 0.2));
            border-left: 3px solid #6D28D9;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(55, 65, 81, 0.1);
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(109, 40, 217, 0.5);
            border-radius: 3px;
        }
    </style>
</head>

<body class="bg-background min-h-screen overflow-hidden">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <?php
        require_once APPROOT . '/app/Views/organizer/sidebar.php';
        ?>

        <!-- Main Content -->
        <main class="ml-64 flex-1 min-h-screen bg-background/95 relative overflow-hidden">
            <!-- Top Navigation -->
            <nav class="glassmorphism h-16 flex items-center justify-between px-6 sticky top-0 z-40">
                <button id="menu-toggle" class="text-textColor hover:text-primary transition-colors">
                    <i class='bx bx-menu text-2xl'></i>
                </button>

                <div class="flex items-center gap-6">
                    <!-- Search -->
                    <div class="relative">
                        <input type="text" placeholder="Search..."
                            class="bg-inputBg text-textColor rounded-full py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-primary/50 w-64">
                        <i class='bx bx-search absolute left-3 top-1/2 -translate-y-1/2 text-textColor/60'></i>
                    </div>

                    <!-- Notifications -->
                    <div class="relative">
                        <button class="text-textColor hover:text-primary transition-colors">
                            <i class='bx bx-bell text-xl'></i>
                            <span class="counter-badge">3</span>
                        </button>
                    </div>
                </div>
            </nav>

            <!-- Content Container -->
            <div class="p-6 custom-scrollbar overflow-y-auto h-[calc(100vh-64px)]">


                <!-- Profile Section -->
                <section id="profile-section" class="section active  animate-scale-in">
                    <div class="glassmorphism rounded-xl p-6">
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-24 h-24 rounded-full bg-gradient-to-r from-primary to-accent p-[2px]">
                                <div class="w-full h-full rounded-full overflow-hidden">
                                    <img src="<?= ROOTURL . '/storage/uploads/' . htmlspecialchars($data['user']->getAvatar()) ?>"
                                        alt="Profile" class="w-full h-full object-cover">
                                </div>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-textColor"><?= $data['user']->getUsername() ?></h2>
                                <p class="text-textColor/60">Event Organizer</p>
                                <div class="flex gap-4 mt-4">
                                    <button
                                        class="px-4 py-2 rounded-lg bg-primary text-textColor hover:bg-primary/90 transition-colors">
                                        Edit Profile
                                    </button>
                                    <button
                                        class="px-4 py-2 rounded-lg bg-primary/20 text-textColor hover:bg-primary/30 transition-colors">
                                        View Public Profile
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="glassmorphism rounded-xl p-6">
                                <h3 class="text-textColor/60 mb-2">Total Events</h3>
                                <p class="text-3xl font-bold text-textColor">24</p>
                            </div>
                            <div class="glassmorphism rounded-xl p-6">
                                <h3 class="text-textColor/60 mb-2">Total Revenue</h3>
                                <p class="text-3xl font-bold text-textColor">$12,846</p>
                            </div>
                            <div class="glassmorphism rounded-xl p-6">
                                <h3 class="text-textColor/60 mb-2">Tickets Sold</h3>
                                <p class="text-3xl font-bold text-textColor">156</p>
                            </div>
                        </div>

                        <!-- Profile Information -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-xl font-bold text-textColor mb-4">Personal Information</h3>
                                <form class="space-y-4">
                                    <div>
                                        <label class="block text-textColor/60 mb-2">Full Name</label>
                                        <input type="text" value="<?= $data['user']->getUsername() ?>"
                                            class="w-full bg-inputBg text-textColor rounded-lg p-3 border border-primary/20 focus:border-primary outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-textColor/60 mb-2">Email</label>
                                        <input type="email" value="<?= $data['user']->getEmail() ?>"
                                            class="w-full bg-inputBg text-textColor rounded-lg p-3 border border-primary/20 focus:border-primary outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-textColor/60 mb-2">Phone</label>
                                        <input type="tel" value="<?= $data['user']->getPhone() ?>"
                                            class="w-full bg-inputBg text-textColor rounded-lg p-3 border border-primary/20 focus:border-primary outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-textColor/60 mb-2">Location</label>
                                        <input type="text" value="New York, USA"
                                            class="w-full bg-inputBg text-textColor rounded-lg p-3 border border-primary/20 focus:border-primary outline-none">
                                    </div>
                                </form>
                            </div>

                            <div>
                                <h3 class="text-xl font-bold text-textColor mb-4">Account Settings</h3>
                                <form class="space-y-4">
                                    <div>
                                        <label class="block text-textColor/60 mb-2">Current Password</label>
                                        <input type="password"
                                            class="w-full bg-inputBg text-textColor rounded-lg p-3 border border-primary/20 focus:border-primary outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-textColor/60 mb-2">New Password</label>
                                        <input type="password"
                                            class="w-full bg-inputBg text-textColor rounded-lg p-3 border border-primary/20 focus:border-primary outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-textColor/60 mb-2">Confirm Password</label>
                                        <input type="password"
                                            class="w-full bg-inputBg text-textColor rounded-lg p-3 border border-primary/20 focus:border-primary outline-none">
                                    </div>
                                    <button type="submit"
                                        class="w-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 text-textColor py-3 rounded-lg transition-all transform hover:scale-[1.02]">
                                        Update Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script>

        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menu-toggle');
        let sidebarVisible = true;




        // Toggle sidebar
        menuToggle.addEventListener('click', () => {
            sidebarVisible = !sidebarVisible;
            sidebar.style.transform = sidebarVisible ? 'translateX(0)' : 'translateX(-100%)';
            document.querySelector('main').style.marginLeft = sidebarVisible ? '16rem' : '0';
        });

        // Add floating background elements
        function createFloatingElements() {
            const mainContent = document.querySelector('main');
            const icons = ['bx-music', 'bx-calendar', 'bx-star', 'bx-heart', 'bx-ticket'];

            for (let i = 0; i < 15; i++) {
                const icon = document.createElement('i');
                icon.className = `bx ${icons[Math.floor(Math.random() * icons.length)]} absolute text-2xl text-primary/10`;
                icon.style.left = `${Math.random() * 100}%`;
                icon.style.top = `${Math.random() * 100}%`;
                icon.style.animation = `float ${3 + Math.random() * 2}s ease-in-out infinite`;
                icon.style.animationDelay = `${Math.random() * 2}s`;
                mainContent.appendChild(icon);
            }
        }

        // Initialize floating elements
        createFloatingElements();

        // File upload preview
        const fileInput = document.querySelector('input[type="file"]');
        const uploadArea = document.querySelector('.border-dashed');

        if (fileInput && uploadArea) {
            uploadArea.addEventListener('click', () => fileInput.click());
            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.classList.add('border-primary');
            });
            uploadArea.addEventListener('dragleave', () => {
                uploadArea.classList.remove('border-primary');
            });
            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('border-primary');
                const files = e.dataTransfer.files;
                if (files.length) {
                    handleFileUpload(files[0]);
                }
            });
            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length) {
                    handleFileUpload(e.target.files[0]);
                }
            });
        }

        function handleFileUpload(file) {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    uploadArea.innerHTML = `
                        <img src="${e.target.result}" alt="Preview" class="max-h-32 mx-auto mb-2">
                        <p class="text-textColor/60">${file.name}</p>
                        <button type="button" class="text-accent hover:text-accent/80 mt-2" onclick="resetFileUpload()">
                            Remove
                        </button>
                    `;
                };
                reader.readAsDataURL(file);
            }
        }

        function resetFileUpload() {
            if (fileInput && uploadArea) {
                fileInput.value = '';
                uploadArea.innerHTML = `
                    <i class='bx bx-upload text-4xl text-primary/60 mb-2'></i>
                    <p class="text-textColor/60">Drag and drop your image here or</p>
                    <button type="button" class="text-primary hover:text-primary/80">browse files</button>
                `;
            }
        }

        // Counter animation
        function animateCounter(element, target, duration = 1000) {
            const start = parseInt(element.innerText) || 0;
            const increment = (target - start) / (duration / 16);
            let current = start;

            const animate = () => {
                current += increment;
                element.innerText = Math.round(current);

                if ((increment > 0 && current < target) || (increment < 0 && current > target)) {
                    requestAnimationFrame(animate);
                } else {
                    element.innerText = target;
                }
            };

            requestAnimationFrame(animate);
        }

        // Initialize counter animations
        document.querySelectorAll('[data-counter]').forEach(counter => {
            const target = parseInt(counter.getAttribute('data-counter'));
            animateCounter(counter, target);
        });

        // Notification system
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-4 rounded-lg text-white transform transition-all duration-300 translate-x-full ${type === 'success' ? 'bg-success' : 'bg-accent'
                }`;
            notification.innerHTML = `
                <div class="flex items-center gap-2">
                    <i class='bx ${type === 'success' ? 'bx-check' : 'bx-x'} text-xl'></i>
                    <p>${message}</p>
                </div>
            `;
            document.body.appendChild(notification);

            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);

            // Animate out
            setTimeout(() => {
                notification.style.transform = 'translateX(full)';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }

        // Form submission handling
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                showNotification('Changes saved successfully!', 'success');
            });
        });

        // Initialize tooltips
        const tooltips = document.querySelectorAll('[data-tooltip]');
        tooltips.forEach(tooltip => {
            tooltip.addEventListener('mouseenter', (e) => {
                const text = e.target.getAttribute('data-tooltip');
                const tooltipEl = document.createElement('div');
                tooltipEl.className = 'absolute bg-background p-2 rounded text-sm text-textColor z-50';
                tooltipEl.innerHTML = text;
                document.body.appendChild(tooltipEl);

                const rect = e.target.getBoundingClientRect();
                tooltipEl.style.top = `${rect.top - tooltipEl.offsetHeight - 8}px`;
                tooltipEl.style.left = `${rect.left + (rect.width - tooltipEl.offsetWidth) / 2}px`;
            });

            tooltip.addEventListener('mouseleave', () => {
                const tooltips = document.querySelectorAll('.tooltip');
                tooltips.forEach(t => t.remove());
            });
        });
    </script>
</body>

</html>