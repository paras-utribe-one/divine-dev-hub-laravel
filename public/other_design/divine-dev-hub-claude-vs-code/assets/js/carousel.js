/* ============================================================
   CAROUSEL — testimonials (native scroll-snap + prev/next + dots)
   See /docs/05-components-motion-seo-roadmap.md §8.2
   ============================================================ */

(function () {
  'use strict';

  document.querySelectorAll('[data-carousel]').forEach((root) => {
    const track = root.querySelector('[data-carousel-track]');
    const prevBtn = root.querySelector('[data-carousel-prev]');
    const nextBtn = root.querySelector('[data-carousel-next]');
    const dotsWrap = root.querySelector('[data-carousel-dots]');
    if (!track) return;

    const slides = [...track.children];
    if (dotsWrap) {
      dotsWrap.innerHTML = slides.map((_, i) =>
        `<button aria-label="Go to slide ${i + 1}" ${i === 0 ? 'class="is-active" aria-current="true"' : ''}></button>`
      ).join('');
    }
    const dots = dotsWrap ? [...dotsWrap.children] : [];

    function slidesPerView() {
      const trackWidth = track.clientWidth;
      const slideWidth = slides[0]?.getBoundingClientRect().width || trackWidth;
      return Math.max(1, Math.round(trackWidth / slideWidth));
    }

    function currentIndex() {
      const slideWidth = slides[0]?.getBoundingClientRect().width || 1;
      const gap = parseFloat(getComputedStyle(track).columnGap || getComputedStyle(track).gap || '0');
      return Math.round(track.scrollLeft / (slideWidth + gap));
    }

    function goTo(index) {
      const slideWidth = slides[0]?.getBoundingClientRect().width || 0;
      const gap = parseFloat(getComputedStyle(track).columnGap || getComputedStyle(track).gap || '0');
      const clamped = Math.max(0, Math.min(index, slides.length - 1));
      track.scrollTo({ left: clamped * (slideWidth + gap), behavior: 'smooth' });
    }

    function updateDots() {
      const idx = Math.min(currentIndex(), slides.length - slidesPerView());
      dots.forEach((d, i) => {
        const active = i === Math.max(0, idx);
        d.classList.toggle('is-active', active);
        if (active) d.setAttribute('aria-current', 'true'); else d.removeAttribute('aria-current');
      });
    }

    prevBtn?.addEventListener('click', () => goTo(currentIndex() - 1));
    nextBtn?.addEventListener('click', () => goTo(currentIndex() + 1));
    dots.forEach((dot, i) => dot.addEventListener('click', () => goTo(i)));

    let ticking = false;
    track.addEventListener('scroll', () => {
      if (!ticking) {
        requestAnimationFrame(() => { updateDots(); ticking = false; });
        ticking = true;
      }
    }, { passive: true });

    updateDots();
  });
})();
