import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    // Hamburger menu code
    const toggleBtn = document.getElementById("hamburgerBtn");
    const mobileMenu = document.getElementById("mobileMenu");
    const navbar = document.querySelector("nav");

    // toggle mobile menu
    toggleBtn.addEventListener("click", () => {
        toggleBtn.classList.toggle("hamburger-active");
        mobileMenu.classList.toggle("hidden");
    });

    // close mobile menu outside
    document.addEventListener("click", (event) => {
        const isClickInsideMenu = mobileMenu.contains(event.target);
        const isClickToggle = toggleBtn.contains(event.target);

        if (
            !mobileMenu.classList.contains("hidden") &&
            !isClickInsideMenu &&
            !isClickToggle
        ) {
            mobileMenu.classList.add("hidden");
            toggleBtn.classList.remove("hamburger-active");
            document.body.classList.remove("overflow-hidden");
        }
    });

    // scroll behavior
    window.addEventListener("scroll", () => {
        if (window.scrollY > 10) {
            navbar.classList.add("backdrop-blur-3xl");
            navbar.classList.remove("bg-[#F2F2F7]", "shadow-md");
        } else {
            navbar.classList.remove("backdrop-blur-md");
        }
    });

    function countUp(el, target, duration) {
        let start = 0;
        let increment = target / (duration / 50);
        let interval = setInterval(() => {
            start += increment;
            if (start >= target) {
                start = target;
                clearInterval(interval);
                el.textContent = Math.floor(start) + " + ";
            } else {
                el.textContent = Math.floor(start);
            }
        }, 70);
    }

    countUp(document.getElementById("volunteerCount"), 880, 3000);
    countUp(document.getElementById("eventCount"), 11, 3000);
    countUp(document.getElementById("dampak1"), 155, 3000);
    countUp(document.getElementById("dampak2"), 303, 5000);

    // File input code
    const dropPoster = document.getElementById("dropPoster");
    const fileInput = document.getElementById("poster");

    dropPoster.addEventListener("click", () => fileInput.click());

    dropPoster.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropPoster.classList.add("bg-gray-200");
    });

    dropPoster.addEventListener("dragleave", () => {
        dropPoster.classList.remove("bg-gray-200");
    });

    dropPoster.addEventListener("drop", (e) => {
        e.preventDefault();
        dropPoster.classList.remove("bg-gray-200");

        if (e.dataTransfer.files.length > 0) {
            fileInput.files = e.dataTransfer.files;
            console.log("File dropped:", fileInput.files[0]);
        }
    });
});
