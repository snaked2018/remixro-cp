function toggleMobileNav() {
    const mobileNavbar = document.getElementById('mobile-navbar');
    const menuIcon = document.getElementById('navMenuIcon');
    const closeIcon = document.getElementById('navCloseIcon');
    
    mobileNavbar.classList.toggle('hidden');
    menuIcon.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
}

// Close mobile menu and reset icons on window resize
window.addEventListener('resize', function() {
    if (window.innerWidth >= 1024) {
        const mobileNavbar = document.getElementById('mobile-navbar');
        const menuIcon = document.getElementById('navMenuIcon');
        const closeIcon = document.getElementById('navCloseIcon');
        
        mobileNavbar.classList.add('hidden');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
    }
});
