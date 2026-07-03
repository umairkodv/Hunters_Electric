@props(['slides'])

@php
    // $slides is supplied by HomeController@index via hero-banner, instead of
    // querying the database directly inside this component.
    $components = $slides;
    $slideCount = $components->count();
    
    // Safety check fallback to prevent zero division errors if table returns empty records
    $slideCount = $slideCount > 0 ? $slideCount : 1; 
    
    $secondsPerSlide = 4; 
    $totalDuration = $slideCount * $secondsPerSlide; 
@endphp

<style>
    /*
       UNIFIED MATHEMATICAL TIMELINE EQUATION MODEL:
       Instead of hardcoding percentages, we let CSS variables read individual layer offsets.
       --slide-index is passed directly from our blade template loop steps.
    */
    @keyframes dynamicIndustrialFade {
        0% {
            opacity: 0;
            z-index: 10;
        }
        /* Fade In step window calculation track */
        /* Entry active window starts exactly when (index * duration per slide) is reached */
        /* Hold state continues until index transitions forward */
        {{ (1 / $slideCount) * 10 }}%, 
        {{ (1 / $slideCount) * 90 }}% {
            opacity: 1;
            z-index: 20;
        }
        /* Complete Fade Out and push element background out of focus boundaries */
        {{ (1 / $slideCount) * 100 }}%, 100% {
            opacity: 0;
            z-index: 10;
        }
    }

    .dynamic-slider-layer {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        /* Calculate precise starting delay natively across the layout using math operators */
        animation-delay: calc(var(--slide-index) * {{ $secondsPerSlide }}s);
        animation-duration: {{ $totalDuration }}s;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-name: dynamicIndustrialFade;
    }
</style>

<!-- Main Unified Box Container Frame -->
<div class="col-span-1 lg:col-span-9 relative rounded-2xl overflow-hidden shadow-xs border border-gray-100 bg-white flex flex-col min-h-[480px] lg:h-[520px] w-full select-none z-10">

    <!-- ======================================================== -->
    <!-- ASYMMETRIC PURE CSS GEOMETRIC BLACK CORNER ACCENTS       -->
    <!-- ======================================================== -->
    <div class="absolute top-0 left-0 w-24 h-24 bg-black [clip-path:polygon(0_0,_100%_0,_0_100%)] z-30 pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-24 h-24 bg-black [clip-path:polygon(100%_0,_100%_100%,_0_100%)] z-30 pointer-events-none"></div>

    <!-- ======================================================== -->
    <!-- UNIFIED ROTATING BASE VIEW ENGINE CONTAINER TRACK        -->
    <!-- ======================================================== -->
    <div class="relative w-full h-full flex flex-col items-center justify-center overflow-hidden">
        
        @foreach ($components as $index => $component)
            <!-- Individual Component Card Slide Frame -->
            <!-- FIXED: Injected '--slide-index' inline variable to isolate delay metrics dynamically -->
            <div class="dynamic-slider-layer flex flex-col justify-between"
                 style="--slide-index: {{ $index }};">
                
                <!-- 1. The Proportional White Product Image View Area -->
                <div class="w-full h-3/4 flex items-center justify-center bg-white p-12 overflow-hidden">
                    <!-- FIXED: Sourced image_url parameter cleanly from database record column -->
                    <img src="{{ $component->featured_image_url }}" 
                         alt="{{ $component->name }}" 
                         class="h-full w-auto max-h-full max-w-[85%] object-contain object-center filter contrast-[1.02]" />
                </div>

                <!-- 2. The Integrated Base Text Information Card Panel Box -->
                <div class="w-full h-1/4 bg-gray-50 border-t border-gray-100 px-8 py-5 flex flex-col justify-center items-center text-center relative z-20">
                    <span class="text-[9px] font-black uppercase tracking-widest text-accent leading-none">
                        Featured Industrial Component
                    </span>
                    <h2 class="text-sm sm:text-base font-black uppercase tracking-wider text-nav-text mt-1.5 leading-tight">
                        <!-- FIXED: Sourced name parameter cleanly from database record column -->
                        {{ $component->name }}
                    </h2>
                </div>

            </div>
        @endforeach

    </div>

</div>
