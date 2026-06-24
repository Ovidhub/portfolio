import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Scroll-reveal: add `.revealed` to [data-reveal] elements as they enter the viewport.
const revealAll = () => document.querySelectorAll('[data-reveal]').forEach((el) => el.classList.add('revealed'));

const initReveal = () => {
    if (!('IntersectionObserver' in window)) {
        revealAll();
        return;
    }

    const revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    revealObserver.unobserve(entry.target);
                }
            });
        },
        { rootMargin: '0px 0px -10% 0px', threshold: 0.1 },
    );

    document.querySelectorAll('[data-reveal]').forEach((el) => revealObserver.observe(el));

    // Safety net: ensure everything is visible shortly after load even if an
    // observer callback is missed (e.g. very tall sections, print, etc.).
    window.addEventListener('load', () => setTimeout(revealAll, 1200));
};

if (document.readyState !== 'loading') {
    initReveal();
} else {
    document.addEventListener('DOMContentLoaded', initReveal);
}
