(() => {
  'use strict';

  /* ===== 主题切换 ===== */
  const toggleBtn = document.getElementById('themeToggle');
  const root = document.documentElement;

  function applyTheme(theme) {
    root.setAttribute('data-theme', theme);
    toggleBtn.textContent = theme === 'dark' ? '☀' : '🌙';
    localStorage.setItem('theme', theme);
  }

  const saved = localStorage.getItem('theme');
  const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
  applyTheme(saved || (prefersDark ? 'dark' : 'light'));

  toggleBtn.addEventListener('click', () => {
    const current = root.getAttribute('data-theme');
    applyTheme(current === 'dark' ? 'light' : 'dark');
  });

  /* ===== 汉堡菜单 ==== */
  const burger = document.getElementById('burger');
  const nav = document.getElementById('mainNav');

  burger.addEventListener('click', () => {
    nav.classList.toggle('open');
    burger.textContent = nav.classList.contains('open') ? '✕' : '☰';
  });

  nav.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', (e) => {
      const href = a.getAttribute('href');

      // 锚点
      if (href.startsWith('#')) {
        e.preventDefault();
        nav.classList.remove('open');
        burger.textContent = '☰';

        setTimeout(() => {
          const target = document.querySelector(href);
          if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
          }
        }, 300);

        return;
      }

      // 非锚点（dlyz / wall）
      nav.classList.remove('open');
      burger.textContent = '☰';
    });
  });

  /* ===== 滚动渐显 ===== */
  const fadeEls = document.querySelectorAll('.section, .card, .stat-card');
  const fadeObserver = new IntersectionObserver(entries => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        e.target.style.transitionDelay = `${i * 60}ms`;
        e.target.classList.add('visible');
        fadeObserver.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });

  fadeEls.forEach(el => {
    el.classList.add('fade-init');
    fadeObserver.observe(el);
  });

  /* ===== 数字滚动动画 ==== */
  const counters = document.querySelectorAll('.stat-value');
  const countObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = Number(el.textContent.replace(/\D/g, ''));
        let v = 0;
        const step = target / 60;
        const tick = () => {
          v += step;
          if (v < target) {
            el.textContent = Math.floor(v).toString();
            requestAnimationFrame(tick);
          } else {
            el.textContent = target.toString();
          }
        };
        tick();
        countObserver.unobserve(el);
      }
    });
  }, { threshold: 0.6 });

  counters.forEach(c => countObserver.observe(c));

  /* ===== 粒子背景 ===== */
  const canvas = document.getElementById('particles');
  if (canvas) {
    const ctx = canvas.getContext('2d');
    let particles = [];

    function resize() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    }
    window.addEventListener('resize', resize);
    resize();

    for (let i = 0; i < 60; i++) {
      particles.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        r: Math.random() * 1.2 + 0.3,
        dx: (Math.random() - 0.5) * 0.3,
        dy: (Math.random() - 0.5) * 0.3
      });
    }

    function draw() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);

      particles.forEach(p => {
        ctx.globalAlpha = 0.25;
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fill();
        p.x += p.dx;
        p.y += p.dy;
        if (p.x < 0 || p.x > canvas.width) p.dx *= -1;
        if (p.y < 0 || p.y > canvas.height) p.dy *= -1;
      });
      requestAnimationFrame(draw);
    }
    draw();
  }

})();