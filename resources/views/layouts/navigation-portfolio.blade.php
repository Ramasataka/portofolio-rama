<nav class="fixed top-4 left-0 right-0 w-[calc(100%-2rem)] max-w-6xl mx-auto z-50 rounded-2xl border border-slate-200/50 bg-white/75 backdrop-blur-md shadow-lg transition-all duration-300">
    <div class="px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="text-blue-600 font-extrabold text-2xl tracking-wider hover:scale-105 transition-transform">
                <a href="#about">Rama.</a>
            </div>
            
            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="#about" class="text-slate-600 hover:text-blue-600 transition duration-300 font-semibold text-sm py-1.5 px-3 rounded-full hover:bg-blue-50/50">About</a>
                <a href="#projects" class="text-slate-600 hover:text-blue-600 transition duration-300 font-semibold text-sm py-1.5 px-3 rounded-full hover:bg-blue-50/50">Projects</a>
                <a href="#experience" class="text-slate-600 hover:text-blue-600 transition duration-300 font-semibold text-sm py-1.5 px-3 rounded-full hover:bg-blue-50/50">Experience</a>
                <a href="#certifications" class="text-slate-600 hover:text-blue-600 transition duration-300 font-semibold text-sm py-1.5 px-3 rounded-full hover:bg-blue-50/50">Certifications</a>
                <a href="#contact" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-full shadow-md shadow-blue-600/20 hover:shadow-blue-600/30 transition-all duration-300">Contact</a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="p-2 rounded-xl text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4 border-t border-slate-100 mt-2 space-y-2">
            <a href="#about" class="block text-slate-600 hover:text-blue-600 py-2.5 px-4 rounded-xl hover:bg-blue-50/50 font-semibold text-sm transition">About</a>
            <a href="#projects" class="block text-slate-600 hover:text-blue-600 py-2.5 px-4 rounded-xl hover:bg-blue-50/50 font-semibold text-sm transition">Projects</a>
            <a href="#experience" class="block text-slate-600 hover:text-blue-600 py-2.5 px-4 rounded-xl hover:bg-blue-50/50 font-semibold text-sm transition">Experience</a>
            <a href="#certifications" class="block text-slate-600 hover:text-blue-600 py-2.5 px-4 rounded-xl hover:bg-blue-50/50 font-semibold text-sm transition">Certifications</a>
            <a href="#contact" class="block text-center py-2.5 px-4 bg-blue-600 text-white rounded-xl font-semibold text-sm transition shadow-md shadow-blue-600/20">Contact</a>
        </div>
    </div>
</nav>
