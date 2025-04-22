document.addEventListener('DOMContentLoaded', () => {
  const cards = Array.from(document.querySelectorAll('.card'));
  let currentIndex = 0;

  window.openPopup = (imgSrc, html, idx) => {
    currentIndex = idx;
    document.getElementById('popup-img').src = imgSrc;
    document.getElementById('popup-text').innerHTML = html;
    document.getElementById('popup').style.display = 'flex';
    document.body.classList.add('no-scroll');
  };

  cards.forEach((card, idx) => {
    card.addEventListener('click', () => {
      openPopup(
        card.querySelector('img').src,
        `<h3>${card.querySelector('h3').textContent}</h3><p>${card.dataset.desc || ''}</p>`,
        idx
      );
    });
  });

  document.getElementById('popup-prev').addEventListener('click', e => {
    e.stopPropagation();
    cards[(currentIndex - 1 + cards.length) % cards.length].click();
  });
  document.getElementById('popup-next').addEventListener('click', e => {
    e.stopPropagation();
    cards[(currentIndex + 1) % cards.length].click();
  });

  window.closePopup = e => {
    document.getElementById('popup').style.display = 'none';
    document.body.classList.remove('no-scroll');
  };

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