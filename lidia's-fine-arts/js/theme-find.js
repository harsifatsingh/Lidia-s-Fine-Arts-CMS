/**
 * Richard Owino — STUDENT# 4005
 * Created: 23 Apr 2025
 *
 * theme-find.js
 * -------------
 * Handles dark/light theme switching on pages.
 */

(function () {
  const saved = localStorage.getItem("lidiaTheme");
  const prefers = matchMedia("(prefers-color-scheme: dark)").matches
    ? "dark"
    : "light";
  const mode = saved || prefers;
  document.documentElement.classList.add(mode);
})();
