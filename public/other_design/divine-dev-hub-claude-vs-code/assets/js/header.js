/* ============================================================
   HEADER BEHAVIOUR
   Scroll state, mega menu, mobile drawer, search overlay,
   sticky mobile action bar. Vanilla JS, no dependencies.
   See /docs/03-header-footer-homepage.md §4 for spec.
   ============================================================ */

(function () {
  'use strict';

  const header = document.querySelector('.site-header');
  if (!header) return;

  const sentinel = document.getElementById('header-sentinel');
  const mobileBar = document.querySelector('.mobile-action-bar');
  const body = document.body;

  /* ---------------- Scrolled state (IntersectionObserver, not scroll listener) ---------------- */
  if (sentinel && 'IntersectionObserver' in window) {
    const io = new IntersectionObserver(
      ([entry]) => header.classList.toggle('is-scrolled', !entry.isIntersecting),
      { threshold: 0, rootMargin: '-1px 0px 0px 0px' }
    );
    io.observe(sentinel);
  }

  /* ---------------- Hide-on-scroll-down / show-on-scroll-up ---------------- */
  let lastY = window.scrollY;
  let ticking = false;
  const HIDE_AFTER = 400;

  function onScroll() {
    const y = window.scrollY;
    const delta = y - lastY;

    if (!body.classList.contains('has-menu-open') && !body.classList.contains('drawer-open')) {
      if (y > HIDE_AFTER && delta > 8) {
        header.classList.add('is-hidden');
      } else if (delta < -4 || y <= HIDE_AFTER) {
        header.classList.remove('is-hidden');
      }
    }

    if (mobileBar) {
      const showAt = window.innerHeight * 0.25;
      mobileBar.classList.toggle('is-visible', y > showAt);
    }

    lastY = y;
    ticking = false;
  }

  window.addEventListener('scroll', () => {
    if (!ticking) {
      requestAnimationFrame(onScroll);
      ticking = true;
    }
  }, { passive: true });

  /* ---------------- Mega menu ---------------- */
  const navItems = document.querySelectorAll('.nav-item[data-menu]');
  // Per-item timers (not shared) — hovering item A must never cancel item B's pending timer.
  const openTimers = new Map();
  const closeTimers = new Map();
  const OPEN_DELAY = 120;
  const CLOSE_DELAY = 300;

  function setMenuOpenState(isOpen) {
    // Toggled on both body (for global styles like scroll-lock hooks) and the
    // header element itself, since header.css's `.site-header.has-menu-open`
    // rules require the class on the header, not just an ancestor.
    body.classList.toggle('has-menu-open', isOpen);
    header.classList.toggle('has-menu-open', isOpen);
  }

  function closeItem(item) {
    if (!item.classList.contains('is-open')) return;
    item.classList.remove('is-open');
    item.querySelector('.nav-trigger')?.setAttribute('aria-expanded', 'false');
  }

  function closeAllMenus(except) {
    navItems.forEach((item) => {
      if (item !== except) closeItem(item);
    });
    if (!except) setMenuOpenState(false);
  }

  function openMenu(item) {
    closeTimers.get(item) && clearTimeout(closeTimers.get(item));
    closeAllMenus(item);
    item.classList.add('is-open');
    item.querySelector('.nav-trigger')?.setAttribute('aria-expanded', 'true');
    setMenuOpenState(true);
  }

  function scheduleClose(item) {
    const t = setTimeout(() => {
      closeItem(item);
      const anyOpen = document.querySelector('.nav-item.is-open');
      if (!anyOpen) setMenuOpenState(false);
    }, CLOSE_DELAY);
    closeTimers.set(item, t);
  }

  navItems.forEach((item) => {
    const trigger = item.querySelector('.nav-trigger');
    const panel = item.querySelector('.mega-panel');
    if (!trigger || !panel) return;

    trigger.setAttribute('aria-expanded', 'false');
    trigger.setAttribute('aria-haspopup', 'true');

    item.addEventListener('mouseenter', () => {
      const pendingClose = closeTimers.get(item);
      if (pendingClose) { clearTimeout(pendingClose); closeTimers.delete(item); }
      if (item.classList.contains('is-open')) return; // already open — nothing to schedule
      const pendingOpen = openTimers.get(item);
      if (pendingOpen) clearTimeout(pendingOpen);
      openTimers.set(item, setTimeout(() => openMenu(item), OPEN_DELAY));
    });
    item.addEventListener('mouseleave', () => {
      const pendingOpen = openTimers.get(item);
      if (pendingOpen) { clearTimeout(pendingOpen); openTimers.delete(item); }
      scheduleClose(item);
    });

    trigger.addEventListener('click', (e) => {
      e.preventDefault();
      if (item.classList.contains('is-open')) {
        closeItem(item);
        setMenuOpenState(false);
      } else {
        openMenu(item);
      }
    });

    trigger.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowDown') {
        e.preventDefault();
        openMenu(item);
        panel.querySelector('a')?.focus();
      }
      if (e.key === 'Escape') {
        closeItem(item);
        setMenuOpenState(false);
        trigger.focus();
      }
    });

    panel.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        closeItem(item);
        setMenuOpenState(false);
        trigger.focus();
      }
    });
  });

  document.querySelector('.nav-backdrop')?.addEventListener('click', () => closeAllMenus());

  document.addEventListener('click', (e) => {
    if (!e.target.closest('.nav-item')) closeAllMenus();
  });

  /* ---------------- Mobile drawer ---------------- */
  const drawer = document.querySelector('.mobile-drawer');
  const hamburgerBtn = document.querySelector('.hamburger-btn');
  const drawerBackdrop = document.querySelector('.mobile-drawer-backdrop');
  const drawerCloseBtn = document.querySelector('.mobile-drawer__close');
  let lastFocused = null;

  function openDrawer() {
    lastFocused = document.activeElement;
    body.classList.add('drawer-open');
    hamburgerBtn?.setAttribute('aria-expanded', 'true');
    drawer?.querySelector('a,button')?.focus();
    document.addEventListener('keydown', trapDrawerFocus);
  }
  function closeDrawer() {
    body.classList.remove('drawer-open');
    hamburgerBtn?.setAttribute('aria-expanded', 'false');
    document.removeEventListener('keydown', trapDrawerFocus);
    lastFocused?.focus();
  }
  function trapDrawerFocus(e) {
    if (e.key === 'Escape') { closeDrawer(); return; }
    if (e.key !== 'Tab' || !drawer) return;
    const focusables = drawer.querySelectorAll('a,button,input,[tabindex]:not([tabindex="-1"])');
    if (!focusables.length) return;
    const first = focusables[0];
    const last = focusables[focusables.length - 1];
    if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
    else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
  }

  hamburgerBtn?.addEventListener('click', () => {
    body.classList.contains('drawer-open') ? closeDrawer() : openDrawer();
  });
  drawerBackdrop?.addEventListener('click', closeDrawer);
  drawerCloseBtn?.addEventListener('click', closeDrawer);

  /* Drawer accordion */
  document.querySelectorAll('.mdrawer-item__trigger').forEach((trigger) => {
    trigger.addEventListener('click', () => {
      const item = trigger.closest('.mdrawer-item');
      const wasOpen = item.classList.contains('is-open');
      document.querySelectorAll('.mdrawer-item.is-open').forEach((el) => {
        el.classList.remove('is-open');
        el.querySelector('.mdrawer-item__trigger')?.setAttribute('aria-expanded', 'false');
      });
      if (!wasOpen) {
        item.classList.add('is-open');
        trigger.setAttribute('aria-expanded', 'true');
      }
    });
  });

  /* ---------------- Search overlay ---------------- */
  const searchOverlay = document.querySelector('.search-overlay');
  const searchInput = searchOverlay?.querySelector('input');
  const searchTriggers = document.querySelectorAll('[data-search-trigger]');
  const searchClose = document.querySelector('.search-overlay__close');
  let searchLastFocused = null;

  function openSearch() {
    searchLastFocused = document.activeElement;
    searchOverlay?.classList.add('is-open');
    searchOverlay?.setAttribute('aria-hidden', 'false');
    setTimeout(() => searchInput?.focus(), 50);
    document.addEventListener('keydown', onSearchKeydown);
  }
  function closeSearch() {
    searchOverlay?.classList.remove('is-open');
    searchOverlay?.setAttribute('aria-hidden', 'true');
    document.removeEventListener('keydown', onSearchKeydown);
    searchLastFocused?.focus();
  }
  function onSearchKeydown(e) {
    if (e.key === 'Escape') closeSearch();
  }

  searchTriggers.forEach((btn) => btn.addEventListener('click', openSearch));
  searchClose?.addEventListener('click', closeSearch);
  searchOverlay?.addEventListener('click', (e) => {
    if (e.target === searchOverlay) closeSearch();
  });

  document.addEventListener('keydown', (e) => {
    if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') {
      e.preventDefault();
      openSearch();
    }
  });

  /* ---------------- Set hero-context attribute from page ---------------- */
  const heroDark = document.querySelector('[data-page-hero="dark"]');
  if (heroDark) header.setAttribute('data-hero', 'dark');

})();
