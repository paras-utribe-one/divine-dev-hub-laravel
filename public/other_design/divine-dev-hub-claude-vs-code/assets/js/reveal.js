/* ============================================================
   SCROLL REVEAL — shared IntersectionObserver for .reveal elements
   See /docs/05-components-motion-seo-roadmap.md §9.3
   ============================================================ */

(function () {
  'use strict';

  const els = document.querySelectorAll('.reveal');
  if (!els.length) return;

  if (!('IntersectionObserver' in window) ||
      window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    els.forEach((el) => el.classList.add('is-visible'));
    return;
  }

  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -12% 0px' });

  els.forEach((el, i) => {
    el.style.setProperty('--i', i % 8);
    io.observe(el);
  });
})();
