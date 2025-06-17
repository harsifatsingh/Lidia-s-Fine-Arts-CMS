/**
 * Anthony Codreanu — STUDENT# 400575585
 * Abheyjeet Gill — STUDENT# 400597565
 * 
 * Created: 23 Apr 2025
 *
 * admin-db.js
 * -----------
 * Admin dashboard helpers:
 *   – Show/hide tabbed panels
 *   – Theme toggle identical to public pages
 */

window.addEventListener("load", function () {
  // 1. Hide all panels initially
  document
    .querySelectorAll(".panel")
    .forEach((p) => p.classList.remove("active"));

  /**
   * Show exactly one panel by id.
   *
   * @param {string} id – panel element id to display
   * @returns {void}
   */
  function show(id) {
    document
      .querySelectorAll(".panel")
      .forEach((p) => p.classList.remove("active"));
    const panel = document.getElementById(id);
    if (panel) panel.classList.add("active");
  }

  // 3. Tab buttons → panels
  const tabs = { btnArt: "art", btnBook: "book", btnAbout: "about" };
  Object.entries(tabs).forEach(([btnId, panelId]) => {
    const btn = document.getElementById(btnId);
    if (btn) btn.addEventListener("click", () => show(panelId));
  });

  // 4. Theme-toggle
  const themeBtn = document.getElementById("themeToggle");
  const root = document.documentElement;
  if (themeBtn) {
    /**
     * Switch dark/light on the admin dashboard.
     *
     * @returns {void}
     */
    function flipTheme() {
      root.classList.toggle("dark");
      root.classList.toggle("light");
      themeBtn.textContent = root.classList.contains("dark") ? "☀" : "☾";
      localStorage.setItem(
        "lidiaTheme",
        root.classList.contains("dark") ? "dark" : "light"
      );
    }
    themeBtn.addEventListener("click", flipTheme);

    // Initialise from saved or OS preference
    const saved = localStorage.getItem("lidiaTheme");
    if (
      saved === "dark" ||
      (!saved && window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
      root.classList.add("dark");
      root.classList.remove("light");
      themeBtn.textContent = "☀";
    }
  }
});
