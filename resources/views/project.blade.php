<x-app-layout>
    @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 px-4 py-3 bg-red-100 border border-red-400 text-red-700 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form Tambah Project -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h2 class="text-lg font-medium mb-4">Add New Project</h2>
                    <div class="max-w-3xl mx-auto p-6 bg-white shadow rounded-lg">
                        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                    <input type="text" name="title" id="title" required
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        
                                    </div>

                                <div>
                                    <label for="description_thumbnail" class="block text-sm font-medium text-gray-700">Small description</label>
                                    <textarea name="description_thumbnail" id="description_thumbnail" rows="3" required
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="key_feature" class="block text-sm font-medium text-gray-700">Key Features (comma separated)</label>
                                    <textarea name="key_feature" id="key_feature" rows="2" required
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="description" class="block text-sm font-medium text-gray-700">description</label>
                                    <textarea name="description" id="description" rows="2" required
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Tech Stack</label>
                                    <div id="tech-stack-container">
                                        <div class="flex items-center gap-2 mb-2">
                                            <input type="text" name="tech_stacks[]" 
                                                class="flex-grow border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                            <button type="button" onclick="removeTechStackField(this)" class="text-red-500 hover:text-red-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" onclick="addTechStackField()" class="mt-2 inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Add Tech Stack
                                    </button>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Project Links</label>
                                    <div id="project-links-container">
                                        <div class="grid grid-cols-12 gap-2 mb-2">
                                            <div class="col-span-5">
                                                <select name="link_types[]" class="block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                    <option value="github">GitHub</option>
                                                    <option value="demo">Live Demo</option>
                                                    <option value="website">Website</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-span-6">
                                                <input type="url" name="links[]" placeholder="URL" 
                                                    class="block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                            </div>
                                            <div class="col-span-1">
                                                <button type="button" onclick="removeProjectLinkField(this)" class="text-red-500 hover:text-red-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" onclick="addProjectLinkField()" class="mt-2 inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Add Project Link
                                    </button>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="images" class="block text-sm font-medium text-gray-700">Project Images</label>
                                    <input type="file" name="images[]" id="images" multiple accept="image/*"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        onchange="previewMultipleImages(event)">
                                    
                                    @error('images')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror

                                    <div id="images-preview" class="mt-4 flex flex-wrap gap-2"></div>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="thumbnail" class="block text-sm font-medium text-gray-700">Project Thumbnail</label>
                                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        onchange="previewThumbnail(event)">
                                    
                                    @error('thumbnail')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror

                                    <div id="thumbnail-preview" class="mt-4"></div>
                                </div>

                            </div>

                            <div class="flex justify-end mt-6">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 transition-colors duration-200">
                                    Save Project
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<!-- Daftar Projects -->
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <h2 class="text-lg font-medium mb-4">My Projects</h2>

        @if($projects->isEmpty())
            <p class="text-gray-500">No projects yet.</p>
        @else
            <!-- Table untuk Admin -->
            <div class="hidden md:block overflow-x-auto mb-8">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tech Stack</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Links</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($projects as $project)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $project->title }}</td>
                                <td class="px-6 py-4">
                                    @foreach($project->tech_stacks as $tech)
                                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-1 mb-1">{{ $tech->tech_stack }}</span>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">
                                    @foreach($project->link_projects as $link)
                                        <a href="{{ $link->link }}" target="_blank" class="inline-flex items-center text-blue-600 hover:text-blue-800 mr-3">
                                            {{ ucfirst($link->links_type) }}
                                        </a>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form method="POST" action="{{ route('projects.destroy', $project->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Card View untuk Semua Pengguna -->
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($projects as $project)
                    <div class="project-card bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer transform transition duration-300 hover:scale-105 hover:shadow-xl" 
                        onclick="openProjectModal('project{{ $project->id }}')">
                        <div class="h-64 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $project->title }}</h3>
                            <p class="text-gray-600">{{ Str::limit($project->description_thumbnail, 100) }}</p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach($project->tech_stacks as $tech)
                                    <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-full text-sm">{{ $tech->tech_stack }}</span>
                                @endforeach
                            </div>
                            <div class="mt-4 flex flex-wrap gap-3">
                                @foreach($project->link_projects as $link)
                                    <a href="{{ $link->link }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm">
                                        {{ ucfirst($link->links_type) }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Modal Project -->
                    <div id="project{{ $project->id }}-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
                        <div class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                            <div class="p-6">
                                <div class="flex justify-between items-center mb-6">
                                    <h3 class="text-2xl font-bold text-gray-800">{{ $project->title }}</h3>
                                    <button onclick="closeProjectModal('project{{ $project->id }}')" class="text-gray-500 hover:text-gray-700">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>

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
                                        <button onclick="previousSlide('project{{ $project->id }}')" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-2 hover:bg-opacity-100">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </button>
                                        <button onclick="nextSlide('project{{ $project->id }}')" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-2 hover:bg-opacity-100">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                @endif

                                <p class="text-gray-700 leading-relaxed">{{ $project->description }}</p>

                                <div class="mt-4">
                                    <h4 class="font-semibold mb-2 text-gray-800">Key Features:</h4>
                                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                                        @foreach(explode(',', $project->key_feature) as $feature)
                                            <li>{{ trim($feature) }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="mt-4">
                                    <h4 class="font-semibold mb-2 text-gray-800">Tech Stack:</h4>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($project->tech_stacks as $tech)
                                            <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-full text-sm">{{ $tech->tech_stack }}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h4 class="font-semibold mb-2 text-gray-800">Project Links:</h4>
                                    <div class="flex flex-wrap gap-4">
                                        @foreach($project->link_projects as $link)
                                            <a href="{{ $link->link }}" target="_blank" class="text-blue-600 hover:text-blue-800 flex items-center">
                                                {{ ucfirst($link->links_type) }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>


    <script>
        // Fungsi untuk modal project
        function openProjectModal(projectId) {
            document.getElementById(projectId + '-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeProjectModal(projectId) {
            document.getElementById(projectId + '-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Fungsi untuk slider image
        const sliderPositions = {};

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

        // Fungsi untuk menambah field tech stack
        function addTechStackField() {
            const container = document.getElementById('tech-stack-container');
            const div = document.createElement('div');
            div.className = 'flex items-center gap-2 mb-2';
            div.innerHTML = `
                <input type="text" name="tech_stacks[]" 
                    class="flex-grow border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <button type="button" onclick="removeTechStackField(this)" class="text-red-500 hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;
            container.appendChild(div);
        }

        // Fungsi untuk menghapus field tech stack
        function removeTechStackField(button) {
            button.parentElement.remove();
        }

        // Fungsi untuk menambah field project link
        function addProjectLinkField() {
            const container = document.getElementById('project-links-container');
            const div = document.createElement('div');
            div.className = 'grid grid-cols-12 gap-2 mb-2';
            div.innerHTML = `
                <div class="col-span-5">
                    <select name="link_types[]" class="block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="github">GitHub</option>
                        <option value="demo">Live Demo</option>
                        <option value="website">Website</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-span-6">
                    <input type="url" name="links[]" placeholder="URL" 
                        class="block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div class="col-span-1">
                    <button type="button" onclick="removeProjectLinkField(this)" class="text-red-500 hover:text-red-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            `;
            container.appendChild(div);
        }

        // Fungsi untuk menghapus field project link
        function removeProjectLinkField(button) {
            button.parentElement.parentElement.remove();
        }
        function previewMultipleImages(event) {
        const previewContainer = document.getElementById('images-preview');
        previewContainer.innerHTML = ''; // clear preview

        const files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('h-24', 'w-24', 'object-cover', 'rounded', 'border');
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(files[i]);
        }
    }

    function previewThumbnail(event) {
        const previewContainer = document.getElementById('thumbnail-preview');
        previewContainer.innerHTML = ''; // clear previous

        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('h-24', 'w-24', 'object-cover', 'rounded', 'border');
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }
    </script>
</x-app-layout>