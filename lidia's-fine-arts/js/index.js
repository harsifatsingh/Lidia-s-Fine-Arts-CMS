/**
 * Richard Owino — STUDENT# 4005
 * Created: 23 Apr 2025
 *
 * index.js
 * --------
 * Front-page behaviour:
 *   • Infinite marquee of reviews with auto-scroll
 *   • Drag / touch / wheel interaction to pause auto-scroll
 */

window.addEventListener("DOMContentLoaded", () => {
  const track = document.getElementById("review-track");
  const container = document.getElementById("review-container");

  // 1) Duplicate reviews for infinite loop
  track.innerHTML += track.innerHTML;
  const halfWidth = track.scrollWidth / 2;

  // 2) Auto-scroll vs manual-scroll flags
  let manualScroll = false;
  let resumeTimer = null;
  const speed = 1; // pixels per frame

  /**
   * Begin manual scrolling: set flag and clear pending resume timer.
   *
   * @returns {void}
   */
  function startManual() {
    manualScroll = true;
    clearTimeout(resumeTimer);
  }

  /**
   * Schedule auto-scroll to resume 1 s after the last user interaction.
   *
   * @returns {void}
   */
  function endManual() {
    clearTimeout(resumeTimer);
    resumeTimer = setTimeout(() => {
      manualScroll = false;
    }, 1000);
  }

  /**
   * Perform continuous marquee motion unless manualScroll is active.
   *
   * @returns {void}
   */
  function autoScroll() {
    if (!manualScroll) {
      container.scrollLeft += speed;
      if (container.scrollLeft >= halfWidth) {
        container.scrollLeft = 0;
      }
    }
    requestAnimationFrame(autoScroll);
  }
  autoScroll();

  // 3) Drag-to-scroll handlers
  let isDown = false;
  let startX = 0;
  let scrollLeft = 0;

  container.addEventListener("mousedown", (e) => {
    isDown = true;
    startManual();
    container.classList.add("grabbing");
    startX = e.pageX - container.offsetLeft;
    scrollLeft = container.scrollLeft;
  });
  ["mouseup", "mouseleave"].forEach((evt) =>
    container.addEventListener(evt, () => {
      isDown = false;
      container.classList.remove("grabbing");
      endManual();
    })
  );
  container.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - container.offsetLeft;
    const walk = x - startX;
    container.scrollLeft = scrollLeft - walk;
  });

  // 4) Touch-drag support
  container.addEventListener("touchstart", (e) => {
    isDown = true;
    startManual();
    startX = e.touches[0].pageX - container.offsetLeft;
    scrollLeft = container.scrollLeft;
  });
  container.addEventListener("touchmove", (e) => {
    if (!isDown) return;
    const x = e.touches[0].pageX - container.offsetLeft;
    const walk = x - startX;
    container.scrollLeft = scrollLeft - walk;
  });
  container.addEventListener("touchend", () => {
    isDown = false;
    endManual();
  });

  // 5) Wheel / two-finger touch-pad support
  container.addEventListener(
    "wheel",
    () => {
      startManual();
      endManual();
    },
    { passive: true }
  );
});
