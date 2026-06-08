<nav class="fixed top-0 w-full z-50 shadow-lg bg-primary-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="text-blue-600 font-extrabold text-2xl tracking-wider hover:scale-105 transition-transform">
                <a href="#about">Rama.</a>
            </div>
            
            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8">
                <a href="#about" class="text-primary-100 hover:text-white hover:text-primary-200 transition duration-300 font-medium">About</a>
                <a href="#projects" class="text-primary-100 hover:text-white hover:text-primary-200 transition duration-300 font-medium">Project</a>
                <a href="#contact" class="text-primary-100 hover:text-white hover:text-primary-200 transition duration-300 font-medium">Contact</a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-primary-100 hover:text-white">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <a href="#about" class="block text-primary-100 hover:text-white hover:text-primary-200 py-2 font-medium">About</a>
            <a href="#projects" class="block text-primary-100 hover:text-white hover:text-primary-200 py-2 font-medium">Project</a>
            <a href="#contact" class="block text-primary-100 hover:text-white hover:text-primary-200 py-2 font-medium">Contact</a>
        </div>
    </div>
</nav>
