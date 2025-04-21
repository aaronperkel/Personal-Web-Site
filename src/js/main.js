document.addEventListener('DOMContentLoaded', () => {
  const btn = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.nav-list');
  if (btn && nav) {
    btn.addEventListener('click', () => nav.classList.toggle('show'));
  }

  // Popup handlers
  window.openPopup = (imgSrc, html) => {
    const popup = document.getElementById('popup');
    document.getElementById('popup-img').src = imgSrc;
    document.getElementById('popup-text').innerHTML = html;
    popup.style.display = 'flex';
    document.body.classList.add('no-scroll');
  };
  window.closePopup = (e) => {
    const popup = document.getElementById('popup');
    popup.style.display = 'none';
    document.body.classList.remove('no-scroll');
  };

  // Attach to each project card
  document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', () => {
      const img = card.querySelector('img').src;
      const title = card.querySelector('h3').textContent;
      // Customize description if needed via data-desc attribute
      const desc = card.dataset.desc || '';
      openPopup(img, `<h3>${title}</h3><p>${desc}</p>`);
    });
  });

  // If we came with a ?project=Name param, open that card
  if (window.location.pathname.endsWith('index.php')) {
    const params = new URLSearchParams(window.location.search);
    const project = params.get('project');
    if (project) {
      const card = Array.from(document.querySelectorAll('.card'))
        .find(c => c.querySelector('h3').textContent.trim() === project);
      if (card) {
        // reuse your card‑popup logic
        const img = card.querySelector('img').src;
        const desc = card.dataset.desc || '';
        openPopup(img, `<h3>${project}</h3><p>${desc}</p>`);
      }
    }
  }
});