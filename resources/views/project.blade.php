<x-app-layout>
    @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg shadow-sm relative max-w-7xl mx-auto mt-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-lg shadow-sm relative max-w-7xl mx-auto mt-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form Tambah Project -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-2xl border border-slate-100 mb-10">
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-6 text-slate-800 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Add New Project
                    </h2>
                    <div class="max-w-4xl mx-auto p-8 bg-slate-50/50 shadow-inner rounded-xl border border-slate-100">
                        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="title" class="block text-sm font-semibold text-slate-700">Title</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                                        class="mt-2 block w-full rounded-lg shadow-sm transition-colors @error('title') border-red-300 focus:border-red-500 focus:ring-red-500/20 @else border-slate-300 focus:border-sky-500 focus:ring-sky-500/20 @enderror">
                                    @error('title')
                                        <p class="text-sm text-red-500 mt-1.5 flex items-center font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="description_thumbnail" class="block text-sm font-semibold text-slate-700">Small description</label>
                                    <textarea name="description_thumbnail" id="description_thumbnail" rows="3" required
                                        class="mt-2 block w-full rounded-lg shadow-sm transition-colors @error('description_thumbnail') border-red-300 focus:border-red-500 focus:ring-red-500/20 @else border-slate-300 focus:border-sky-500 focus:ring-sky-500/20 @enderror">{{ old('description_thumbnail') }}</textarea>
                                    @error('description_thumbnail')
                                        <p class="text-sm text-red-500 mt-1.5 flex items-center font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="key_feature" class="block text-sm font-semibold text-slate-700">Key Features (comma separated)</label>
                                    <textarea name="key_feature" id="key_feature" rows="2" required
                                        class="mt-2 block w-full rounded-lg shadow-sm transition-colors @error('key_feature') border-red-300 focus:border-red-500 focus:ring-red-500/20 @else border-slate-300 focus:border-sky-500 focus:ring-sky-500/20 @enderror">{{ old('key_feature') }}</textarea>
                                    @error('key_feature')
                                        <p class="text-sm text-red-500 mt-1.5 flex items-center font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="description" class="block text-sm font-semibold text-slate-700">Detailed Description</label>
                                    <textarea name="description" id="description" rows="2" required
                                        class="mt-2 block w-full rounded-lg shadow-sm transition-colors @error('description') border-red-300 focus:border-red-500 focus:ring-red-500/20 @else border-slate-300 focus:border-sky-500 focus:ring-sky-500/20 @enderror">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-sm text-red-500 mt-1.5 flex items-center font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-semibold text-slate-700">Tech Stack</label>
                                    <div id="tech-stack-container">
                                        @if(old('tech_stacks'))
                                            @foreach(old('tech_stacks') as $index => $oldTech)
                                                <div class="flex items-center gap-2 mb-2">
                                                    <input type="text" name="tech_stacks[]" value="{{ $oldTech }}"
                                                        class="flex-grow border border-slate-300 rounded-lg shadow-sm focus:border-sky-500 focus:ring focus:ring-sky-500/20 mt-2 transition-colors">
                                                    <button type="button" onclick="removeTechStackField(this)" class="text-red-400 hover:text-red-600 transition-colors mt-2 p-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="flex items-center gap-2 mb-2">
                                                <input type="text" name="tech_stacks[]" 
                                                    class="flex-grow border border-slate-300 rounded-lg shadow-sm focus:border-sky-500 focus:ring focus:ring-sky-500/20 mt-2 transition-colors">
                                                <button type="button" onclick="removeTechStackField(this)" class="text-red-400 hover:text-red-600 transition-colors mt-2 p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    @error('tech_stacks')
                                        <p class="text-sm text-red-500 mt-1.5 flex items-center font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    <button type="button" onclick="addTechStackField()" class="mt-3 inline-flex items-center px-4 py-2 border border-sky-200 shadow-sm text-sm font-medium rounded-lg text-sky-700 bg-sky-50 hover:bg-sky-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition-colors">
                                        Add Tech Stack
                                    </button>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-semibold text-slate-700">Project Links</label>
                                    <div id="project-links-container">
                                        @if(old('link_types'))
                                            @foreach(old('link_types') as $index => $oldType)
                                                <div class="grid grid-cols-12 gap-2 mb-2">
                                                    <div class="col-span-5">
                                                        <select name="link_types[]" class="block w-full border border-slate-300 rounded-lg shadow-sm focus:border-sky-500 focus:ring focus:ring-sky-500/20 mt-2 transition-colors">
                                                            <option value="github" {{ $oldType === 'github' ? 'selected' : '' }}>GitHub</option>
                                                            <option value="demo" {{ $oldType === 'demo' ? 'selected' : '' }}>Live Demo</option>
                                                            <option value="website" {{ $oldType === 'website' ? 'selected' : '' }}>Website</option>
                                                            <option value="other" {{ $oldType === 'other' ? 'selected' : '' }}>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-span-6">
                                                        <input type="url" name="links[]" value="{{ old('links.'.$index) }}" placeholder="URL" 
                                                            class="block w-full border border-slate-300 rounded-lg shadow-sm focus:border-sky-500 focus:ring focus:ring-sky-500/20 mt-2 transition-colors">
                                                    </div>
                                                    <div class="col-span-1 flex items-center justify-center">
                                                        <button type="button" onclick="removeProjectLinkField(this)" class="text-red-400 hover:text-red-600 transition-colors mt-2 p-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="grid grid-cols-12 gap-2 mb-2">
                                                <div class="col-span-5">
                                                    <select name="link_types[]" class="block w-full border border-slate-300 rounded-lg shadow-sm focus:border-sky-500 focus:ring focus:ring-sky-500/20 mt-2 transition-colors">
                                                        <option value="github">GitHub</option>
                                                        <option value="demo">Live Demo</option>
                                                        <option value="website">Website</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-span-6">
                                                    <input type="url" name="links[]" placeholder="URL" 
                                                        class="block w-full border border-slate-300 rounded-lg shadow-sm focus:border-sky-500 focus:ring focus:ring-sky-500/20 mt-2 transition-colors">
                                                </div>
                                                <div class="col-span-1 flex items-center justify-center">
                                                    <button type="button" onclick="removeProjectLinkField(this)" class="text-red-400 hover:text-red-600 transition-colors mt-2 p-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    @error('links')
                                        <p class="text-sm text-red-500 mt-1.5 flex items-center font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    <button type="button" onclick="addProjectLinkField()" class="mt-3 inline-flex items-center px-4 py-2 border border-sky-200 shadow-sm text-sm font-medium rounded-lg text-sky-700 bg-sky-50 hover:bg-sky-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition-colors">
                                        Add Project Link
                                    </button>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="images" class="block text-sm font-semibold text-slate-700">Project Images (JPG/PNG/GIF up to 5MB each)</label>
                                    <input type="file" name="images[]" id="images" multiple accept="image/*"
                                        class="mt-2 block w-full rounded-lg shadow-sm focus:border-sky-500 focus:ring focus:ring-sky-500/20 text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100 transition-colors @error('images.*') border-red-300 @else border-slate-300 @enderror"
                                        onchange="previewMultipleImages(event)">
                                    
                                    @error('images')
                                        <p class="text-sm text-red-500 mt-1.5 flex items-center font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    @error('images.*')
                                        <p class="text-sm text-red-500 mt-1.5 flex items-center font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <div id="images-preview" class="mt-4 flex flex-wrap gap-2"></div>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="thumbnail" class="block text-sm font-semibold text-slate-700">Project Thumbnail (JPG/PNG/GIF up to 5MB)</label>
                                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                                        class="mt-2 block w-full rounded-lg shadow-sm focus:border-sky-500 focus:ring focus:ring-sky-500/20 text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100 transition-colors @error('thumbnail') border-red-300 @else border-slate-300 @enderror"
                                        onchange="previewThumbnail(event)">
                                    
                                    @error('thumbnail')
                                        <p class="text-sm text-red-500 mt-1.5 flex items-center font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <div id="thumbnail-preview" class="mt-4"></div>
                                </div>

                            </div>

                            <div class="flex justify-end mt-8 border-t border-slate-200 pt-6">
                                <button type="submit"
                                    class="inline-flex items-center px-6 py-3 bg-sky-600 text-white font-bold rounded-xl shadow-md shadow-sky-600/30 hover:bg-sky-700 hover:shadow-sky-600/50 hover:-translate-y-0.5 transition-all duration-300">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                    Save Project
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<!-- Daftar Projects -->
<div class="bg-white overflow-hidden shadow-md sm:rounded-2xl border border-slate-100">
    <div class="p-8">
        <h2 class="text-2xl font-bold mb-8 text-slate-800 flex items-center">
            <svg class="w-6 h-6 mr-2 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            My Projects
        </h2>

        @if($projects->isEmpty())
            <div class="text-center py-12 bg-slate-50 rounded-xl border border-dashed border-slate-200">
                <p class="text-slate-500 font-medium">No projects yet. Add one above!</p>
            </div>
        @else
            <!-- Table untuk Admin -->
            <div class="hidden md:block overflow-x-auto mb-10 rounded-xl border border-slate-200">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-sky-50/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-sky-800 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-sky-800 uppercase tracking-wider">Tech Stack</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-sky-800 uppercase tracking-wider">Links</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-sky-800 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        @foreach($projects as $project)
                            <tr class="hover:bg-slate-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-slate-800">{{ $project->title }}</td>
                                <td class="px-6 py-4">
                                    <div class="space-y-1.5 max-w-md">
                                        @foreach($project->tech_stacks as $tech)
                                            @php
                                                $parts = explode(':', $tech->tech_stack, 2);
                                            @endphp
                                            @if(count($parts) === 2)
                                                <div class="flex items-center gap-1.5">
                                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider shrink-0 w-20">{{ trim($parts[0]) }}</span>
                                                    <div class="flex flex-wrap gap-0.5">
                                                        @foreach(explode(',', $parts[1]) as $sub)
                                                            <span class="inline-block bg-slate-100 rounded px-1.5 py-0.5 text-[10px] font-semibold text-slate-600 mr-0.5 mb-0.5 border border-slate-200">{{ trim($sub) }}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <span class="inline-block bg-slate-100 rounded px-1.5 py-0.5 text-[10px] font-semibold text-slate-600 mr-0.5 mb-0.5 border border-slate-200">{{ $tech->tech_stack }}</span>
                                            @endif
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @foreach($project->link_projects as $link)
                                        <a href="{{ $link->link }}" target="_blank" class="inline-flex items-center text-sky-600 hover:text-sky-800 font-medium mr-3 transition-colors">
                                            {{ ucfirst($link->links_type) }}
                                        </a>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form method="POST" action="{{ route('projects.destroy', $project->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 rounded-lg text-sm font-semibold transition-colors" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
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
                    <div class="group bg-white rounded-2xl shadow-md border border-slate-100 overflow-hidden cursor-pointer transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl flex flex-col" 
                        onclick="openProjectModal('project{{ $project->id }}')">
                        <div class="h-64 relative overflow-hidden bg-slate-950 flex items-center justify-center">
                            <!-- Blurred Backdrop -->
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="" class="absolute inset-0 w-full h-full object-cover blur-2xl opacity-40 scale-110 pointer-events-none">
                            <!-- Main Contain Image -->
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="relative z-10 max-w-full max-h-full object-contain transform group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h3 class="text-2xl font-bold mb-3 text-slate-800 group-hover:text-sky-600 transition-colors">{{ $project->title }}</h3>
                            <p class="text-slate-500 flex-grow">{{ Str::limit($project->description_thumbnail, 100) }}</p>
                            
                            <div class="mt-6 pt-4 border-t border-slate-100 space-y-2.5">
                                @foreach($project->tech_stacks as $tech)
                                    @php
                                        $parts = explode(':', $tech->tech_stack, 2);
                                    @endphp
                                    @if(count($parts) === 2)
                                        <div class="flex flex-col gap-1">
                                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">{{ trim($parts[0]) }}</span>
                                            <div class="flex flex-wrap gap-1">
                                                @foreach(explode(',', $parts[1]) as $sub)
                                                    <span class="px-2 py-0.5 bg-blue-50/50 text-blue-700 border border-blue-100 rounded-md text-[11px] font-medium">{{ trim($sub) }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <span class="px-2.5 py-1 bg-slate-50 text-slate-600 border border-slate-200 rounded-lg text-xs font-medium">{{ $tech->tech_stack }}</span>
                                    @endif
                                @endforeach
                            </div>
                            <div class="mt-4 flex flex-wrap gap-3">
                                @foreach($project->link_projects as $link)
                                    <a href="{{ $link->link }}" target="_blank" class="text-sky-600 hover:text-sky-800 text-sm font-medium flex items-center">
                                        {{ ucfirst($link->links_type) }}
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

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
                                        <button onclick="previousSlide('project{{ $project->id }}')" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/90 backdrop-blur text-slate-800 rounded-full p-3 hover:bg-white hover:text-sky-600 transition-all opacity-0 group-hover:opacity-100 shadow-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </button>
                                        <button onclick="nextSlide('project{{ $project->id }}')" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/90 backdrop-blur text-slate-800 rounded-full p-3 hover:bg-white hover:text-sky-600 transition-all opacity-0 group-hover:opacity-100 shadow-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                @endif

                                <div class="grid md:grid-cols-3 gap-8">
                                    <div class="md:col-span-2 space-y-6">
                                        <div>
                                            <h4 class="text-xl font-bold mb-3 text-slate-800 flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                                                About The Project
                                            </h4>
                                            <p class="text-slate-600 leading-relaxed">{{ $project->description }}</p>
                                        </div>

                                        <div>
                                            <h4 class="text-xl font-bold mb-4 text-slate-800 flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                Key Features
                                            </h4>
                                            <ul class="grid sm:grid-cols-2 gap-3">
                                                @foreach(explode(',', $project->key_feature) as $feature)
                                                    <li class="flex items-start text-slate-600">
                                                        <svg class="w-5 h-5 mr-2 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                        <span>{{ trim($feature) }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="space-y-6">
                                        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                                            <h4 class="font-bold mb-4 text-slate-800 text-sm uppercase tracking-wider">Technologies</h4>
                                            <div class="space-y-4">
                                                @foreach($project->tech_stacks as $tech)
                                                    @php
                                                        $parts = explode(':', $tech->tech_stack, 2);
                                                    @endphp
                                                    @if(count($parts) === 2)
                                                        <div class="space-y-1.5">
                                                            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">
                                                                {{ trim($parts[0]) }}
                                                            </span>
                                                            <div class="flex flex-wrap gap-1.5">
                                                                @foreach(explode(',', $parts[1]) as $sub)
                                                                    <span class="px-3 py-1.5 bg-white border border-slate-200 text-slate-700 rounded-lg text-xs font-medium shadow-sm hover:border-sky-300 transition-colors">
                                                                        {{ trim($sub) }}
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @else
                                                        <span class="px-3 py-1.5 bg-white border border-slate-200 text-slate-700 rounded-lg text-sm font-medium shadow-sm hover:border-sky-300 transition-colors">{{ $tech->tech_stack }}</span>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                                            <h4 class="font-bold mb-4 text-slate-800 text-sm uppercase tracking-wider">Project Links</h4>
                                            <div class="flex flex-col gap-3">
                                                @foreach($project->link_projects as $link)
                                                    <a href="{{ $link->link }}" target="_blank" class="inline-flex items-center justify-between px-4 py-3 bg-white border border-slate-200 hover:border-sky-300 text-slate-700 hover:text-sky-600 rounded-xl font-medium transition-all shadow-sm group">
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