<div class="relative w-full min-h-[500px] lg:h-[600px] bg-black overflow-hidden flex flex-col lg:flex-row">
    
    <!-- Left Section: Visual Image Canvas Layer -->
    <div class="relative w-full lg:w-1/2 h-[300px] lg:h-full shrink-0">
        <!-- FIXED: Using Laravel asset helper to load the local project image safely -->
        <img src="https://plus.unsplash.com/premium_photo-1661964291917-b20c2648fac6?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGNhciUyMHBhcnRzfGVufDB8fDB8fHww" 
             alt="Quality automotive engineering rebuilding parts" 
             class="w-full h-full object-cover object-center" />
        <!-- Slight dark gradient layer for visual depth overlay over small viewports -->
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent lg:hidden"></div>
    </div>

    <!-- Right Section: Angle Splice Accent Panel Grid (Uses the semantic Accent Color token) -->
    <div class="relative w-full lg:w-1/2 bg-accent lg:[clip-path:polygon(12%_0,_100%_0,_100%_100%,_0_100%)] lg:-ml-[6%] h-full flex items-center px-8 sm:px-12 lg:pl-28 lg:pr-16 py-16 lg:py-0 text-white select-none z-10">
        
        <div class="w-full max-w-xl flex flex-col gap-6 text-center lg:text-left">
            
            <!-- Subheading Block Header Tracker Text Elements -->
            <span class="text-xs sm:text-sm font-extrabold uppercase tracking-widest text-white/90 leading-tight block">
                Delivering Quality Parts and<br class="hidden sm:inline" /> Relevant Know-How To
            </span>

            <!-- Main Punchy Marketing Value Proposition Title Section -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black uppercase tracking-tight text-white leading-[0.95] drop-shadow-sm">
                Keep Things<br /> Running
            </h1>

            <!-- Tertiary Action Text Component Separator Layout -->
            <p class="text-xs sm:text-sm font-black uppercase tracking-wider text-white/95">
                Rebuilding right starts here.
            </p>

            <!-- Dual Core Call-To-Action Button Flex Control Row -->
            <div class="flex flex-col sm:flex-row items-center gap-4 mt-4 justify-center lg:justify-start">
                
                <!-- White Accent High-Contrast Primary Link Button -->
                <a href="#" class="w-full sm:w-auto text-center bg-white text-nav-text hover:bg-gray-100 font-bold text-xs uppercase tracking-wider px-8 py-3.5 rounded transition-all shadow-md focus:outline-none focus:ring-2 focus:ring-white">
                    Log In To Account
                </a>

                <!-- Semi-Transparent Dark Secondary Theme Alternative Action Link Button -->
                <a href="#" class="w-full sm:w-auto text-center bg-black/80 hover:bg-black text-white font-bold text-xs uppercase tracking-wider px-8 py-3.5 rounded transition-all border border-white/10 focus:outline-none focus:ring-2 focus:ring-black">
                    Become A Customer
                </a>

            </div>

        </div>

    </div>

</div>
