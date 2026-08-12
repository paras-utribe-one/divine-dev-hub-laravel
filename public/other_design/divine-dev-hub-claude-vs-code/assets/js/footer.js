/* ============================================================
   FOOTER BEHAVIOUR — newsletter form (Phase 1 stub)
   Phase 2: wired to the WordPress mailing-list endpoint.
   ============================================================ */

(function () {
  'use strict';

  const form = document.querySelector('.footer-newsletter__form');
  if (!form) return;

  const status = form.parentElement.querySelector('.footer-newsletter__status');

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const input = form.querySelector('input[type="email"]');
    if (!input || !input.checkValidity()) {
      input?.reportValidity();
      return;
    }
    const btn = form.querySelector('button');
    const originalLabel = btn.innerHTML;
    btn.setAttribute('aria-disabled', 'true');
    btn.innerHTML = '<span>Joining…</span>';

    setTimeout(() => {
      btn.innerHTML = '<span>Joined ✓</span>';
      if (status) {
        status.textContent = "You're in. Check your inbox to confirm.";
        status.classList.add('is-success');
      }
      input.value = '';
      setTimeout(() => {
        btn.removeAttribute('aria-disabled');
        btn.innerHTML = originalLabel;
      }, 2400);
    }, 700);
  });
})();
