<x-admin-layout title="Subcategories">
    <div class="flex items-center justify-between mb-6">
        <p class="text-xs font-semibold text-gray-500">{{ $subcategories->total() }} subcategories</p>
         <a href="#new-subcat-popup" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs">
            + New Sub Category
        </a>
    </div>

    <!-- Filter / Search Toolbar -->
    <form action="{{ route('admin.subcategories.index') }}" method="GET" class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-4 mb-6 flex flex-wrap items-end gap-4">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Search</label>
            <input type="text" name="search" value="{{ $search }}" placeholder="Search by name&hellip;"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
        </div>
        <div class="min-w-[200px] hidden sm:block">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Department</label>
            <select name="department_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                <option value="">All Departments</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" @selected($departmentId == $department->id)>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="min-w-[220px] hidden sm:block">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Main Category</label>
            <select name="main_category_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                <option value="">All Main Categories</option>
                @foreach ($mainCategories as $mainCategory)
                    <option value="{{ $mainCategory->id }}" @selected($mainCategoryId == $mainCategory->id)>{{ $mainCategory->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="min-w-[180px] hidden sm:block">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Featured</label>
            <select name="featured" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                <option value="">All</option>
                <option value="1" @selected($featured === '1')>Featured Only</option>
                <option value="0" @selected($featured === '0')>Not Featured</option>
            </select>
        </div>
        <div class="flex items-center gap-2">
            <button type="submit" class="bg-nav-text text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-nav-text/90 transition-colors">
                Filter
            </button>
            <a href="{{ route('admin.subcategories.index') }}" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                Reset
            </a>
        </div>
    </form>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
        <table class="w-full text-left table-fixed">
            <thead class="bg-[#f8fafc] border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 w-24 hidden sm:table-cell">Image</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Name</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 hidden md:table-cell">Main Category</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Department</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Featured</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 hidden md:table-cell">Products</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($subcategories as $subcategory)
                    <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                        <td class="px-6 py-4 w-24 hidden sm:table-cell">
                            <x-part-image :url="$subcategory->featured_image_url" :alt="$subcategory->name" class="h-10 w-10 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1" />
                        </td>
                        <td class="px-6 py-4 text-xs font-bold text-nav-text">{{ $subcategory->name }}</td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500 hidden md:table-cell">{{ $subcategory->mainCategory->name }}</td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $subcategory->mainCategory->department->name }}</td>
                        <td class="px-6 py-4">
                            @if ($subcategory->is_featured)
                                <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-accent/20 text-accent-hover uppercase tracking-widest">Featured</span>
                            @else
                                <span class="text-[10px] text-gray-300 font-semibold">&mdash;</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500 hidden md:table-cell">{{ $subcategory->products_count }}</td>
                        <td class="px-6 py-4 text-right align-middle select-none">
                            <div class="flex items-center justify-end gap-1.5 xs:gap-2.5">
                                <!-- EDIT ACTION -->
                                <a href="#edit-subcat-{{ $subcategory->id }}"
                                    class="inline-flex items-center justify-center h-8 xl:h-auto px-2 xl:px-3 py-1.5 rounded-lg bg-accent/10 hover:bg-accent text-accent hover:text-white text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs focus:outline-none focus:ring-2 focus:ring-accent/30"
                                    title="Edit Product">
                                    <span class="hidden xl:inline">Edit</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 xl:hidden">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                                <!-- DELETE ACTION -->
                                <a href="#delete-subcat-{{ $subcategory->id }}"
                                    class="inline-flex items-center justify-center h-8 xl:h-auto px-2 xl:px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-red-50 text-gray-500 hover:text-red-600 border border-gray-100 hover:border-red-200 text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-200"
                                    title="Delete Product">
                                    <span class="hidden xl:inline">Delete</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 xl:hidden">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- DYNAMIC STANDALONE EDIT COMPONENT SHEET -->
                    <x-admin-edit-modal :model="$subcategory" prefix="edit-subcat" title="Edit Subcategory: {{ $subcategory->name }}" :actionRoute="route('admin.subcategories.update', $subcategory)">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Main Category</label>
                            <select name="main_category_id" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-gray-50/40 focus:bg-white outline-none transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text cursor-pointer">
                                @foreach (\App\Models\MainCategory::with('department')->get() as $mainCategory)
                                    <option value="{{ $mainCategory->id }}" @selected(old('main_category_id', $subcategory->main_category_id) == $mainCategory->id)>
                                        {{ $mainCategory->department->name }} / {{ $mainCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Name</label>
                            <input type="text" name="name" value="{{ old('name', $subcategory->name) }}" required autocomplete="off" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>

                        <div class="border border-gray-200 rounded-lg p-3 flex flex-col gap-3">
                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-500">Category Image</p>

                            <div class="flex items-center gap-3">
                                <x-part-image :url="$subcategory->featured_image_url" :alt="$subcategory->name" class="h-14 w-14 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1" />
                                <p class="text-[10px] text-gray-400 font-semibold">
                                    {{ $subcategory->featured_image_url ? 'Current image' : 'No image set — showing placeholder' }}
                                </p>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 mb-1">Upload a new file</label>
                                <input type="file" name="featured_image_file" accept="image/*"
                                       class="w-full text-xs text-gray-600 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:uppercase file:tracking-wider file:bg-accent file:text-white hover:file:bg-accent-hover" />
                            </div>

                            <p class="text-center text-[10px] font-black uppercase tracking-widest text-gray-300">&mdash; or &mdash;</p>

                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 mb-1">Paste an image URL</label>
                                <input type="text" name="featured_image_url" value="{{ old('featured_image_url', $subcategory->featured_image_url) }}" placeholder="https://..." autocomplete="off"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
                            </div>

                            <p class="text-[10px] text-gray-400 font-semibold">Uploading a new file takes priority over the pasted URL. Leaving both unchanged keeps the current image. If neither is set, a placeholder image is shown on the site.</p>

                            @if ($subcategory->featured_image_url)
                                <label class="flex items-center gap-2 text-xs font-semibold text-red-600">
                                    <input type="checkbox" name="remove_image" value="1" class="rounded border-gray-300">
                                    Remove current image (fall back to placeholder)
                                </label>
                            @endif
                        </div>

                        <div class="py-1">
                            <label class="inline-flex items-center gap-2.5 text-xs font-bold text-gray-600 cursor-pointer select-none hover:text-nav-text transition-colors">
                                <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $subcategory->is_featured)) class="rounded border-gray-300 text-accent focus:ring-accent accent-accent h-4 w-4" />
                                <span>Show on homepage as a featured category</span>
                            </label>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $subcategory->sort_order) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>
                    </x-admin-edit-modal>

                    <!-- DYNAMIC STANDALONE DELETE COMPONENT SHEET -->
                    <x-admin-delete-modal :model="$subcategory" prefix="delete-subcat" :actionRoute="route('admin.subcategories.destroy', $subcategory)" :itemName="$subcategory->name" />

                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-xs font-semibold text-gray-400">No subcategories yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <x-admin-pagination :paginator="$subcategories" />

     <x-admin-modal id="new-subcat-popup" title="Create New Subcategory" :actionRoute="route('admin.subcategories.store')">
        
        <!-- 1. Main Category Assignment Dropdown -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Main Category</label>
            <select name="main_category_id" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-gray-50/40 focus:bg-white outline-none transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text cursor-pointer">
                <option value="" disabled selected class="text-gray-400">Select Main Category...</option>
                @foreach (\App\Models\MainCategory::with('department')->get() as $mainCategory)
                    <option value="{{ $mainCategory->id }}" @selected(old('main_category_id') == $mainCategory->id)>
                        {{ $mainCategory->department->name }} / {{ $mainCategory->name }}
                    </option>
                @endforeach
            </select>
        </div>

        
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required autocomplete="off" placeholder="e.g., Starter Armatures"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
            <p class="text-[10px] text-gray-400 font-semibold mt-1 select-none">The URL slug is generated automatically from this name.</p>
        </div>

        <!-- 3. Featured Asset Image Upload-or-Paste -->
        <div class="border border-gray-200 rounded-lg p-3 flex flex-col gap-3">
            <p class="text-[10px] font-black uppercase tracking-widest text-gray-500">Category Image</p>

            <div>
                <label class="block text-[10px] font-bold text-gray-500 mb-1">Upload a file</label>
                <input type="file" name="featured_image_file" accept="image/*"
                       class="w-full text-xs text-gray-600 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:uppercase file:tracking-wider file:bg-accent file:text-white hover:file:bg-accent-hover" />
            </div>

            <p class="text-center text-[10px] font-black uppercase tracking-widest text-gray-300">&mdash; or &mdash;</p>

            <div>
                <label class="block text-[10px] font-bold text-gray-500 mb-1">Paste an image URL</label>
                <input type="text" name="featured_image_url" value="{{ old('featured_image_url') }}" placeholder="https://..." autocomplete="off"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
            </div>

            <p class="text-[10px] text-gray-400 font-semibold">If neither is provided, a placeholder image is shown instead. Used on the homepage hero slider when this subcategory is featured.</p>
        </div>

        <!-- 4. Featured State Selection Toggle Checkbox Button -->
        <div class="py-1">
            <label class="inline-flex items-center gap-2.5 text-xs font-bold text-gray-600 cursor-pointer select-none hover:text-nav-text transition-colors">
                <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured')) 
                       class="rounded border-gray-300 text-accent focus:ring-accent accent-accent h-4 w-4" />
                <span>Show on homepage as a featured category</span>
            </label>
        </div>

        <!-- 5. Stacking Sort Index Order Counter Input -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
        </div>

        <!-- Custom Modal Footer Buttons Action Slot -->
        <x-slot:footerActions>
            <button type="submit" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs cursor-pointer">
                Create Subcategory
            </button>
        </x-slot:footerActions>

    </x-admin-modal>
</x-admin-layout>
