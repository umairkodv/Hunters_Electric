@props(['title' => 'Admin'])
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }} — Admin — {{ config('app.name', 'Hunters Electric') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-gray-100 antialiased">
        <div class="min-h-screen flex">

            <!-- Sidebar -->
            <aside class="w-64 shrink-0 bg-nav-text text-white flex flex-col">
                <div class="px-6 py-5 border-b border-white/10">
                    <span class="text-sm font-black uppercase tracking-widest">Admin Panel</span>
                </div>
                <nav class="flex-1 px-3 py-4 flex flex-col gap-1">
                    @php
                        
                        $navItems = [
                            ['label' => 'Live Site', 'url' => url('/'), 'external' => true],
                            ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'external' => false],
                            ['label' => 'Departments', 'route' => 'admin.departments.index', 'external' => false],
                            ['label' => 'Main Categories', 'route' => 'admin.main-categories.index', 'external' => false],
                            ['label' => 'Subcategories', 'route' => 'admin.subcategories.index', 'external' => false],
                            ['label' => 'Products', 'route' => 'admin.products.index', 'external' => false],
                        ];
                    @endphp
                    @foreach ($navItems as $item)
                        @php
                            // Check if the current nav item is an active administrative route option
                            $active = !$item['external'] && (request()->routeIs($item['route']) || request()->routeIs(str_replace('.index', '.*', $item['route'])));
                            
                            // Dynamically swap between named route generators and raw public URLs
                            $linkHref = $item['external'] ? $item['url'] : route($item['route']);
                        @endphp
                        
                        <!-- Renders using your exact native font tracking, paddings, and theme configurations -->
                        <a href="{{ $linkHref }}"
                           @if($item['external']) target="_blank" @endif
                           class="px-3 py-2 rounded-lg text-xs font-bold uppercase tracking-wider transition-colors {{ $active ? 'bg-accent text-nav-text' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                            {{ $item['label'] }} @if($item['external']) &rarr; @endif
                        </a>
                    @endforeach
                </nav>
                <div class="px-3 py-4 border-t border-white/10">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-xs font-bold uppercase tracking-wider text-white/70 hover:bg-white/10 hover:text-white transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Main content -->
            <div class="flex-1 flex flex-col min-w-0">
                <header class="bg-white border-b border-gray-200 px-8 py-5 flex items-center justify-between">
                    <h1 class="text-lg font-black uppercase tracking-wider text-nav-text">{{ $title }}</h1>
                    
                    <div class="flex items-center gap-4">
                        <!-- FIXED: Added an extra text shortcut link into the top bar header for quick access -->
                        <a href="{{ url('/') }}" target="_blank" class="text-xs font-semibold text-gray-400 hover:text-accent transition-colors flex items-center gap-1">
                            <span>Live Site</span>
                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                        </a>
                        <span class="h-4 w-px bg-gray-200"></span>
                        
                        @auth('admin')
                            <span class="text-xs font-semibold text-gray-500">{{ auth('admin')->user()->name }}</span>
                        @else
                            <!-- Fallback text label avoids an empty layout line if auth session is empty -->
                            <span class="text-xs font-semibold text-gray-500">Site Administrator</span>
                        @endauth
                    </div>
                </header>

                <main class="flex-1 p-8">
                    @if (session('status'))
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 text-xs font-bold px-4 py-3 rounded-lg">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 text-xs font-bold px-4 py-3 rounded-lg">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
