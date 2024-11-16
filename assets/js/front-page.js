// Accordion
document.addEventListener('DOMContentLoaded', function () {
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
});
