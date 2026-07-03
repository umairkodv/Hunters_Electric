@php
    // $navDepartments is supplied by the global view composer in AppServiceProvider
    // (single database-driven source of truth for all navigation).
    $currentRoute = Route::currentRouteName();
@endphp

<!-- Main Header Banner Tracking Layout Matrix -->
<header class="bg-black text-white w-full py-4 lg:py-6 px-6 sm:px-12 flex flex-wrap gap-y-4 gap-x-4 items-center justify-between relative z-50 select-none">
    
    <!-- PURE CSS MECHANICAL CONTROL TRIGGER -->
    <input type="checkbox" id="global-mobile-menu-trigger" class="peer/menu hidden" />

    
    <a href="{{ route('home') }}" class="text-nowrap font-bold tracking-wide p-1 hover:text-accent transition-all duration-150 ease-in-out uppercase text-base sm:text-lg">
        {{ config('app.name', 'My Website') }}
    </a>
    
    <!-- Center Section: Adaptive Searchbar Track Container -->
    <div class="w-full lg:w-auto grow max-w-none lg:max-w-[600px] xl:max-w-[750px] order-last lg:order-none">
        <x-searchbar />
    </div>
    
    <!-- Right Section: Desktop Action Utilities Deck -->
    <div class="flex items-center gap-2 sm:gap-4 shrink-0 relative">
        <!-- Desktop uses high-contrast light colors over the black header bar -->
        <a href="#" class="hidden lg:flex items-end gap-2 p-1 ring-2 ring-transparent hover:ring-accent duration-150 ease-in-out">
            <x-fas-user class="w-5 h-5 mb-1 text-white/80" />
            <div class="flex flex-col items-start justify-end text-nowrap leading-none">
                <span class="text-[11px] text-white/60 font-medium">Please Log In</span>
                <p class="font-bold text-xs uppercase tracking-wider mt-0.5 text-white">MY ACCOUNT</p>
            </div>
        </a>
        
        <a href="#" class="flex items-center gap-2 p-1 ring-2 ring-transparent hover:ring-accent duration-150 ease-in-out">
            <x-fas-cart-shopping class="w-5 h-5 text-white/80" />
            <!-- Dynamic Red Accent Circle Badge Background Layer -->
            <div class="w-6 h-6 bg-accent flex items-center justify-center rounded-full shadow-sm shrink-0">
                <span class="text-xs font-bold text-white">0</span>
            </div>
        </a>

        <!-- Mobile Hamburger Button Trigger -->
        <label for="global-mobile-menu-trigger" class="flex lg:hidden p-1 text-white/80 hover:text-accent focus:outline-none transition-colors cursor-pointer select-none" aria-label="Toggle navigation drawer">
            <x-fas-bars class="h-5 w-5"/>
        </label>
    </div>

    <!-- ======================================================== -->
    <!-- SLIDE-IN MOBILE DRAWER CANVAS OVERLAY                    -->
    <!-- ======================================================== -->
    <!-- Backdrop blur fading mask layer -->
    <div class="fixed inset-0 w-full h-screen bg-black/60 backdrop-blur-xs z-50 invisible opacity-0 transition-all duration-300 ease-in-out peer-checked/menu:visible peer-checked/menu:opacity-100 lg:hidden">
        <label for="global-mobile-menu-trigger" class="absolute inset-0 cursor-pointer"></label>
    </div>

    <!-- Sidebar content navigation track box with pure CSS slide-in transform states -->
    <div class="fixed top-0 right-0 w-full max-w-xs sm:max-w-sm h-screen bg-[#090d16] text-white z-50 overflow-y-auto px-6 py-5 flex flex-col justify-start transform translate-x-full transition-transform duration-300 ease-in-out peer-checked/menu:translate-x-0 lg:hidden shadow-2xl">
        
        <!-- Top Control Row: Perfectly centered close layout icon anchor -->
        <div class="flex items-center justify-end h-9 shrink-0 mb-6">
            <label for="global-mobile-menu-trigger" class="p-1 text-white/40 hover:text-white transition-colors cursor-pointer select-none">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </label>
        </div>

        <!-- Master Navigation Link List Tree Stream -->
        <nav onclick="document.getElementById('global-mobile-menu-trigger').checked = false;" class="w-full flex flex-col gap-1.5 grow">
            
            <!-- 1. EXPLICIT HOME LINK (Highlights beautifully with your Red Accent color config) -->
            @php $isHomeActive = ($currentRoute === 'home'); @endphp
            <a href="{{ route('home') }}" 
               class="group flex items-center justify-between px-4 py-3.5 rounded-lg border-l-4 transition-all duration-150 {{ $isHomeActive ? 'bg-accent/10 text-accent border-accent' : 'border-transparent text-white/70 hover:bg-white/[0.03] hover:text-white' }}">
                <span class="text-xs font-black uppercase tracking-wider">Home Dashboard</span>
                <svg class="h-3.5 w-3.5 {{ $isHomeActive ? 'text-accent' : 'text-white/20 group-hover:text-white/40' }} transform group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <!-- 2. DYNAMIC CATALOG DEPARTMENTS STREAM LINKS -->
            @foreach ($navDepartments as $department)
                @php
                    $routeUrl = route('department.show', $department->slug);
                    $isLinkActive = ($currentRoute === 'department.show' && request()->segment(1) === $department->slug);
                @endphp
                <a href="{{ $routeUrl }}" 
                   class="group flex items-center justify-between px-4 py-3.5 rounded-lg border-l-4 transition-all duration-150 {{ $isLinkActive ? 'bg-accent/10 text-accent border-accent' : 'border-transparent text-white/70 hover:bg-white/[0.03] hover:text-white' }}">
                    <span class="text-xs font-black uppercase tracking-wider">
                        {{ $department->name }}
                    </span>
                    <svg class="h-3.5 w-3.5 {{ $isLinkActive ? 'text-accent' : 'text-white/20 group-hover:text-white/40' }} transform group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @endforeach

        </nav>

    </div>
</header>
