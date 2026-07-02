@php
    $menuData = config('catalog.menu_data', []);
    $currentRoute = Route::currentRouteName();
@endphp

<!-- Main Container Base Workspace Grid Canvas Layer -->
<div class="w-full bg-white min-h-screen py-8 select-none">
    <div class="max-w-7xl mx-auto px-6 sm:px-12 grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">

        <!-- ======================================================== -->
        <!-- COLUMN 1: LEFT VERTICAL CATALOG SECTOR SIDEBAR            -->
        <!-- ======================================================== -->
        <aside
            class="col-span-1 lg:col-span-3 bg-white border border-gray-200 rounded-2xl p-6 shadow-2xs flex flex-col gap-5 self-start z-20">

            <div class="flex items-center gap-2 border-b border-gray-100 pb-3">
                <span class="h-4 w-1 bg-accent rounded-full"></span>
                <h3 class="text-[10px] font-black uppercase tracking-widest text-nav-text">
                    Browse All Collections
                </h3>
            </div>

            <nav class="flex flex-col gap-3 w-full">
                @foreach ($menuData as $title => $columns)
                    @php
                        $routeName = strtolower($title);
                        $routeUrl = Route::has($routeName) ? route($routeName) : '#';
                        $isActive = $currentRoute === $routeName;
                    @endphp
                    <a href="{{ $routeUrl }}"
                        class="group flex items-center gap-3 px-3 py-1.5 border-l-2 transition-all duration-150 {{ $isActive ? 'text-accent border-accent font-black' : 'border-transparent text-nav-subtext hover:text-accent font-bold' }}">

                        <!-- High-contrast inline SVGs mapped natively back onto specific taxonomy classes -->
                        <div
                            class="h-4 w-4 shrink-0 flex items-center justify-center text-gray-400 group-hover:text-accent transition-colors">
                            @if ($title === 'Alternators')
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            @elseif($title === 'Starters')
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16v-4a2 2 0 00-2-2h-3l-2.5-4H10" />
                                </svg>
                            @elseif($title === 'Motors')
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            @elseif($title === 'Generators')
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            @elseif($title === 'Components')
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                                </svg>
                            @else
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            @endif
                        </div>

                        <span class="text-[11px] uppercase tracking-wider truncate mr-auto">
                            {{ $title }}
                        </span>

                        <svg class="h-3 w-3 text-gray-300 opacity-0 group-hover:opacity-100 group-hover:translate-x-0.5 transform transition-all"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @endforeach
            </nav>

        </aside>

        <!-- ======================================================== -->
        <!-- COLUMN 2: SOLID DARK / ACCENT INDUSTRIAL HERO SPLICE    -->
        <!-- ======================================================== -->
        <!-- FIXED: Stripped static height rules to prevent content overflowing and breaking alignment metrics -->
        <div class="col-span-1 lg:col-span-9 relative rounded-2xl overflow-hidden shadow-2xs border border-gray-100 bg-white flex flex-col items-center justify-center min-h-[460px] lg:h-[520px] z-10 group select-none">

    <!-- ======================================================== -->
    <!-- ASYMMETRIC PURE CSS GEOMETRIC BLACK CORNER ACCENTS       -->
    <!-- ======================================================== -->
    <div class="absolute top-0 left-0 w-24 h-24 bg-black [clip-path:polygon(0_0,_100%_0,_0_100%)] z-30 select-none pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-24 h-24 bg-black [clip-path:polygon(100%_0,_100%_100%,_0_100%)] z-30 select-none pointer-events-none"></div>

    <!-- ======================================================== -->
    <!-- PURE CSS AUTOPLAY FULL-SCALE IMAGE CAROUSEL TRACK        -->
    <!-- ======================================================== -->
    @php
        $components = config('catalog.popular_components', []);
        $slideCount = count($components);
        $totalDuration = $slideCount * 4; // 4 seconds per component slide change
    @endphp

    <style>
        @keyframes fullScreenSlider {
            0%, 10% { opacity: 1; transform: scale(1); }
            12.5%, 87.5% { opacity: 0; transform: scale(0.98); }
            90%, 100% { opacity: 1; transform: scale(1); }
        }
        .animate-hero-slide {
            animation: fullScreenSlider {{ $totalDuration }}s ease-in-out infinite;
        }
    </style>

    <!-- Unified Sliding Image Canvas Track Stack wrapper -->
    <div class="absolute inset-0 w-full h-full z-10 flex items-center justify-center overflow-hidden bg-white">
        @foreach ($components as $index => $component)
            @php
                // Dynamically offset the start delay per individual image loop track
                $delay = $index * 4;
            @endphp
            <div class="absolute inset-0 w-full h-full flex flex-col justify-end items-center animate-hero-slide p-12" 
                 style="animation-delay: -{{ $delay }}s; z-index: {{ $slideCount - $index }};">
                
                <!-- FIXED: Changed from object-cover to object-contain to eliminate stretching completely -->
                <img src="{{ $component['image'] }}" 
                     alt="{{ $component['name'] }}" 
                     class="w-full h-full object-contain object-center filter contrast-[1.02]" />

                <!-- ======================================================== -->
                <!-- FLOATING TRANSPARENT TEXT NAME BANNER CONTROLS           -->
                <!-- ======================================================== -->
                <!-- Frosted glass banner container -->
                <div class="absolute bottom-12 left-1/2 -translate-x-1/2 w-11/12 max-w-md bg-black/70 backdrop-blur-md border border-white/10 rounded-xl px-6 py-4 flex flex-col gap-1 items-center justify-center text-center shadow-lg transition-transform duration-300 transform group-hover:scale-[1.01] pointer-events-auto">
                    <span class="text-[9px] font-black uppercase tracking-widest text-accent leading-none">
                        Featured Industrial Component
                    </span>
                    <h2 class="text-base sm:text-lg font-black uppercase tracking-wider text-white mt-1 leading-tight">
                        {{ $component['name'] }}
                    </h2>
                </div>

            </div>
        @endforeach
    </div>

</div>




    </div>

</div>

</div>

</div>
</div>
