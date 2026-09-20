import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

// Slider Kegiatan Kami
document.addEventListener('DOMContentLoaded', function() {
    const kegiatanSection = document.querySelector('.kegiatan-kami');
    if (!kegiatanSection) return;

    const slidesData = JSON.parse(kegiatanSection.getAttribute('data-kegiatan') || '[]');
    if (slidesData.length === 0) return;

    let currentIndex = 0;
    const sliderContainer = document.getElementById('activity-slider-images');
    const bgImage = document.getElementById('kegiatan-bg');
    const titleEl = document.getElementById('activity-title');
    const descEl = document.getElementById('activity-desc');

    const slideElements = [];
    slidesData.forEach((data) => {
        const img = document.createElement('img');
        img.src = data.image;
        img.className = 'activity-slide';
        sliderContainer.appendChild(img);
        slideElements.push(img);
    });

    function updateSlider() {
        slideElements.forEach((slide, index) => {
            slide.className = 'activity-slide';
            
            if (index === currentIndex) {
                slide.classList.add('active');
            } else if (index === (currentIndex - 1 + slidesData.length) % slidesData.length) {
                slide.classList.add('prev');
            } else if (index === (currentIndex + 1) % slidesData.length) {
                slide.classList.add('next');
            } else {
                slide.classList.add('hidden-slide');
            }
        });

        const currentData = slidesData[currentIndex];
        bgImage.style.backgroundImage = `url('${currentData.image}')`;
        
        titleEl.style.opacity = 0;
        descEl.style.opacity = 0;
        
        setTimeout(() => {
            titleEl.textContent = currentData.title;
            descEl.textContent = currentData.description;
            titleEl.style.opacity = 1;
            descEl.style.opacity = 1;
        }, 300);
    }

    let isAnimating = false;

    document.getElementById('slider-up').addEventListener('click', () => {
        if (isAnimating) return;
        isAnimating = true;
        currentIndex = (currentIndex - 1 + slidesData.length) % slidesData.length;
        updateSlider();
        setTimeout(() => { isAnimating = false; }, 500);
    });

    document.getElementById('slider-down').addEventListener('click', () => {
        if (isAnimating) return;
        isAnimating = true;
        currentIndex = (currentIndex + 1) % slidesData.length;
        updateSlider();
        setTimeout(() => { isAnimating = false; }, 500);
    });

    updateSlider();

    // Parallax effect background turun pas scroll
    window.addEventListener('scroll', () => {
        const scrolled = window.scrollY;
        const offsetTop = kegiatanSection.offsetTop;
        const sectionHeight = kegiatanSection.offsetHeight;
        
        if (scrolled + window.innerHeight > offsetTop && scrolled < offsetTop + sectionHeight) {

            const yPos = (scrolled - offsetTop) * 0.4;

            bgImage.style.transform = `scale(1.05) translateY(${yPos}px)`;
        }
    });
});

// Navbar mengecil ketika di scroll
document.addEventListener('DOMContentLoaded', function() {
    const navTab = document.querySelector('.navigation-tab');
    if (navTab) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navTab.classList.add('scrolled');
            } else {
                navTab.classList.remove('scrolled');
            }
        });
    }
    
});

// Menu hover bertahan ketika di klik
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.menu-nav-2');

    menuItems.forEach(item => {
        item.addEventListener('click', function () {
            menuItems.forEach(nav => nav.classList.remove('active'));

            this.classList.add('active');
        });
    });
});