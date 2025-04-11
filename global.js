document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuContent = mobileMenu?.querySelector('.transform');
    const mobileMenuClose = document.getElementById('mobile-menu-close');

    if (mobileMenuButton && mobileMenu && mobileMenuContent && mobileMenuClose) {
        // Open menu
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            // Small delay to trigger animation
            setTimeout(() => {
                mobileMenuContent.classList.remove('-translate-x-full');
            }, 10);
        });

        // Close menu
        const closeMenu = () => {
            mobileMenuContent.classList.add('-translate-x-full');
            document.body.classList.remove('overflow-hidden');
            // Wait for animation to finish before hiding
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
        };

        mobileMenuClose.addEventListener('click', closeMenu);
        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                closeMenu();
            }
        });
    }

    // Cookie Consent
    const cookieConsent = document.getElementById('cookie-consent');
    if (cookieConsent) {
        setTimeout(() => {
            cookieConsent.classList.remove('hidden');
        }, 2000);

        cookieConsent.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', () => {
                cookieConsent.classList.add('hidden');
            });
        });
    }

    // Wishlist Functionality
    document.querySelectorAll('.far.fa-heart').forEach(heartIcon => {
        heartIcon.addEventListener('click', function(e) {
            e.preventDefault();
            this.classList.toggle('fas');
            this.classList.toggle('far');
            this.classList.toggle('text-red-500');
        });
    });

    // Top Banner Slider
    const banners = [
        'Nhiều sản phẩm Tennis/Pickleball đã trở lại | Mua Ngay',
        'Miễn phí vận chuyển cho đơn hàng trên 1.000.000₫',
        'Đăng ký thành viên - Nhận ngay ưu đãi 10%'
    ];

    let currentBanner = 0;
    const bannerText = document.querySelector('.bg-\\[\\#F0F0F5\\] a');
    const prevBanner = document.querySelector('.bg-\\[\\#F0F0F5\\] .left-4');
    const nextBanner = document.querySelector('.bg-\\[\\#F0F0F5\\] .right-4');

    function updateBanner() {
        bannerText.textContent = banners[currentBanner];
    }

    if (prevBanner && nextBanner) {
        prevBanner.addEventListener('click', () => {
            currentBanner = (currentBanner - 1 + banners.length) % banners.length;
            updateBanner();
        });

        nextBanner.addEventListener('click', () => {
            currentBanner = (currentBanner + 1) % banners.length;
            updateBanner();
        });

        // Auto rotate banners
        setInterval(() => {
            currentBanner = (currentBanner + 1) % banners.length;
            updateBanner();
        }, 5000);
    }
});
