/* ============================================================
   TABS — technology category filter (role=tablist, arrow-key nav)
   See /docs/05-components-motion-seo-roadmap.md §8.2 (C27)
   ============================================================ */

(function () {
  'use strict';

  document.querySelectorAll('[data-tabs]').forEach((root) => {
    const tabs = [...root.querySelectorAll('[role="tab"]')];
    const panels = [...root.querySelectorAll('[role="tabpanel"]')];
    if (!tabs.length) return;

    function activate(tab, { focus = true } = {}) {
      tabs.forEach((t) => {
        const selected = t === tab;
        t.setAttribute('aria-selected', String(selected));
        t.tabIndex = selected ? 0 : -1;
      });
      panels.forEach((p) => {
        p.hidden = p.id !== tab.getAttribute('aria-controls');
      });
      if (focus) tab.focus();
    }

    tabs.forEach((tab, i) => {
      tab.addEventListener('click', () => activate(tab, { focus: false }));
      tab.addEventListener('keydown', (e) => {
        let next = null;
        if (e.key === 'ArrowRight') next = tabs[(i + 1) % tabs.length];
        if (e.key === 'ArrowLeft') next = tabs[(i - 1 + tabs.length) % tabs.length];
        if (e.key === 'Home') next = tabs[0];
        if (e.key === 'End') next = tabs[tabs.length - 1];
        if (next) { e.preventDefault(); activate(next); }
      });
    });
  });
})();
