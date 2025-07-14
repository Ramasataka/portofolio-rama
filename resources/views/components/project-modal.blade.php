{{-- components/project-modal.blade.php --}}
<div id="project{{ $project->id }}-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-900">{{ $project->title }}</h3>
                <button onclick="closeProjectModal('project{{ $project->id }}')" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Image Slider --}}
            @if($project->images->isNotEmpty())
                <div class="relative mb-6">
                    <div class="slider-container overflow-hidden rounded-lg">
                        <div class="slider-wrapper flex transition-transform duration-300" id="project{{ $project->id }}-slider">
                            @foreach($project->images as $image)
                                <div class="w-full flex-shrink-0">
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $project->title }}" class="w-full h-64 object-cover">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Controls --}}
                    <button onclick="previousSlide('project{{ $project->id }}')" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-2 hover:bg-opacity-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button onclick="nextSlide('project{{ $project->id }}')" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-2 hover:bg-opacity-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            @endif

            {{-- Description --}}
            <div class="space-y-4">
                <p class="text-gray-700 leading-relaxed">{{ $project->description }}</p>

                <div>
                    <h4 class="font-semibold mb-2 text-gray-800">Key Features:</h4>
                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        @foreach(explode(',', $project->key_feature) as $feature)
                            <li>{{ trim($feature) }}</li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-2 text-gray-800">Tech Stack:</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($project->tech_stacks as $tech)
                            <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-full text-sm">{{ $tech->tech_stack }}</span>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold mb-2 text-gray-800">Project Links:</h4>
                    <div class="flex flex-wrap gap-4">
                        @foreach($project->link_projects as $link)
                            <a href="{{ $link->link }}" target="_blank" class="text-blue-600 hover:text-blue-800 flex items-center text-sm">
                                @switch($link->links_type)
                                    @case('github')
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/></svg>
                                        GitHub
                                        @break
                                    @case('demo')
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10.804 8 5 4.633v6.734zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696z"/></svg>
                                        Demo
                                        @break
                                    @case('website')
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484q-.121.12-.242.234c-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
                                        </svg>
                                        {{ $link->link }}
                                        @break
                                    @default
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path   <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z"/><path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z"/></svg>
                                        Link
                                @endswitch
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
