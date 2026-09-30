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

//effect paralax background struktur
document.addEventListener('DOMContentLoaded', function() {
    const bgImage = document.getElementById('bgImage');
    const kegiatanSection = document.getElementById('kegiatanSection');
    
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

// Effect Transisi Perpindahan Menu/Page
document.addEventListener('DOMContentLoaded', function () {
    const transitionContainer = document.querySelector('.page-transition');
    if (!transitionContainer) return;
    
    if (transitionContainer.classList.contains('initial-cover')) {
        function revealPage() {
            transitionContainer.classList.remove('initial-cover');
            transitionContainer.classList.add('active-out');

            setTimeout(() => {
                transitionContainer.classList.remove('active-out');
                const layers = transitionContainer.querySelectorAll('.transition-layer');
                layers.forEach(layer => {
                    layer.style.transition = 'none';
                    layer.style.transform = 'translateX(-100%)';
                });
                
                void transitionContainer.offsetWidth; // Kembalikan transition

                layers.forEach(layer => {
                    layer.style.transition = '';
                });
            }, 1200);
        }

        // TUNGGU GAMBAR SELESAI LOAD
        const images = document.querySelectorAll('img');
        let imagesLoaded = 0;
        const totalImages = images.length;
        if (totalImages === 0) {
            revealPage();
        } else {
            let isRevealed = false;

            // Fallback maksimum 2.5 detik
            const fallbackTimer = setTimeout(() => {
                if (!isRevealed) {
                    isRevealed = true;
                    revealPage();
                }
            }, 2500);

            function imageLoaded() {
                imagesLoaded++;
                if (imagesLoaded >= totalImages && !isRevealed) {
                    isRevealed = true;
                    clearTimeout(fallbackTimer);
                    // Delay sedikit supaya lebih smooth
                    setTimeout(revealPage, 100);
                }
            }

            images.forEach(img => {
                if (img.complete) {
                    imageLoaded();
                } else {
                    img.addEventListener('load', imageLoaded);
                    img.addEventListener('error', imageLoaded);
                }
            });
        }
    }

    // 2. MENU / LINK CLICK
    const currentHost = window.location.host;
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function (e) {
            if (
                this.hostname === currentHost &&
                this.target !== '_blank' &&
                !this.hasAttribute('download') &&
                !this.getAttribute('href')?.startsWith('#') &&
                this.href !== window.location.href
            ) {
                e.preventDefault();
                const targetUrl = this.href;

                // RESET TRANSITION
                transitionContainer.classList.remove(
                    'active-out',
                    'initial-cover'
                );
                const layers = transitionContainer.querySelectorAll(
                    '.transition-layer'
                );
                layers.forEach(layer => {
                    layer.style.transition = 'none';
                    layer.style.transform = 'translateX(-100%)';
                });

                // Force browser melakukan reflow
                void transitionContainer.offsetWidth;

                layers.forEach(layer => {
                    layer.style.transition = '';
                    layer.style.transform = ''; // PENTING AGAR CSS BERJALAN
                });

                // ACTIVE IN
                transitionContainer.classList.add(
                    'active-in'
                );

                setTimeout(() => {
                    /* Pada titik ini layar sudah FULL ABU-ABU */
                    setTimeout(() => {
                        window.location.href = targetUrl;
                    }, 200);
                }, 1000);
            }
        });
    });
});

//logika clip-path timeline
document.addEventListener('DOMContentLoaded', function() {
        const timeline = document.getElementById('timeline-container');
        const fillLine = document.getElementById('timeline-line-fill');
        const items = document.querySelectorAll('.timeline-item');

        function updateTimeline() {
            if (!timeline) return;
            const windowCenter = window.scrollY + (window.innerHeight / 2);
            const timelineRect = timeline.getBoundingClientRect();

            const timelineTop = timelineRect.top + window.scrollY;
            const timelineHeight = timeline.offsetHeight;

            let effectiveTipY = windowCenter - timelineTop;
            
            let lineTipY = effectiveTipY;
            if (lineTipY < 80) lineTipY = 80;
            if (lineTipY > timelineHeight) lineTipY = timelineHeight;

            fillLine.style.height = (lineTipY - 80) + 'px';

            items.forEach(item => {
                const checkpoint = item.querySelector('.timeline-checkpoint');
                const borderFill = item.querySelector('.checkpoint-border-fill');

                const checkpointCenterY = item.offsetTop + checkpoint.offsetTop;
                const radius = 35;
                const checkpointTopY = checkpointCenterY - radius;
                let percentage = 0;
                if (effectiveTipY > checkpointTopY) {
                    percentage = ((effectiveTipY - checkpointTopY) / (radius * 2)) * 100;
                    if (percentage > 100) percentage = 100;
                }

                if (borderFill) {
                    // Animasi border menggunakan clip-path
                    // Saat percentage = 0, inset bawah adalah 100% (tersembunyi)
                    // Saat percentage = 100, inset bawah adalah 0% (terlihat penuh)
                    let bottomInset = 100 - percentage;
                    borderFill.style.clipPath = `inset(0 0 ${bottomInset}% 0)`;
                }

                if (percentage >= 100) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        window.addEventListener('scroll', updateTimeline);
        window.addEventListener('resize', updateTimeline);
        updateTimeline();
    });