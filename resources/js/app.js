import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById("hamburgerBtn");
    const mobileMenu = document.getElementById("mobileMenu");
    const navbar = document.querySelector("nav");

    // Toggle mobile menu
    if (toggleBtn && mobileMenu) {
        toggleBtn.addEventListener("click", (event) => {
            event.stopPropagation(); // Biar tidak langsung tertutup karena event bubbling
            mobileMenu.classList.toggle("hidden");
            document.body.classList.toggle("overflow-hidden");
        });
    }

    // Close mobile menu outside
    document.addEventListener("click", (event) => {
        const isClickInsideMenu = mobileMenu.contains(event.target);
        const isClickToggle = toggleBtn.contains(event.target);

        if (!mobileMenu.classList.contains("hidden") &&
            !isClickInsideMenu &&
            !isClickToggle
        ) {
            mobileMenu.classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
        }
    });

    // Scroll behavior
    window.addEventListener("scroll", () => {
        if (window.scrollY > 10) {
            navbar.classList.add("bg-[#F2F2F7]", "backdrop-blur-md", "shadow-md");
        } else {
            navbar.classList.remove("bg-[#F2F2F7]", "backdrop-blur-md", "shadow-md");
        }
    });
});
