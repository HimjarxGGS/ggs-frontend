import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {
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

        if (!mobileMenu.classList.contains("hidden") &&
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
});
