document.addEventListener('DOMContentLoaded', function () {

    // Swiper

    const swiperTestimonials = new Swiper(".testimonials__cards", {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 24,
            },
            1440: {
                slidesPerView: 3,
                spaceBetween: 32,
            }
        },
        pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
        },
      });

    // Accordion

    const accordions = document.querySelectorAll('.accordion-header');
    
    accordions.forEach((accordion) => {
        accordion.addEventListener('click', function () {
            const content = this.nextElementSibling;
            const item = this.parentElement;
            
            document.querySelectorAll('.accordion-item').forEach((el) => {
                if (el !== item) {
                    el.classList.remove('active');
                    el.querySelector('.accordion-content').style.maxHeight = null;
                }
            });

            item.classList.toggle('active');
            if (item.classList.contains('active')) {
                content.style.maxHeight = content.scrollHeight + 'px';
            } else {
                content.style.maxHeight = null;
            }
        });
    });

    // Modal

    const contactBtn = document.getElementById('contactBtn');
    const modal = document.getElementById('modal');
    const closeBtn = document.querySelector('.close');

    contactBtn.onclick = function () {
        modal.style.display = 'flex';
    };

    closeBtn.onclick = function () {
        modal.style.display = 'none';
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
});
