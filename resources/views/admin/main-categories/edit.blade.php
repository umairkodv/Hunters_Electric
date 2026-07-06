<x-admin-layout title="Edit Main Category">
    <div class="max-w-lg bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
        <form action="{{ route('admin.main-categories.update', $mainCategory) }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Department</label>
                <select name="department_id" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @selected(old('department_id', $mainCategory->department_id) == $department->id)>{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $mainCategory->name) }}" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                <p class="text-[10px] text-gray-400 font-semibold mt-1">Current slug: <span class="font-mono">{{ $mainCategory->slug }}</span>. Changing the name regenerates it, which changes this category's URL.</p>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $mainCategory->sort_order) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
            </div>

            <div class="flex items-center gap-3 mt-2">
                <button type="submit" class="bg-accent text-nav-text text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors">
                    Save Changes
                </button>
                <a href="{{ route('admin.main-categories.index') }}" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
