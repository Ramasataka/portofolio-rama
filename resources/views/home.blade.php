<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portfolio') }}
        </h2>
    </x-slot>
                @if(session('success'))
                    <div 
                        x-data="{ show: true }" 
                        x-init="setTimeout(() => show = false, 4000)" 
                        x-show="show"
                        x-transition
                        class="mb-4 px-4 py-3 rounded-md bg-green-100 border border-green-400 text-green-700 shadow-md"
                        role="alert"
                    >
                        <strong class="font-semibold">Sukses!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

        <section id="about" class="pt-24 pb-16 px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="mb-8">
                    <div class="w-32 h-32 mx-auto rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('storage/' . $user->image) }} " alt="Rama Putra" class="w-full h-full object-cover">
                    </div>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold mb-4" style="color: #222831;">
                    Hello, I am Rama Putra
                </h1>
                <p class="text-xl text-gray-600 mb-8">
                    {{ $user->role }}
                </p>

                <div class="bg-white rounded-lg shadow-lg p-8 mx-auto max-w-3xl">
                    <p class="text-gray-700 leading-relaxed text-lg">
                       {{ $user->description }}
                    </p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        @if ($tech_stacks->isEmpty())
                            <span>Kosong</span>
                        @else
                            @foreach ($tech_stacks as $tech_stack) 
                                <span class="px-4 py-2 rounded-full text-sm font-medium text-white" style="background-color: #222831;">
                                    {{ $tech_stack->tech_stack }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                {{-- Tombol Download CV --}}
            </div>
            <div class="mt-8 text-center">
                <a href="{{ asset('storage/' . $user->cv) }}" download
                   class="inline-block px-6 py-3 bg-[#222831] text-white font-semibold rounded-full shadow-md hover:bg-[#393E46] transition duration-300">
                    Download CV
                </a>
            </div>
        </section>

        <div class="w-40 h-1 mx-auto my-16 bg-gradient-to-r from-[#222831] via-gray-400 to-[#222831] rounded-full opacity-80"></div>


        <section id="projects" class="py-16 px-4" style="background-color: #f1f2f6;">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12" style="color: #222831;">
                    PROJECTS
                </h2>
                <div class="grid md:grid-cols-2 gap-8">
                @if ($projects->isEmpty())
                    <h1>KOSONG</h1>
                @else
                    @foreach ( $projects as $project )
                        <div class="project-card bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer transform transition duration-300 hover:scale-105 hover:shadow-xl" 
                        onclick="openProjectModal('project{{ $project->id }}')">
                        <div class="h-64 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2" style="color: #222831;">{{ $project->title }}</h3>
                                <p class="text-gray-600">{{ $project->description_thumbnail }}</p>
                                @if ($project->tech_stacks->isEmpty())
                                     <h1>KOSONG</h1>
                                @else
                                    @foreach ($project->tech_stacks as $tech_stack)
                                        <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-full text-sm">{{ $tech_stack->tech_stack }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @include('components.project-modal', ['project' => $project])
                    @endforeach
                @endif
                </div>
            </div>
        </section>

        <section id="contact" class="py-16 px-4" style="background-color: #222831;">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-4xl font-bold text-white mb-8">CONTACT</h2>
                <p class="text-gray-300 text-lg mb-8">
                    Let's work together to bring your ideas to life
                </p>



                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6 text-left">
                    @csrf
                    <div>
                        <label for="name" class="block text-white font-medium mb-2">Your Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-teal-500">
                    </div>
                    <div>
                        <label for="email" class="block text-white font-medium mb-2">Your Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-teal-500">
                    </div>
                    <div>
                        <label for="message" class="block text-white font-medium mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-teal-500"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                            Send Message
                        </button>
                    </div>
                </form>

                <div class="flex justify-center space-x-6 mt-12">
                    <div class="flex justify-center space-x-6">
                    <a href="mailto:{{ $user->email_contanct }}" class="text-gray-300 hover:text-white transition duration-300">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </a>
                    
                    <a href="{{ $user->github_link }}" target="_blank" class="text-gray-300 hover:text-white transition duration-300">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a>
                    
                    <a href="{{ $user->linkedin_link }}" target="_blank" class="text-gray-300 hover:text-white transition duration-300">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    
                    <a href="https://wa.me//{{ $user->phone_contanct}}" target="_blank" class="text-gray-300 hover:text-white transition duration-300">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </a>
                </div>
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
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Project modal functions
        const sliderPositions = {
            project1: 0,
            project2: 0,
            project3: 0,
            project4: 0
        };

        function openProjectModal(projectId) {
            document.getElementById(projectId + '-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeProjectModal(projectId) {
            document.getElementById(projectId + '-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function nextSlide(projectId) {
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

        // Auto-advance sliders every 5 seconds
        setInterval(() => {
            Object.keys(sliderPositions).forEach(projectId => {
                const modal = document.getElementById(projectId + '-modal');
                if (!modal.classList.contains('hidden')) {
                    nextSlide(projectId);
                }
            });
        }, 5000);
    </script>
</x-app-layout>