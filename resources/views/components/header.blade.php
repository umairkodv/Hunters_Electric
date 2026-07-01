<header class="bg-black text-white w-full py-6 px-12 flex gap-4 items-center justify-between">
    <!-- REMAPPED: hover:ring-red-500 -> hover:ring-accent -->
    <a href="{{ route('home') }}" class="text-nowrap font-bold tracking-wide p-1 ring-2 ring-transparent hover:ring-accent transition-all duration-150 ease-in-out">
        {{ config('app.name', 'My Website') }}
    </a>
    
    <x-searchbar/>
    
    <div class="flex">
        <!-- REMAPPED: hover:ring-red-500 -> hover:ring-accent -->
        <a href="#" class="flex items-end gap-2 p-1 ring-2 ring-transparent hover:ring-accent transition-all duration-150 ease-in-out">
            <x-fas-user class="w-5 h-5 mb-1" />
            <div class="flex flex-col items-start justify-end text-nowrap">
                <span class="text-xs text-gray-300">Please Log In</span>
                <p class="font-bold text-sm tracking-wide">MY ACCOUNT</p>
            </div>
        </a>
        
        <!-- REMAPPED: hover:ring-red-500 -> hover:ring-accent -->
        <a href="#" class="flex items-center gap-2 ml-10 p-1 ring-2 ring-transparent hover:ring-accent transition-all duration-150 ease-in-out">
            <x-fas-cart-shopping class="w-5 h-5" />
            <!-- REMAPPED: bg-red-600 -> bg-accent -->
            <div class="w-6 h-6 bg-accent flex items-center justify-center rounded-full shadow-sm">
                <span class="text-xs font-bold text-white">1</span>
            </div>
        </a>
    </div>
</header>
