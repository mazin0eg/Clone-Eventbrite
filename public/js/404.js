document.addEventListener('DOMContentLoaded', function () {
    const mainSection = document.querySelector('main');
    const icons = ['bx-music', 'bx-calendar', 'bx-star', 'bx-heart'];

    for (let i = 0; i < 10; i++) {
        const icon = document.createElement('i');
        icon.className = `bx ${icons[Math.floor(Math.random() * icons.length)]} absolute text-2xl text-primary/20`;
        icon.style.left = `${Math.random() * 100}%`;
        icon.style.top = `${Math.random() * 100}%`;
        icon.style.animation = `float ${3 + Math.random() * 2}s ease-in-out infinite`;
        icon.style.animationDelay = `${Math.random() * 2}s`;
        mainSection.appendChild(icon);
    }
});
