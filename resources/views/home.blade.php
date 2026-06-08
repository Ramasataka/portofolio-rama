<x-app-layout>
    <style>
        [x-cloak] { display: none !important; }
    </style>

    <div x-data="{ lightboxOpen: false, lightboxImage: '', lightboxTitle: '', lightboxIssuer: '' }">
        @if(session('success'))
            <div 
                x-data="{ show: true }" 
                x-init="setTimeout(() => show = false, 4000)" 
                x-show="show"
                x-transition
                class="mb-4 mx-4 mt-24 px-4 py-3 rounded-xl bg-green-50 border border-green-200 text-green-700 shadow-sm max-w-6xl mx-auto"
                role="alert"
            >
                <strong class="font-semibold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Hero / About Section -->
        <section id="about" class="relative pt-32 pb-24 px-4 overflow-hidden bg-gradient-to-b from-blue-50/70 via-white to-white">
            <!-- Background Decorative Elements -->
            <div class="absolute top-0 right-0 -mr-20 w-96 h-96 bg-blue-200/40 rounded-full blur-3xl z-0 pointer-events-none"></div>
            <div class="absolute top-1/2 left-0 -ml-20 w-80 h-80 bg-indigo-100/40 rounded-full blur-3xl z-0 pointer-events-none"></div>

            <div class="max-w-6xl mx-auto relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    <!-- Left Column: Introduction Info -->
                    <div class="lg:col-span-7 text-left space-y-6">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-50 border border-blue-100 text-blue-600 rounded-full text-xs font-bold uppercase tracking-wider">
                            <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                            Welcome to my website
                        </div>
                        
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-none">
                            Hi, I am <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">{{ $user->name ?? 'Rama Putra' }}</span>
                        </h1>
                        
                        <p class="text-xl md:text-2xl font-bold text-blue-600">
                            {{ $user->role ?? 'Fullstack Developer' }}
                        </p>
                        
                        <div class="relative">
                            <div class="absolute -left-4 top-0 bottom-0 w-1 bg-gradient-to-b from-blue-500 to-indigo-500 rounded-full"></div>
                            <p class="text-slate-600 leading-relaxed text-lg font-light pl-4">
                                {{ $user->description ?? 'Short profile introduction summary goes here.' }}
                            </p>
                        </div>

                        <!-- Tech Stack / Skills -->
                        <div class="pt-2">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Tech Stacks & Specialties</h4>
                            <div class="flex flex-wrap gap-2">
                                @if (!$tech_stacks || $tech_stacks->isEmpty())
                                    <span class="text-slate-400 italic text-sm">No tech stack added yet</span>
                                @else
                                    @foreach ($tech_stacks as $tech_stack) 
                                        <span class="px-4 py-2 rounded-xl text-xs font-bold bg-blue-50/60 text-blue-700 border border-blue-100 hover:bg-blue-100 hover:text-blue-800 transition duration-300">
                                            {{ $tech_stack->tech_stack }}
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        
                        <!-- Call To Action -->
                        <div class="pt-4 flex flex-wrap gap-4">
                            @if($user && $user->cv)
                                <a href="{{ asset('storage/' . $user->cv) }}" download
                                   class="inline-flex items-center justify-center px-7 py-3.5 bg-blue-600 text-white font-bold rounded-full shadow-lg shadow-blue-600/30 hover:bg-blue-700 hover:shadow-blue-600/50 hover:-translate-y-0.5 transition-all duration-300">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Download CV
                                </a>
                            @endif
                            <a href="#contact"
                               class="inline-flex items-center justify-center px-7 py-3.5 border-2 border-slate-200 text-slate-700 font-bold rounded-full hover:bg-slate-50 hover:border-slate-300 hover:-translate-y-0.5 transition-all duration-300">
                                Get In Touch
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: Profile Photo Card -->
                    <div class="lg:col-span-5 flex justify-center lg:justify-end">
                        <div class="relative">
                            <!-- Decorative glow backdrop -->
                            <div class="absolute inset-0 -m-4 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-[2.5rem] opacity-20 blur-2xl animate-pulse"></div>
                            
                            <!-- Floating Glass Card Wrapper -->
                            <div class="relative p-4 bg-white/80 border border-white backdrop-blur-sm rounded-[2.5rem] shadow-2xl shadow-blue-900/10 hover:shadow-3xl hover:-translate-y-2 transition-all duration-500 max-w-sm w-full">
                                <div class="aspect-square w-full rounded-[2rem] overflow-hidden bg-slate-100 border border-slate-200/50 relative shadow-inner">
                                    @if($user && $user->image)
                                        <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name ?? 'Rama Putra' }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-blue-50 text-blue-500">
                                            <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Floater: Online Status Tag -->
                                <div class="absolute -bottom-4 -left-4 bg-white/95 border border-slate-100 px-4 py-2.5 rounded-2xl shadow-xl flex items-center gap-3 hover:scale-105 transition-transform">
                                    <div class="w-3.5 h-3.5 rounded-full bg-emerald-500 animate-pulse relative">
                                        <div class="absolute inset-0 bg-emerald-400 rounded-full animate-ping opacity-75"></div>
                                    </div>
                                    <span class="text-xs font-bold text-slate-800">Available for Work</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="py-24 px-4 bg-slate-50/50 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-blue-200 to-transparent"></div>
            
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <span class="text-sm font-bold text-blue-600 tracking-widest uppercase mb-2 block">Portfolio</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">Featured Projects</h2>
                    <div class="w-16 h-1 bg-blue-600 mx-auto mt-4 rounded-full"></div>
                </div>

                @if ($projects->isEmpty())
                    <div class="text-center py-16 bg-white rounded-3xl border border-slate-200/60 shadow-sm max-w-3xl mx-auto">
                        <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                        <p class="text-slate-500 text-lg">No projects added yet.</p>
                    </div>
                @else
                    <!-- Project Slider Horizontal -->
                    <div x-data="{ 
                        activeSlide: 0,
                        totalSlides: {{ $projects->count() }},
                        next() {
                            this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
                        },
                        prev() {
                            this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides;
                        }
                    }" class="relative max-w-5xl mx-auto">
                        
                        <!-- Slider Container -->
                        <div class="overflow-hidden rounded-3xl shadow-xl bg-white border border-slate-100">
                            <div class="flex transition-transform duration-500 ease-out" 
                                 :style="`transform: translateX(-${activeSlide * 100}%)`">
                                
                                @foreach ($projects as $project)
                                    <div class="flex-shrink-0 w-full min-w-full grid grid-cols-1 lg:grid-cols-12 gap-0 overflow-hidden animate-slide">
                                        <!-- Photo Left -->
                                        <div class="lg:col-span-6 h-72 lg:h-[450px] relative overflow-hidden bg-slate-100 border-r border-slate-100">
                                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 z-10"></div>
                                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700 ease-out">
                                        </div>
                                        
                                        <!-- Content Right -->
                                        <div class="lg:col-span-6 p-8 lg:p-12 flex flex-col justify-between bg-white">
                                            <div class="space-y-6">
                                                <div class="flex items-center gap-3">
                                                    <span class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold uppercase tracking-wider">Project {{ $loop->iteration }} of {{ $loop->count }}</span>
                                                </div>
                                                <h3 class="text-3xl font-extrabold text-slate-900 leading-tight hover:text-blue-600 transition-colors">
                                                    {{ $project->title }}
                                                </h3>
                                                <p class="text-slate-500 leading-relaxed text-sm lg:text-base line-clamp-4">
                                                    {{ $project->description_thumbnail }}
                                                </p>
                                                
                                                <div class="pt-2">
                                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest block mb-2">Technologies Used</span>
                                                    <div class="flex flex-wrap gap-1.5">
                                                        @if ($project->tech_stacks->isEmpty())
                                                            <span class="text-slate-400 text-xs italic">No tech stack</span>
                                                        @else
                                                            @foreach ($project->tech_stacks as $tech_stack)
                                                                <span class="px-2.5 py-1 bg-slate-50 text-slate-600 border border-slate-200 rounded-lg text-xs font-medium">{{ $tech_stack->tech_stack }}</span>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="pt-8 border-t border-slate-100 flex items-center justify-between">
                                                <button onclick="openProjectModal('project{{ $project->id }}')" 
                                                        class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-bold text-sm rounded-full shadow-md shadow-blue-600/20 hover:bg-blue-700 hover:shadow-blue-600/40 hover:-translate-y-0.5 transition-all duration-300">
                                                    See More Details
                                                    <svg class="w-4.5 h-4.5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Slider Navigation Controllers -->
                        <div class="flex justify-between items-center mt-8 px-4">
                            <!-- Navigation dots -->
                            <div class="flex gap-2.5">
                                <template x-for="(project, index) in Array.from({length: totalSlides})">
                                    <button @click="activeSlide = index" 
                                            class="h-2.5 rounded-full transition-all duration-300 focus:outline-none"
                                            :class="activeSlide === index ? 'w-8 bg-blue-600' : 'w-2.5 bg-slate-300/80 hover:bg-slate-400'"></button>
                                </template>
                            </div>
                            
                            <!-- Arrows -->
                            <div class="flex gap-3">
                                <button @click="prev()" 
                                        class="p-3 bg-white border border-slate-200/80 text-slate-600 rounded-full hover:text-blue-600 hover:border-blue-200 hover:shadow-md transition focus:outline-none shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                                </button>
                                <button @click="next()" 
                                        class="p-3 bg-white border border-slate-200/80 text-slate-600 rounded-full hover:text-blue-600 hover:border-blue-200 hover:shadow-md transition focus:outline-none shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Include Modals inside the slider template -->
                    @foreach ( $projects as $project )
                        @include('components.project-modal', ['project' => $project])
                    @endforeach
                @endif
            </div>
        </section>

        <!-- Experience Section -->
        <section id="experience" class="py-24 px-4 bg-white relative overflow-hidden">
            <!-- Background Blobs -->
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-indigo-50/50 rounded-full blur-3xl z-0 pointer-events-none"></div>

            <div class="max-w-4xl mx-auto relative z-10">
                <div class="text-center mb-16">
                    <span class="text-sm font-bold text-blue-600 tracking-widest uppercase mb-2 block">Activities & Involvement</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">Experience</h2>
                    <div class="w-16 h-1 bg-blue-600 mx-auto mt-4 rounded-full"></div>
                </div>

                <!-- Vertical Timeline -->
                @if($experiences->isEmpty())
                    <div class="text-center py-12 bg-slate-50/50 border border-slate-200 rounded-3xl max-w-xl mx-auto shadow-inner">
                        <svg class="w-12 h-12 text-slate-350 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        <p class="text-slate-500 font-medium text-sm">No experience items added yet.</p>
                    </div>
                @else
                    <div class="relative border-l-2 border-blue-100 ml-4 md:ml-32 space-y-12">
                        @foreach($experiences as $exp)
                            <!-- Timeline item -->
                            <div class="relative pl-8 md:pl-12 group">
                                <!-- Icon node -->
                                <div class="absolute -left-[11px] top-1.5 w-5 h-5 rounded-full border-4 border-white bg-blue-600 shadow-md group-hover:scale-125 transition-transform duration-300">
                                    @if($loop->first)
                                        <div class="absolute inset-0 bg-blue-400 rounded-full animate-ping opacity-25"></div>
                                    @endif
                                </div>
                                
                                <!-- Date Left Indicator (desktop-only) -->
                                <div class="hidden md:block absolute -left-36 top-1 text-right w-28">
                                    <span class="text-sm font-bold text-blue-600">{{ $exp->period }}</span>
                                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest">{{ $exp->type }}</p>
                                </div>
                                
                                <!-- Card Content -->
                                <div @click="lightboxOpen = true; lightboxImage = '{{ $exp->preview_image }}'; lightboxTitle = '{{ $exp->title }}'; lightboxIssuer = '{{ $exp->organization }}'"
                                     class="cursor-pointer p-6 md:p-8 bg-slate-50/50 border border-slate-100 hover:border-blue-100 hover:bg-white rounded-2xl hover:shadow-xl hover:shadow-blue-900/5 transition duration-300">
                                    <!-- Date badge for mobile -->
                                    <span class="inline-block md:hidden px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-bold mb-3">{{ $exp->period }}</span>
                                    
                                    <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                                        <div>
                                            <h4 class="text-xl font-bold text-slate-800 group-hover:text-blue-600 transition-colors">{{ $exp->title }}</h4>
                                            <p class="text-sm font-medium text-slate-500">{{ $exp->organization }}</p>
                                        </div>
                                        <span class="px-3 py-1 bg-blue-100/50 border border-blue-200 text-blue-700 text-xs font-bold rounded-lg">{{ $exp->category }}</span>
                                    </div>
                                    
                                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                                        {{ $exp->description }}
                                    </p>
                                    
                                    @if($exp->skills)
                                        <div class="flex flex-wrap gap-1.5 mb-4">
                                            @foreach(explode(',', $exp->skills) as $skill)
                                                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 rounded text-[11px] font-semibold">{{ trim($skill) }}</span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="border-t border-slate-100 pt-3 flex items-center justify-between text-xs text-blue-600 font-semibold group-hover:translate-x-1 transition-transform">
                                        <span>Click to see event photo</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <!-- Certifications Section -->
        <section id="certifications" class="py-24 px-4 bg-gradient-to-br from-blue-50/40 via-white to-blue-50/20 relative overflow-hidden">
            <!-- Decorative glowing rings -->
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 rounded-full bg-blue-400 opacity-10 blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-indigo-400 opacity-10 blur-3xl pointer-events-none"></div>

            <div class="max-w-6xl mx-auto relative z-10">
                <div class="text-center mb-16">
                    <span class="text-sm font-bold text-blue-600 tracking-widest uppercase mb-2 block">Achievements</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">Licenses & Certifications</h2>
                    <div class="w-16 h-1 bg-blue-600 mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Cert 1 -->
                    <div @click="lightboxOpen = true; lightboxImage = '{{ asset('storage/images/laravel_cert.png') }}'; lightboxTitle = 'Laravel Certified Developer'; lightboxIssuer = 'Laravel Organization'" 
                         class="cursor-pointer bg-white rounded-3xl p-8 border border-slate-150 shadow-md hover:-translate-y-2 hover:shadow-xl hover:border-blue-200/50 transition-all duration-300 group flex flex-col justify-between">
                        <div>
                            <!-- Icon -->
                            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition duration-300 shadow-inner">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                            </div>
                            <h4 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Laravel Certified Developer</h4>
                            <p class="text-sm font-semibold text-blue-600 mb-3">Laravel Organization</p>
                            <p class="text-slate-500 text-xs leading-relaxed mb-6">Demonstrates verified knowledge of advanced application architecture, database configurations, routing, security, and Eloquent design patterns.</p>
                        </div>
                        <div class="flex items-center justify-between border-t border-slate-100 pt-4">
                            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wide">Click to view certificate</span>
                            <span class="text-xs font-semibold px-2.5 py-1 bg-slate-100 text-slate-600 rounded">2024</span>
                        </div>
                    </div>

                    <!-- Cert 2 -->
                    <div @click="lightboxOpen = true; lightboxImage = '{{ asset('storage/images/gcp_cert.png') }}'; lightboxTitle = 'Associate Cloud Engineer'; lightboxIssuer = 'Google Cloud'" 
                         class="cursor-pointer bg-white rounded-3xl p-8 border border-slate-150 shadow-md hover:-translate-y-2 hover:shadow-xl hover:border-blue-200/50 transition-all duration-300 group flex flex-col justify-between">
                        <div>
                            <!-- Icon -->
                            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition duration-300 shadow-inner">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                            <h4 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Associate Cloud Engineer</h4>
                            <p class="text-sm font-semibold text-blue-600 mb-3">Google Cloud</p>
                            <p class="text-slate-500 text-xs leading-relaxed mb-6">Verified skills in deploying applications, monitoring operations, managing enterprise cloud infrastructure, and maintaining security layers in Google Cloud Platform.</p>
                        </div>
                        <div class="flex items-center justify-between border-t border-slate-100 pt-4">
                            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wide">Click to view certificate</span>
                            <span class="text-xs font-semibold px-2.5 py-1 bg-slate-100 text-slate-600 rounded">2023</span>
                        </div>
                    </div>

                    <!-- Cert 3 -->
                    <div @click="lightboxOpen = true; lightboxImage = '{{ asset('storage/images/meta_cert.png') }}'; lightboxTitle = 'Meta Front-End Developer'; lightboxIssuer = 'Meta / Coursera'" 
                         class="cursor-pointer bg-white rounded-3xl p-8 border border-slate-150 shadow-md hover:-translate-y-2 hover:shadow-xl hover:border-blue-200/50 transition-all duration-300 group flex flex-col justify-between">
                        <div>
                            <!-- Icon -->
                            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition duration-300 shadow-inner">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <h4 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">Meta Front-End Developer</h4>
                            <p class="text-sm font-semibold text-blue-600 mb-3">Meta / Coursera</p>
                            <p class="text-slate-500 text-xs leading-relaxed mb-6">Expertise in developing highly responsive interfaces, utilizing React library elements, component lifecycles, global states, and API consumption standards.</p>
                        </div>
                        <div class="flex items-center justify-between border-t border-slate-100 pt-4">
                            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wide">Click to view certificate</span>
                            <span class="text-xs font-semibold px-2.5 py-1 bg-slate-100 text-slate-600 rounded">2022</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lightbox Modal container -->
            <div x-show="lightboxOpen" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-50 flex items-center justify-center p-4"
                 x-cloak
                 @click="lightboxOpen = false">
                 
                 <!-- Modal Content -->
                 <div class="bg-white rounded-3xl max-w-3xl w-full overflow-hidden shadow-2xl border border-white/20"
                      x-show="lightboxOpen"
                      x-transition:enter="transition ease-out duration-300"
                      x-transition:enter-start="opacity-0 scale-95"
                      x-transition:enter-end="opacity-100 scale-100"
                      x-transition:leave="transition ease-in duration-200"
                      x-transition:leave-start="opacity-100 scale-100"
                      x-transition:leave-end="opacity-0 scale-95"
                      @click.stop>
                      
                      <div class="p-6 md:p-8 relative">
                          <div class="flex justify-between items-center mb-6">
                              <div>
                                  <h3 class="text-2xl font-extrabold text-slate-900" x-text="lightboxTitle">Certificate Title</h3>
                                  <p class="text-sm font-semibold text-blue-600" x-text="lightboxIssuer">Issuing Organization</p>
                              </div>
                              <button @click="lightboxOpen = false" class="text-slate-400 hover:text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-full p-2 transition focus:outline-none">
                                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                                  </svg>
                              </button>
                          </div>
                          
                          <!-- Certificate/Event Image -->
                          <div class="rounded-2xl overflow-hidden border border-slate-200/60 bg-slate-50 flex items-center justify-center shadow-inner">
                              <img :src="lightboxImage" alt="Preview Image" class="w-full h-auto max-h-[60vh] object-contain">
                          </div>
                      </div>
                 </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-24 px-4 bg-slate-950 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600 opacity-5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-600 opacity-5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/3"></div>
            
            <div class="max-w-4xl mx-auto relative z-10">
                <div class="text-center mb-16">
                    <span class="text-sm font-bold text-blue-400 tracking-widest uppercase mb-2 block">Get In Touch</span>
                    <h3 class="text-3xl md:text-5xl font-extrabold text-white mb-6">Let's Work Together</h3>
                    <div class="w-16 h-1 bg-blue-500 mx-auto mb-6 rounded-full"></div>
                    <p class="text-slate-400 text-lg max-w-2xl mx-auto font-light">
                        Have an interesting project in mind or want to collaborate? Send me a message and let's get connected!
                    </p>
                </div>

                <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-800/80 p-8 md:p-12 rounded-3xl shadow-2xl mb-12">
                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-slate-300 font-semibold mb-2 text-sm">Your Name</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4.5 py-3.5 rounded-xl bg-slate-950/80 text-white border border-slate-800 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors placeholder-slate-600 text-sm" placeholder="John Doe">
                            </div>
                            <div>
                                <label for="email" class="block text-slate-300 font-semibold mb-2 text-sm">Your Email</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4.5 py-3.5 rounded-xl bg-slate-950/80 text-white border border-slate-800 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors placeholder-slate-600 text-sm" placeholder="john@example.com">
                            </div>
                        </div>
                        <div>
                            <label for="message" class="block text-slate-300 font-semibold mb-2 text-sm">Message</label>
                            <textarea id="message" name="message" rows="5" required
                                class="w-full px-4.5 py-3.5 rounded-xl bg-slate-950/80 text-white border border-slate-800 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors placeholder-slate-600 resize-none text-sm" placeholder="How can I help you?"></textarea>
                        </div>
                        <div class="text-center pt-4">
                            <button type="submit"
                                class="inline-flex items-center justify-center w-full md:w-auto px-8 py-4 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-900/50 hover:shadow-blue-900/80 transition-all duration-300 focus:ring-4 focus:ring-blue-500/50">
                                <span>Send Message</span>
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Social Links -->
                <div class="flex justify-center space-x-6 mt-12">
                    @if($user && $user->email_contanct)
                        <a href="mailto:{{ $user->email_contanct }}" class="group flex flex-col items-center text-slate-400 hover:text-blue-400 transition duration-300">
                            <div class="p-4 bg-slate-900 border border-slate-800/80 rounded-full group-hover:bg-blue-950/50 group-hover:border-blue-800/50 group-hover:scale-110 transition-all duration-300 mb-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </div>
                            <span class="text-[10px] font-bold tracking-wider uppercase opacity-0 group-hover:opacity-100 transition-opacity">Email</span>
                        </a>
                    @endif
                    
                    @if($user && $user->github_link)
                        <a href="{{ $user->github_link }}" target="_blank" class="group flex flex-col items-center text-slate-400 hover:text-blue-400 transition duration-300">
                            <div class="p-4 bg-slate-900 border border-slate-800/80 rounded-full group-hover:bg-blue-950/50 group-hover:border-blue-800/50 group-hover:scale-110 transition-all duration-300 mb-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </div>
                            <span class="text-[10px] font-bold tracking-wider uppercase opacity-0 group-hover:opacity-100 transition-opacity">GitHub</span>
                        </a>
                    @endif
                    
                    @if($user && $user->linkedin_link)
                        <a href="{{ $user->linkedin_link }}" target="_blank" class="group flex flex-col items-center text-slate-400 hover:text-blue-400 transition duration-300">
                            <div class="p-4 bg-slate-900 border border-slate-800/80 rounded-full group-hover:bg-blue-950/50 group-hover:border-blue-800/50 group-hover:scale-110 transition-all duration-300 mb-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </div>
                            <span class="text-[10px] font-bold tracking-wider uppercase opacity-0 group-hover:opacity-100 transition-opacity">LinkedIn</span>
                        </a>
                    @endif
                    
                    @if($user && $user->phone_contanct)
                        <a href="https://wa.me/{{ $user->phone_contanct }}" target="_blank" class="group flex flex-col items-center text-slate-400 hover:text-blue-400 transition duration-300">
                            <div class="p-4 bg-slate-900 border border-slate-800/80 rounded-full group-hover:bg-blue-950/50 group-hover:border-blue-800/50 group-hover:scale-110 transition-all duration-300 mb-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                            </div>
                            <span class="text-[10px] font-bold tracking-wider uppercase opacity-0 group-hover:opacity-100 transition-opacity">WhatsApp</span>
                        </a>
                    @endif
                </div>
            </div>
        </section>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    // Offset navbar height if floating
                    const navbarOffset = 100;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - navbarOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Project modal functions
        const sliderPositions = {};

        function openProjectModal(projectId) {
            document.getElementById(projectId + '-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeProjectModal(projectId) {
            document.getElementById(projectId + '-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function nextSlide(projectId) {
            if (!sliderPositions[projectId]) sliderPositions[projectId] = 0;
            const slider = document.getElementById(projectId + '-slider');
            const slides = slider.children;
            const maxPosition = slides.length - 1;
            
            if (sliderPositions[projectId] < maxPosition) {
                sliderPositions[projectId]++;
            } else {
                sliderPositions[projectId] = 0;
            }
            
            updateSliderPosition(projectId);
        }

        function previousSlide(projectId) {
            if (!sliderPositions[projectId]) sliderPositions[projectId] = 0;
            const slider = document.getElementById(projectId + '-slider');
            const slides = slider.children;
            const maxPosition = slides.length - 1;
            
            if (sliderPositions[projectId] > 0) {
                sliderPositions[projectId]--;
            } else {
                sliderPositions[projectId] = maxPosition;
            }
            
            updateSliderPosition(projectId);
        }

        function updateSliderPosition(projectId) {
            const slider = document.getElementById(projectId + '-slider');
            const translateX = -sliderPositions[projectId] * 100;
            slider.style.transform = `translateX(${translateX}%)`;
        }

        // Close modal when clicking outside
        document.querySelectorAll('[id$="-modal"]').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    const projectId = this.id.replace('-modal', '');
                    closeProjectModal(projectId);
                }
            });
        });
    </script>
</x-app-layout>