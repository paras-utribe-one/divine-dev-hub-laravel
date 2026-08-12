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

// Nav active-state used to be computed here by watching which #anchor section
// was scrolled into view — that only made sense while nav links were anchors
// into a single homepage. Now that they're real page URLs, which link is
// "active" is known at request time, so it's computed server-side in
// components/header.blade.php (via request()->routeIs()) instead of here.

document.addEventListener('DOMContentLoaded', () => {
    initScrollReveal();
});
