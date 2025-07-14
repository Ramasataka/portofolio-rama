<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Profile Information</h3>
                        <button id="edit-btn" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                            Edit Profile
                        </button>
                    </div>

                    <form id="profile-form" method="POST" action="{{ route('update.information') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name" value="{{ $user->name ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                       disabled>
                            </div>

                            <!-- Email Contact -->
                            <div>
                                <label for="email_contact" class="block text-sm font-medium text-gray-700">Email Contact</label>
                                <input type="email" name="email_contact" id="email_contact" value="{{ $user->email_contanct ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                       disabled>
                            </div>

                            <!-- Phone Contact -->
                            <div>
                                <label for="phone_contact" class="block text-sm font-medium text-gray-700">Phone Contact</label>
                                <input type="text" name="phone_contact" id="phone_contact" value="{{ $user->phone_contanct ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                       disabled>
                            </div>

                            <!-- Role -->
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                <input type="text" name="role" id="role" value="{{ $user->role ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                       disabled>
                            </div>

                            <!-- GitHub Link -->
                            <div>
                                <label for="github_link" class="block text-sm font-medium text-gray-700">GitHub Link</label>
                                <input type="url" name="github_link" id="github_link" value="{{ $user->github_link ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                       disabled>
                            </div>

                            <!-- LinkedIn Link -->
                            <div>
                                <label for="linkedin_link" class="block text-sm font-medium text-gray-700">LinkedIn Link</label>
                                <input type="url" name="linkedin_link" id="linkedin_link" value="{{ $user->linkedin_link ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                       disabled>
                            </div>

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="3" 
                                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                          disabled>{{ $user->description ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Profile Image -->
                            <div class="md:col-span-2">
                                <label for="image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                                <div class="mt-1 flex items-center">
                                    <img id="preview" 
                                        src="{{ $user->image ? asset('storage/'.$user->image) : asset('images/default-profile.png') }}" 
                                        class="h-32 w-32 rounded-full object-cover">
                                    <div class="ml-4">
                                        <input type="file" name="image" id="image" 
                                            class="hidden" accept="image/*" disabled>
                                        <button type="button" onclick="document.getElementById('image').click()" 
                                                class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50"
                                                disabled>
                                            Change
                                        </button>
                                        <p class="text-xs text-gray-500 mt-1">JPG, PNG up to 2MB</p>
                                    </div>
                                </div>
                            </div>

                        <div class="flex justify-end space-x-4 mt-6 hidden" id="form-actions">
                            <button type="button" id="cancel-btn" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                                Cancel
                            </button>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- Form Skill -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Skills</h3>
                    
                    <!-- Form Tambah Skill -->
                    <form id="add-skill-form" method="POST" action="{{ route('add.skill') }}" class="mb-6">
                        @csrf
                        <div class="flex items-center gap-4">
                            <div class="flex-grow">
                                <label for="new_skill" class="sr-only">New Skill</label>
                                <input type="text" name="name" id="new_skill" 
                                       class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                       placeholder="Add new skill" required>
                            </div>
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                Add Skill
                            </button>
                        </div>
                    </form>

                    <!-- Daftar Skill -->
                    <div class="space-y-3">
                        @if ($skills->isEmpty())
                            <p class="text-gray-600">No skills added yet.</p>
                        @endif
                        
                        @foreach($skills as $skill)
                            <div class="flex items-center justify-between bg-gray-50 p-3 rounded-md">
                                <span>{{ $skill->tech_stack }}</span>
                                <form method="POST" action="{{ route('destroy.skill', $skill->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-500 hover:text-red-700 transition"
                                            onclick="return confirm('Are you sure you want to delete this skill?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Upload CV -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Upload CV</h3>

                    @if (session('cv_success'))
                        <div class="mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded">
                            {{ session('cv_success') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.uploadCv') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf

                        <div>
                            <label for="cv_file" class="block text-sm font-medium text-gray-700 mb-1">Upload CV (PDF only)</label>
                            <input type="file" name="cv_file" id="cv_file" accept=".pdf"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-[#222831]"
                                required>
                        </div>

                        <button type="submit"
                            class="px-6 py-2 bg-[#222831] text-white rounded-lg hover:bg-[#393E46] transition font-semibold">
                            Simpan CV
                        </button>
                    </form>
                    
                    {{-- Optional Preview --}}
                    @if($user->cv)
                        <div class="mt-4">
                            <p class="text-sm text-gray-600 mb-1">CV saat ini:</p>
                            <a href="{{ asset('storage/' . $user->cv) }}" target="_blank" class="text-blue-600 hover:underline text-sm">
                                Lihat CV
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editBtn = document.getElementById('edit-btn');
        const cancelBtn = document.getElementById('cancel-btn');
        const form = document.getElementById('profile-form');
        const inputs = form.querySelectorAll('input, textarea, button');
        const formActions = document.getElementById('form-actions');
        const profileImageInput = document.getElementById('image');
        const profileImagePreview = document.getElementById('preview');
        const changeImageBtn = document.querySelector('button[onclick*="image"]');

        // Fungsi untuk enable/disable semua input
        function toggleInputs(enable) {
            inputs.forEach(input => {
                input.disabled = !enable;
            });
            changeImageBtn.disabled = !enable;
        }

        // Handle edit button
        editBtn.addEventListener('click', function() {
            toggleInputs(true);
            formActions.classList.remove('hidden');
            editBtn.classList.add('hidden');
        });

        // Handle cancel button
        cancelBtn.addEventListener('click', function() {
            toggleInputs(false);
            formActions.classList.add('hidden');
            editBtn.classList.remove('hidden');
            
            // Reset image preview jika belum disimpan
            profileImagePreview.src = "{{ $user->image ? asset('storage/'.$user->image) : asset('images/default-profile.png') }}";
            profileImageInput.value = '';
        });

        // Handle image preview
        profileImageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    profileImagePreview.src = e.target.result;
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Handle form submission
        form.addEventListener('submit', function(e) {
            // Validasi tambahan bisa ditambahkan di sini
            // Jika menggunakan AJAX, bisa diimplementasikan di sini
        });
    });
</script>
</x-app-layout>