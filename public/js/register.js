document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    const avatarInput = document.getElementById('avatar');
    const avatarPreview = document.getElementById('avatarPreview');
    const defaultIcon = document.getElementById('defaultAvatarIcon');

    // Form animation
    registerForm.classList.remove('-translate-x-full', 'opacity-0');

    // Handle avatar image preview
    avatarInput.addEventListener('change', function (e) {
        if (this.files && this.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                avatarPreview.src = e.target.result;
                avatarPreview.classList.remove('hidden');
                defaultIcon.classList.add('hidden');
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    registerForm.classList.remove('-translate-x-full', 'opacity-0');
});