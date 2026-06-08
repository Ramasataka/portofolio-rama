<!-- Modal Project -->
<div id="project{{ $project->id }}-modal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity duration-300">
    <div class="bg-white rounded-3xl max-w-5xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-white/20">
        <div class="p-8 md:p-10 relative">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-3xl font-extrabold text-slate-900">{{ $project->title }}</h3>
                <button onclick="closeProjectModal('project{{ $project->id }}')" class="text-slate-400 hover:text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-full p-2 transition-colors focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            @if($project->images->isNotEmpty())
                <div class="relative mb-8 rounded-2xl overflow-hidden shadow-lg border border-slate-100 group">
                    <div class="slider-container overflow-hidden bg-slate-950">
                        <div class="slider-wrapper flex transition-transform duration-300" id="project{{ $project->id }}-slider">
                            @foreach($project->images as $image)
                                <div class="w-full flex-shrink-0 h-80 md:h-[400px] flex items-center justify-center">
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $project->title }}" class="max-w-full max-h-full object-contain">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button onclick="previousSlide('project{{ $project->id }}')" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/90 backdrop-blur text-slate-800 rounded-full p-3 hover:bg-white hover:text-blue-600 transition-all opacity-0 group-hover:opacity-100 shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button onclick="nextSlide('project{{ $project->id }}')" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/90 backdrop-blur text-slate-800 rounded-full p-3 hover:bg-white hover:text-blue-600 transition-all opacity-0 group-hover:opacity-100 shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            @endif

            <div class="grid md:grid-cols-3 gap-8">
                <div class="md:col-span-2 space-y-6">
                    <div>
                        <h4 class="text-xl font-bold mb-3 text-slate-800 flex items-center"><svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>About The Project</h4>
                        <p class="text-slate-600 leading-relaxed">{{ $project->description }}</p>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold mb-4 text-slate-800 flex items-center"><svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Key Features</h4>
                        <ul class="grid sm:grid-cols-2 gap-3">
                            @foreach(explode(',', $project->key_feature) as $feature)
                                <li class="flex items-start text-slate-600"><svg class="w-5 h-5 mr-2 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>{{ trim($feature) }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        <h4 class="font-bold mb-4 text-slate-800 text-sm uppercase tracking-wider">Technologies</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->tech_stacks as $tech)
                                <span class="px-3 py-1.5 bg-white border border-slate-200 text-slate-700 rounded-lg text-sm font-medium shadow-sm hover:border-blue-300 transition-colors">{{ $tech->tech_stack }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        <h4 class="font-bold mb-4 text-slate-800 text-sm uppercase tracking-wider">Project Links</h4>
                        <div class="flex flex-col gap-3">
                            @foreach($project->link_projects as $link)
                                <a href="{{ $link->link }}" target="_blank" class="inline-flex items-center justify-between px-4 py-3 bg-white border border-slate-200 hover:border-blue-300 text-slate-700 hover:text-blue-600 rounded-xl font-medium transition-all shadow-sm group">
                                    {{ ucfirst($link->links_type) }}
                                    <svg class="w-4 h-4 transform group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>