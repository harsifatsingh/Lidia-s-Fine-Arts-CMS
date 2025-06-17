/**
 * Harsifat Singh — STUDENT# 400592879
 * Created: 23 Apr 2025
 *
 * gallery.js
 * ----------
 * Public gallery page:
 *   – Theme switching
 *   – Toggle sort order (newest, ∙price ↑, ∙price ↓)
 *   – Fetch art pieces via AJAX
 *   – Simple lightbox overlay
 */

window.addEventListener("load", function () {
  /**
   * Load and display gallery cards.
   *
   * @param {"price_asc" | "price_desc" | ""} sort
   * @returns {Promise<void>}
   */
  async function loadGallery(sort = "") {
    let url = "get_art_pieces.php";
    if (sort) url += "?sort=" + encodeURIComponent(sort);

    try {
      const resp = await fetch(url);
      const data = await resp.json();
      const gallery = document.getElementById("gallery");
      gallery.innerHTML = "";
      data.forEach((piece) => {
        const card = document.createElement("div");
        card.className = "art-piece";
        card.innerHTML = `
          <div class="lightbox-trigger" onclick="openLightbox(this)">
            <img src="${piece.image}" alt="${piece.title}">
          </div>
          <div class="info">
            <h3 class="info-title">${piece.title}</h3>
            <div class="info-price">${piece.price}</div>
            <p class="info-description">${piece.description}</p>
          </div>
        `;
        gallery.append(card);
      });
    } catch (err) {
      console.error("Error loading gallery:", err);
    }
  }

  // Sort Toggle Setup
  const sortButton = document.getElementById("sortButton");
  const sortIcon = sortButton.querySelector(".sort-icon");
  const sortLabel = sortButton.querySelector(".sort-label");
  let currentSort = ""; // "" = newest first

  sortButton.addEventListener("click", () => {
    // Cycle: newest → price↑ → price↓
    if (currentSort === "") {
      currentSort = "price_asc";
      sortIcon.textContent = "↑";
      sortLabel.textContent = "Low-High";
    } else if (currentSort === "price_asc") {
      currentSort = "price_desc";
      sortIcon.textContent = "↓";
      sortLabel.textContent = "High-Low";
    } else {
      currentSort = "";
      sortIcon.textContent = "↓";
      sortLabel.textContent = "Newest";
    }
    localStorage.setItem("lidiaSortPref", currentSort);
    loadGallery(currentSort);
  });

  // Initial load with saved preference
  const savedSort = localStorage.getItem("lidiaSortPref");
  if (savedSort) {
    currentSort = savedSort;
    if (currentSort === "price_asc") {
      sortIcon.textContent = "↑";
      sortLabel.textContent = "Low-High";
    } else if (currentSort === "price_desc") {
      sortIcon.textContent = "↓";
      sortLabel.textContent = "High-Low";
    }
  }
  loadGallery(currentSort);

  /**
   * Lightbox overlay for enlarged image view.
   *
   * @param {HTMLElement} el – element with child <img>
   * @returns {void}
   */
  window.openLightbox = function openLightbox(el) {
    // keep global for inline onclick
    const src = el.querySelector("img").src;
    const overlay = document.createElement("div");
    overlay.className = "lightbox-overlay";
    overlay.innerHTML = `
      <div class="lightbox-content">
        <button onclick="this.closest('.lightbox-overlay').remove()">Close</button>
        <img src="${src}" alt="">
      </div>
    `;
    document.body.append(overlay);
  };
});
