<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logos/main-logo.png" type="image/png"/>
    <title>@yield('title')</title>
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet"/>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-200 dark:bg-gray-500">
    <div class="bg-gray-200 dark:bg-gray-500">
        @include('sweetalert::alert')
        @include('User.Layouts.Header')
        @yield('content')
        <button type="button" x-data="{}" @click="window.scrollTo({ top: 0, behavior: 'smooth' })"  class="!fixed bottom-5 z-50 end-5 hidden rounded-full bg-blue-600 p-3 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg"
            id="scroll-to-top">
            <span class="[&>svg]:w-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                </svg>
            </span>
        </button>
        @include('User.Layouts.Footer')
    </div>

    @yield('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
            var themeToggleBtn = document.getElementById('theme-toggle');

            // Initial theme check
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window
                    .matchMedia('(prefers-color-scheme: ligth)').matches)) {
                document.documentElement.classList.add('dark');
                if (themeToggleLightIcon) themeToggleLightIcon.classList.remove('hidden');
                if (themeToggleDarkIcon) themeToggleDarkIcon.classList.add('hidden');
            } else {
                document.documentElement.classList.remove('dark');
                if (themeToggleLightIcon) themeToggleLightIcon.classList.add('hidden');
                if (themeToggleDarkIcon) themeToggleDarkIcon.classList.remove('hidden');
            }

            // Theme toggle button event listener
            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', function() {
                    themeToggleDarkIcon.classList.toggle('hidden');
                    themeToggleLightIcon.classList.toggle('hidden');

                    if (localStorage.getItem('color-theme')) {
                        if (localStorage.getItem('color-theme') === 'light') {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('color-theme', 'dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('color-theme', 'light');
                        }
                    } else {
                        if (document.documentElement.classList.contains('dark')) {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('color-theme', 'light');
                        } else {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('color-theme', 'dark');
                        }
                    }
                });
            }

            // Scroll to top button
            var scrollToTopButton = document.getElementById('scroll-to-top');
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 100) {
                    scrollToTopButton.style.display = 'flex';
                } else {
                    scrollToTopButton.style.display = 'none';
                }
            });
        });

        function onToggleMenu(e) {
            e.name = e.name === 'menu' ? 'close' : 'menu';
        }

        var collapseTriggerEl = document.querySelector('[data-collapse-toggle]');
        if (collapseTriggerEl) {

            var collapse = new Collapse(collapseTriggerEl);
            collapseTriggerEl.addEventListener('click', function() {
                collapse.toggle();
                collapseTriggerEl.classList.remove('hidden');
            });
        }


        function layoutData() {
            return {
                layout: localStorage.getItem('layout') || 'grid',
                setLayout(value) {
                    this.layout = value;
                    localStorage.setItem('layout', value);
                }
            }
        }

        function updateUrlParameters(event) {
                event.preventDefault();
                const form = event.target;
                const formData = new FormData(form);
                const params = new URLSearchParams(formData);

                for (let pair of params.entries()) {
                    if (!pair[1]) {
                        params.delete(pair[0]);
                    }
                }

                window.location.search = params.toString();
            }
    </script>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
</body>

</html>
