import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

function initScrollReveal() {
    const targets = document.querySelectorAll('[data-reveal], [data-reveal-scale], [data-reveal-line]');

    if (!targets.length) return;

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        targets.forEach((el) => el.classList.add('is-revealed'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15, rootMargin: '0px 0px -8% 0px' }
    );

    targets.forEach((el, index) => {
        if (!el.style.getPropertyValue('--reveal-delay')) {
            el.style.setProperty('--reveal-delay', `${(index % 4) * 90}ms`);
        }
        observer.observe(el);
    });
}

function initNavScrollSpy() {
    const sections = document.querySelectorAll('main section[id]');
    const links = document.querySelectorAll('[data-nav-link]');

    if (!sections.length || !links.length || !('IntersectionObserver' in window)) return;

    const setActive = (id) => {
        links.forEach((link) => {
            const isMatch = link.getAttribute('href') === `#${id}`;
            link.classList.toggle('text-primary', isMatch);
            const underline = link.querySelector('span');
            if (underline) underline.classList.toggle('scale-x-100', isMatch);
        });
    };

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) setActive(entry.target.id);
            });
        },
        { rootMargin: '-45% 0px -45% 0px', threshold: 0 }
    );

    sections.forEach((section) => observer.observe(section));
}

document.addEventListener('DOMContentLoaded', () => {
    initScrollReveal();
    initNavScrollSpy();
});
