<form class="mx-auto w-full max-w-[750px] px-4">
    <!-- REMAPPED: border-red-600 -> border-accent | focus-within:ring-red-500 -> focus-within:ring-accent -->
    <div class="group flex items-center overflow-hidden rounded-xl border border-accent bg-white pl-3 focus-within:ring-2 focus-within:ring-accent">
        
        <input type="text" placeholder="Search..."
            class="w-full bg-transparent py-2.5 text-base text-nav-text placeholder-gray-400 outline-none border-none min-w-0" />
        
        <!-- REMAPPED: bg-red-600 -> bg-accent | hover:bg-red-700 -> hover:bg-accent/90 | active:bg-red-800 -> active:bg-accent/80 -->
        <button type="submit"
            class="flex h-11 w-12 shrink-0 items-center justify-center bg-accent text-white transition-colors hover:bg-accent/90 active:bg-accent/80"
            aria-label="Submit search">
            <x-fas-search class="h-5 w-5" />
        </button>
        
    </div>
</form>
