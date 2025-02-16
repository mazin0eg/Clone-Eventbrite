// Constants for DOM elements
const mobileMenuBtnSelector = '[data-mobile-menu]';
const mobileMenuIconSelector = '[data-mobile-icon]';
const navMenuSelector = '[data-nav-menu]';
const profileBtnSelector = '#profileBtn';
const dropdownMenuSelector = '#dropdownMenu';
const arrowIconSelector = '[data-arrow-icon]';

// Get DOM elements
const navMenu = document.querySelector(navMenuSelector);
const mobileMenuBtn = document.querySelector(mobileMenuBtnSelector);
const mobileMenuIcon = document.querySelector(mobileMenuIconSelector);
const profileBtn = document.querySelector(profileBtnSelector);
const dropdownMenu = document.querySelector(dropdownMenuSelector);
const arrowIcon = document.querySelector(arrowIconSelector);

// Mobile menu functionality
if (mobileMenuBtn && navMenu) {
  mobileMenuBtn.addEventListener('click', () => {
    // Toggle mobile menu visibility
    navMenu.classList.toggle('hidden');
    navMenu.classList.toggle('flex');
    
    // Toggle mobile menu layout classes
    const mobileClasses = [
      'flex-col',
      'absolute',
      'top-20',
      'left-0',
      'w-full',
      'bg-inputBg',
      'backdrop-blur-lg',
      'p-4',
      'gap-4',
      'shadow-lg'
    ];
    
    mobileClasses.forEach(className => {
      navMenu.classList.toggle(className);
    });

    // Toggle menu icon
    if (mobileMenuIcon) {
      const isOpen = !navMenu.classList.contains('hidden');
      mobileMenuIcon.classList.toggle('bx-x', isOpen);
      mobileMenuIcon.classList.toggle('bx-menu', !isOpen);
    }
  });
}

// Profile dropdown functionality
if (profileBtn && dropdownMenu) {
  // Toggle dropdown on profile button click
  profileBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    dropdownMenu.classList.toggle('hidden');
    if (arrowIcon) {
      arrowIcon.classList.toggle('rotate-180');
    }
  });

  // Close dropdown when clicking outside
  document.addEventListener('click', (e) => {
    if (!profileBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
      dropdownMenu.classList.add('hidden');
      if (arrowIcon) {
        arrowIcon.classList.remove('rotate-180');
      }
    }
  });
}

// Close mobile menu on window resize
window.addEventListener('resize', () => {
  if (window.innerWidth >= 768 && navMenu) { // 768px is the md breakpoint in Tailwind
    navMenu.classList.remove('flex-col', 'absolute', 'top-20', 'left-0', 'w-full', 'bg-inputBg', 'backdrop-blur-lg', 'p-4', 'gap-4', 'shadow-lg');
    navMenu.classList.remove('flex');
    navMenu.classList.add('hidden');
    if (mobileMenuIcon) {
      mobileMenuIcon.classList.remove('bx-x');
      mobileMenuIcon.classList.add('bx-menu');
    }
  }
});