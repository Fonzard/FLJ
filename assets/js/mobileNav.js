document.addEventListener("DOMContentLoaded", function () {
    const mobileMenuButton = document.querySelector('[data-collapse-toggle="mobile-menu-2"]');
    const mobileMenu = document.getElementById('mobile-menu-2');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('lg:flex');
    });

    document.addEventListener('click', (event) => {
        const isInsideMenuButton = mobileMenuButton.contains(event.target);
        const isInsideMobileMenu = mobileMenu.contains(event.target);

        if (!isInsideMenuButton && !isInsideMobileMenu) {
            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('lg:flex');
            }
        }
    });
});
