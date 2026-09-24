import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

// Slider Menu Nav Informasi Profil
window.switchMenu = function(menuIndex) {
    const container = document.getElementById('menuSliderContainer');
    const dot1 = document.getElementById('dot-1');
    const dot2 = document.getElementById('dot-2');
    
    if (!container || !dot1 || !dot2) return;

    if (menuIndex === 1) {
        container.style.transform = 'translateX(0%)';
        dot1.classList.add('active');
        dot2.classList.remove('active');
    } else if (menuIndex === 2) {
        container.style.transform = 'translateX(-50%)';
        dot1.classList.remove('active');
        dot2.classList.add('active');
    }
}

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

document.addEventListener('DOMContentLoaded', function () {
    // Slider Berita
    const newsItems = document.querySelectorAll('.news-bottom-item');
    const newsBg = document.getElementById('news-bg-layer');
    const newsBgOld = document.getElementById('news-bg-layer-old');
    const newsTitle = document.getElementById('news-main-title');
    let autoNewsSlide;

    // Preload foto menghindari blink putih
    newsItems.forEach(item => {
        const img = new Image();
        img.src = item.getAttribute('data-bg');
    });

    function changeNews(item) {
        newsItems.forEach(nav => {
            nav.classList.remove('active');
            const line = nav.querySelector('.news-line');
            if (line) {
                line.classList.remove('loading-start');
                void line.offsetWidth;
            }
        });
        item.classList.add('active');

        const activeLine = item.querySelector('.news-line');
        if (activeLine) {
            activeLine.classList.add('loading-start');
        }

        const newBg = item.getAttribute('data-bg');
        
        // Crossfade background
        if (newsBgOld && newsBg) {
            newsBgOld.style.backgroundImage = newsBg.style.backgroundImage;
            newsBg.style.transition = 'none';
            newsBg.style.opacity = 0;
            newsBg.style.backgroundImage = `url('${newBg}')`;
            
            void newsBg.offsetWidth;
            
            newsBg.style.transition = 'opacity 0.5s ease-in-out';
            newsBg.style.opacity = 1;
        } else if (newsBg) {
            newsBg.style.backgroundImage = `url('${newBg}')`;
        }

        newsTitle.style.opacity = 0;
        newsTitle.style.transform = 'translateY(30px)';
        setTimeout(() => {
            newsTitle.innerHTML = item.getAttribute('data-title');
            newsTitle.style.opacity = 1;
            newsTitle.style.transform = 'translateY(0)';
        }, 300);
    }

    function startAutoNewsSlide() {
        autoNewsSlide = setInterval(() => {
            let activeIndex = Array.from(newsItems).findIndex(item => item.classList.contains('active'));
            let nextIndex = (activeIndex + 1) % newsItems.length;
            changeNews(newsItems[nextIndex]);
        }, 5000);
    }

    function resetAutoNewsSlide() {
        clearInterval(autoNewsSlide);
        startAutoNewsSlide();
    }

    newsItems.forEach(item => {
        item.addEventListener('click', function () {
            changeNews(this);
            resetAutoNewsSlide();
        });
    });

    const initialActive = Array.from(newsItems).find(item => item.classList.contains('active'));
    if (initialActive) {
        const line = initialActive.querySelector('.news-line');
        if (line) line.classList.add('loading-start');
    }

    startAutoNewsSlide();

        // Efek Parallax background turun pas scroll section berita-highlight
        const newsSection = document.querySelector('.news-highlight');
            
        window.addEventListener('scroll', () => {
            const scrolled = window.scrollY;
            if (newsSection) {
                const offsetTop = newsSection.offsetTop;
                const sectionHeight = newsSection.offsetHeight;
                    
                if (scrolled + window.innerHeight > offsetTop && scrolled < offsetTop + sectionHeight) {
                    const yPos = (scrolled - offsetTop) * 0.4;
                    if (newsBg) newsBg.style.transform = `scale(1.05) translateY(${yPos}px)`;
                    if (newsBgOld) newsBgOld.style.transform = `scale(1.05) translateY(${yPos}px)`;
                }
            }

            const newsPageSection = document.querySelector('.news-page');
            const newsPageBg = document.getElementById('news-page-bg');
            if (newsPageSection && newsPageBg) {
                const offsetTop = newsPageSection.offsetTop;
                const sectionHeight = newsPageSection.offsetHeight;
                    
                if (scrolled + window.innerHeight > offsetTop && scrolled < offsetTop + sectionHeight) {
                    const yPos = (scrolled - offsetTop) * 0.4;
                    newsPageBg.style.transform = `scale(1.05) translateY(${yPos}px)`;
                }
            }
        });
    });