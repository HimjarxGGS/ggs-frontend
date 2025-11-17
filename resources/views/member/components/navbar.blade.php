<!-- components/layout-shell.blade.php -->
<header class="flex justify-center">
<style>
        .nav-light .nav-link {
            color: #5e3929;
        }

        .nav-dark .nav-link {
            color: #ffffff;
        }

        .nav-light .nav-link:hover {
            color: #5e3929;
        }

        .nav-dark .nav-link:hover {
            color: #e0e0e0;
        }

        .nav-light i {
            color: #2e2e2e;
        }

        .nav-dark i {
            color: #ffffff;
        }

        .nav-light i:hover {
            color: #5e3929;
        }

        .nav-dark i:hover {
            color: #ffffff;
        }
    </style>

   <nav class="fixed mx-auto w-[95%] max-w-7xl rounded-full px-14 py-3 flex items-center justify-between lg:px-20 z-[100] transition-all duration-300 mt-8">
        <!-- logo -->
       <div class="flex items-center">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-14 w-auto pt-2" />
            </a>
        </div>

        <!-- hamburger -->
        <div class="lg:hidden">
        <button id="hamburgerBtn" type="button" class="relative w-8 h-8 flex flex-col justify-between items-center p-1">
            <span class="block w-7 h-0.5 bg-gray-700 transition-all duration-300"></span>
            <span class="block w-7 h-0.5 bg-gray-700 transition-all duration-300"></span>
            <span class="block w-7 h-0.5 bg-gray-700 transition-all duration-300"></span>
        </button>
        </div>

        <!-- desktop menu -->
        <div class="hidden lg:flex flex-1 justify-center gap-x-10 items-center">
            <!-- <a href="/" class="nav-link text-gray-500 font-semibold hover:text-palette-5 transition-transform duration-300 transform hover:scale-[1.3]">Home</a> -->
            <a href="/dashboard-member" class="nav-link text-gray-500 font-semibold hover:text-palette-5 transition-transform duration-300 transform hover:scale-[1.3]">Dashboard</a>
            <a href="/riwayat-pendaftaran" class="nav-link text-gray-500 font-semibold hover:text-palette-5 transition-transform duration-300 transform hover:scale-[1.3]">History</a>
            <a href="/data-diri" class="nav-link text-gray-500 font-semibold hover:text-palette-5 transition-transform duration-300 transform hover:scale-[1.3]">Data Diri</a>
        </div>

        <div class="hidden lg:flex items-center">
            <form action="{{ route('logout') }}" method="POST">
             @csrf
              <button class=" bg-red-700 text-white font-bold py-2 px-10 rounded-full hover:bg-red-900 transition duration-300">
                Logout
              </button>
             </form>
        </div>
    </nav>

    <!-- mobile menu -->
    <div id="mobileMenu" class="hidden lg:hidden top-[113px] w-[85%] left-1/2 -translate-x-1/2 rounded-3xl backdrop-blur-3xl shadow-md py-7 text-center z-[99] fixed">
        <!-- <a href="/" class="nav-link block py-4 text-gray-500 font-semibold hover:text-[#5e3929] transition duration-200">Home</a> -->
        <a href="/dashboard-member" class="nav-link block py-4 text-gray-500 font-semibold hover:text-palette-5 transition-transform duration-300 transform hover:scale-[1.3]">Dashboard</a>
        <a href="/riwayat-pendaftaran" class="nav-link block py-4 text-gray-500 font-semibold  hover:text-palette-5 transition-transform duration-300 transform hover:scale-[1.3]">History</a>
        <a href="/data-diri" class="nav-link block py-4 text-gray-500 font-semibold hover:text-palette-5 transition-transform duration-300 transform hover:scale-[1.3]">Data Diri</a>
        
        <div class="mt-6">
          <form action="{{ route('logout') }}" method="POST">
             @csrf
            <button class="w-72 bg-red-900 text-white font-bold py-2 rounded-3xl transition duration-200">
                logout
            </button>
          </form>
        </div>
    </div>



        <!-- mobile menu -->
        <div id="mobileMenu" class="backdrop-blur-3xl hidden lg:hidden top-[110px] w-[90%] mx-auto rounded-3xl shadow-md py-7 text-center z-[99] fixed flex-col">
            <a href="/" class="nav-link text-palette-2 nav-light block py-4 font-semibold transition-transform duration-300 transform hover:scale-[1.3]">Home</a>
            <a href="/event" class="nav-link text-palette-2  nav-light block py-4 font-semibold transition-transform duration-300 transform hover:scale-[1.3]">Event</a>
            <a href="/blog" class="nav-link text-palette-2  nav-light block py-4 font-semibold transition-transform duration-300 transform hover:scale-[1.3]">Blog</a>

            <div class="mt-6">
                @auth
                <a href="{{ route('member.dashboard.index') }}">
                    <button class="w-72 bg-palette-3 text-white font-semibold py-2 px-10 rounded-full hover:bg-gray-500 transition duration-300">
                        Dashboard
                    </button>
                </a>
                @else
                <a href="{{ route('login') }}">
                    <button class="w-72 bg-palette-3 text-white font-semibold py-2 px-10 rounded-full hover:bg-gray-500 transition duration-300">
                        Sign in
                    </button>
                </a>
                @endauth
            </div>
        </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const nav = document.querySelector("nav");

            // Ensure nav has a default theme
            nav.classList.add("nav-light");

            // brightness threshold (0-255). Lower => switch to light text less often.
            const BRIGHTNESS_THRESHOLD = 140;

            // debounce helper
            function debounce(fn, wait = 80) {
                let t;
                return (...args) => {
                    clearTimeout(t);
                    t = setTimeout(() => fn(...args), wait);
                };
            }

            // parse rgb/rgba string -> [r,g,b] or null if invalid
            function parseRGB(rgb) {
                if (!rgb) return null;
                const m = rgb.match(/rgba?\((\d+),\s*(\d+),\s*(\d+)/i);
                return m ? [Number(m[1]), Number(m[2]), Number(m[3])] : null;
            }

            // perceived brightness formula
            function getBrightnessFromRGBArray(arr) {
                if (!arr) return 255;
                const [r, g, b] = arr;
                return (r * 299 + g * 587 + b * 114) / 1000;
            }

            // find the element visually behind the center of the nav
            function elementBehindNav() {
                const rect = nav.getBoundingClientRect();
                // choose a point just below the navbar (1px below)
                const x = rect.left + rect.width / 2;
                const y = rect.bottom + 1;
                // elementFromPoint with the nav included would return the nav itself,
                // so we choose a y below nav
                return document.elementFromPoint(x, Math.min(y, window.innerHeight - 1));
            }

            // climb DOM until we find a non-transparent background color
            function findBackgroundColor(el) {
                let node = el;

                while (node && node !== document.documentElement) {
                    const style = window.getComputedStyle(node);
                    const bg = style.backgroundColor; // e.g. "rgba(0, 0, 0, 0)" or "rgb(255, 255, 255)"
                    const img = style.backgroundImage;
                    const rgb = parseRGB(bg);

                    // If element has a background-image, we try to treat it as "non-transparent"
                    // but we can't sample the image easily here. We'll assume images are darker by default.
                    if (img && img !== 'none') {
                        // Optional: tweak behavior if your images are light/dark
                        // For now, fall back to treating it as "dark" (small brightness).
                        return {
                            brightness: 80,
                            source: 'image'
                        };
                    }

                    if (rgb) {
                        const alphaMatch = bg.match(/rgba\([^)]+\)/i);
                        // if rgba with alpha == 0, treat as transparent
                        if (alphaMatch && bg.includes('rgba')) {
                            const alpha = parseFloat(bg.split(',').pop().replace(')', '').trim());
                            if (alpha === 0) {
                                node = node.parentElement;
                                continue;
                            }
                        }
                        return {
                            brightness: getBrightnessFromRGBArray(rgb),
                            source: 'color'
                        };
                    }

                    node = node.parentElement;
                }

                // fallback to body background or white
                const bodyStyle = window.getComputedStyle(document.body);
                const bodyRgb = parseRGB(bodyStyle.backgroundColor);
                console.debug("bodyRgb : ", bodyRgb, " ")
                return {
                    brightness: 255, // default body is white //getBrightnessFromRGBArray(bodyRgb),
                    source: 'body'
                };
            }

            function applyThemeForBrightness(brightness) {
                if (brightness < BRIGHTNESS_THRESHOLD) {
                    nav.classList.remove('nav-light');
                    nav.classList.add('nav-dark');
                } else {
                    nav.classList.remove('nav-dark');
                    nav.classList.add('nav-light');
                }
            }

            // main updater
            function updateNavbarTheme() {
                const el = elementBehindNav();
                const info = findBackgroundColor(el);
                applyThemeForBrightness(info.brightness);
                // optional: debugging
                console.debug('nav bg source', info.source, 'brightness', info.brightness);
            }

            // run on load and on scroll/resize (debounced)
            updateNavbarTheme();
            const debounced = debounce(updateNavbarTheme, 100);
            window.addEventListener('scroll', debounced, {
                passive: true
            });
            window.addEventListener('resize', debounced);
        });
    </script>


</header>


    
