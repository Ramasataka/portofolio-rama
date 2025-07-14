<nav class="fixed top-0 w-full z-50 shadow-lg" style="background-color: #222831;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="text-white font-bold text-xl">
                Rama
            </div>
            
            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8">
                <a href="#about" class="text-gray-300 hover:text-white transition duration-300 font-medium">About</a>
                <a href="#projects" class="text-gray-300 hover:text-white transition duration-300 font-medium">Project</a>
                <a href="#contact" class="text-gray-300 hover:text-white transition duration-300 font-medium">Contact</a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-gray-300 hover:text-white">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <a href="#about" class="block text-gray-300 hover:text-white py-2 font-medium">About</a>
            <a href="#projects" class="block text-gray-300 hover:text-white py-2 font-medium">Project</a>
            <a href="#contact" class="block text-gray-300 hover:text-white py-2 font-medium">Contact</a>
        </div>
    </div>
</nav>