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

    @if($errors->any())
        <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-lg shadow-sm relative max-w-7xl mx-auto mt-4" role="alert">
            <strong class="font-bold block text-sm">Please correct the following errors:</strong>
            <ul class="mt-2 list-disc list-inside text-xs text-red-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Add New Certification Form -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-2xl border border-slate-100 mb-10">
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-6 text-slate-800 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        Add New License / Certification
                    </h2>

                    <div class="max-w-4xl mx-auto p-8 bg-slate-50/50 shadow-inner rounded-xl border border-slate-100">
                        <form action="{{ route('certifications.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-slate-700">Certification Name / Title</label>
                                    <input type="text" name="name" id="name" placeholder="e.g. Laravel Certified Developer" required
                                        class="mt-2 block w-full border border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 transition-colors">
                                </div>

                                <div>
                                    <label for="issuer" class="block text-sm font-semibold text-slate-700">Issuing Organization</label>
                                    <input type="text" name="issuer" id="issuer" placeholder="e.g. Laravel Organization / Google Cloud" required
                                        class="mt-2 block w-full border border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 transition-colors">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="year" class="block text-sm font-semibold text-slate-700">Year of Issuance</label>
                                    <input type="text" name="year" id="year" placeholder="e.g. 2024 / May 2024" required
                                        class="mt-2 block w-full border border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 transition-colors">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="description" class="block text-sm font-semibold text-slate-700">Description / Key Knowledge Verified</label>
                                    <textarea name="description" id="description" rows="4" placeholder="Describe the topics and skills this credential verifies..." required
                                        class="mt-2 block w-full border border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 transition-colors"></textarea>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="image" class="block text-sm font-semibold text-slate-700">Credential Photo / Certificate (optional)</label>
                                    <input type="file" name="image" id="image" accept="image/*"
                                        class="mt-2 block w-full border border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors">
                                </div>
                            </div>

                            <div class="flex justify-end mt-8 border-t border-slate-200 pt-6">
                                <button type="submit"
                                    class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-bold rounded-xl shadow-md shadow-blue-600/30 hover:bg-blue-700 hover:shadow-blue-600/50 hover:-translate-y-0.5 transition-all duration-300">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2-h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                    Save Certification
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- List of Current Certifications -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-2xl border border-slate-100">
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-8 text-slate-800 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        My Licenses & Certifications
                    </h2>

                    @if($certifications->isEmpty())
                        <div class="text-center py-12 bg-slate-50 rounded-xl border border-dashed border-slate-200">
                            <p class="text-slate-500 font-medium">No certifications added yet. Add one above!</p>
                        </div>
                    @else
                        <div class="overflow-x-auto rounded-xl border border-slate-200">
                            <table class="min-w-full divide-y divide-slate-200">
                                <thead class="bg-blue-50/50">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-800 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-800 uppercase tracking-wider">Issuer</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-800 uppercase tracking-wider">Year</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-800 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-200">
                                    @foreach($certifications as $cert)
                                        <tr class="hover:bg-slate-50 transition-colors duration-150">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="font-medium text-slate-800">{{ $cert->name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-slate-700 font-medium">{{ $cert->issuer }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-block bg-blue-50 text-blue-600 px-2 py-0.5 rounded text-xs font-bold border border-blue-100">{{ $cert->year }}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <form method="POST" action="{{ route('certifications.destroy', $cert->id) }}" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                        class="px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 rounded-lg text-sm font-semibold transition-colors" 
                                                        onclick="return confirm('Are you sure you want to delete this certification?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
