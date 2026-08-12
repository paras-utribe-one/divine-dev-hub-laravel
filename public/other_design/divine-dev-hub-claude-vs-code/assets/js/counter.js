/* ============================================================
   STAT COUNTERS — count up from 0 once, on scroll into view.
   The real value must already be present in the DOM (data-count-to)
   so no-JS and crawlers see the correct number immediately.
   See /docs/05-components-motion-seo-roadmap.md §9.3
   ============================================================ */

(function () {
  'use strict';

  const els = document.querySelectorAll('[data-count-to]');
  if (!els.length) return;

  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function animateCount(el) {
    const to = parseFloat(el.getAttribute('data-count-to'));
    const suffix = el.getAttribute('data-count-suffix') || '';
    const decimals = el.getAttribute('data-count-decimals') ? parseInt(el.getAttribute('data-count-decimals'), 10) : 0;
    const duration = 1600;

    if (reduceMotion || !('requestAnimationFrame' in window)) {
      el.textContent = to.toFixed(decimals) + suffix;
      return;
    }

    const start = performance.now();
    const from = 0;

    function tick(now) {
      const elapsed = now - start;
      const progress = Math.min(elapsed / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
      const current = from + (to - from) * eased;
      el.textContent = current.toFixed(decimals) + suffix;
      if (progress < 1) requestAnimationFrame(tick);
      else el.textContent = to.toFixed(decimals) + suffix;
    }
    requestAnimationFrame(tick);
  }

  if (!('IntersectionObserver' in window)) {
    els.forEach(animateCount);
    return;
  }

  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        animateCount(entry.target);
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  els.forEach((el) => io.observe(el));
})();
