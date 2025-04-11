// Cookie Consent Management
document.addEventListener('DOMContentLoaded', function() {
    const cookieConsent = document.getElementById('cookie-consent');
    if (cookieConsent) {
        const acceptAllButton = cookieConsent.querySelector('.bg-black');
        const necessaryOnlyButton = cookieConsent.querySelector('.bg-gray-200');

        // Check if user has already made a choice
        if (!localStorage.getItem('cookieConsent')) {
            cookieConsent.style.display = 'block';
        } else {
            cookieConsent.style.display = 'none';
        }

        // Handle cookie consent choices
        if (acceptAllButton) {
            acceptAllButton.addEventListener('click', () => {
                localStorage.setItem('cookieConsent', 'all');
                cookieConsent.style.display = 'none';
            });
        }

        if (necessaryOnlyButton) {
            necessaryOnlyButton.addEventListener('click', () => {
                localStorage.setItem('cookieConsent', 'necessary');
                cookieConsent.style.display = 'none';
            });
        }
    }

    // Mobile Menu Toggle
    const mobileMenuButton = document.querySelector('.fa-bars')?.parentElement;
    if (mobileMenuButton) {
        // Create overlay
        const overlay = document.createElement('div');
        overlay.className = 'md:hidden fixed inset-0 bg-black bg-opacity-50 z-40 hidden transition-opacity duration-300';
        document.body.appendChild(overlay);

        // Create mobile menu
        const mobileMenu = document.createElement('div');
        mobileMenu.className = 'md:hidden fixed right-0 top-0 h-full w-[300px] bg-white z-50 transform translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto';
        mobileMenu.innerHTML = `
            <div class="p-6">
                <div class="flex justify-between items-center border-b pb-4">
                    <a href="index.html" class="text-2xl font-bold">ASICS</a>
                    <button class="p-2 hover:bg-gray-100 rounded-full" id="close-mobile-menu">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <nav class="mt-6">
                    <ul class="space-y-2">
                        <li><a href="products.html" class="flex items-center py-3 px-4 text-lg hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-male w-8"></i>Men
                        </a></li>
                        <li><a href="products.html" class="flex items-center py-3 px-4 text-lg hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-female w-8"></i>Women
                        </a></li>
                        <li><a href="products.html" class="flex items-center py-3 px-4 text-lg hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-child w-8"></i>Kids
                        </a></li>
                        <li><a href="products.html" class="flex items-center py-3 px-4 text-lg hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-running w-8"></i>Sports
                        </a></li>
                        <li><a href="products.html" class="flex items-center py-3 px-4 text-lg hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-tag w-8"></i>Sale
                        </a></li>
                        <li><hr class="my-4 border-gray-200"></li>
                        <li><a href="login.html" class="flex items-center py-3 px-4 text-lg hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-user w-8"></i>Login
                        </a></li>
                        <li><a href="contact.html" class="flex items-center py-3 px-4 text-lg hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-envelope w-8"></i>Contact Us
                        </a></li>
                    </ul>
                </nav>
            </div>
        `;
        document.body.appendChild(mobileMenu);

        // Event listeners for opening menu
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.remove('translate-x-full');
            overlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        });

        // Event listeners for closing menu
        const closeMenu = () => {
            mobileMenu.classList.add('translate-x-full');
            overlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        };

        const closeButton = document.getElementById('close-mobile-menu');
        if (closeButton) {
            closeButton.addEventListener('click', closeMenu);
        }
        overlay.addEventListener('click', closeMenu);
    }

    // Carousel Functionality
    const heroSection = document.querySelector('.relative.overflow-hidden.bg-gray-100');
    if (heroSection) {
        let currentSlide = 0;
        const slides = [
            {
                image: 'https://images.pexels.com/photos/4753987/pexels-photo-4753987.jpeg',
                title: 'ASICS x A.P.C. Off court line',
                subtitle: 'Now available',
                description: 'Comfort, style, confidence - A.P.C. x GEL-KAYANO 14 sneakers for a life of movement off the court.'
            },
            {
                image: 'https://images.pexels.com/photos/4753879/pexels-photo-4753879.jpeg',
                title: 'NATURE BATHING™ COLLECTION',
                subtitle: 'New Collection',
                description: 'Experience comfort with added grip for door-to-trail versatility.'
            }
        ];

        function updateSlide() {
            const currentSlideData = slides[currentSlide];
            
            const img = heroSection.querySelector('img');
            if (img) img.src = currentSlideData.image;
            
            const textContent = heroSection.querySelector('.text-white');
            if (textContent) {
                textContent.innerHTML = `
                    <h2 class="text-4xl font-bold mb-4">${currentSlideData.subtitle}</h2>
                    <h3 class="text-3xl mb-6">${currentSlideData.title}</h3>
                    <p class="text-xl mb-8">${currentSlideData.description}</p>
                    <div class="space-x-4">
                        <a href="#" class="bg-white text-black px-8 py-3 rounded-full hover:bg-gray-200 transition">Shop Now</a>
                        <a href="#" class="border border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-black transition">Learn More</a>
                    </div>
                `;
            }
            
            currentSlide = (currentSlide + 1) % slides.length;
        }

        // Auto-rotate carousel every 5 seconds
        setInterval(updateSlide, 5000);
    }
});
