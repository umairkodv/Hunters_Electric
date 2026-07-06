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
                            ['label' => 'Dashboard', 'route' => 'admin.dashboard'],
                            ['label' => 'Departments', 'route' => 'admin.departments.index'],
                            ['label' => 'Main Categories', 'route' => 'admin.main-categories.index'],
                            ['label' => 'Subcategories', 'route' => 'admin.subcategories.index'],
                            ['label' => 'Products', 'route' => 'admin.products.index'],
                        ];
                    @endphp
                    @foreach ($navItems as $item)
                        @php
                            $active = request()->routeIs($item['route']) || request()->routeIs(str_replace('.index', '.*', $item['route']));
                        @endphp
                        <a href="{{ route($item['route']) }}"
                           class="px-3 py-2 rounded-lg text-xs font-bold uppercase tracking-wider transition-colors {{ $active ? 'bg-accent text-nav-text' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                            {{ $item['label'] }}
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
                    @auth('admin')
                        <span class="text-xs font-semibold text-gray-500">{{ auth('admin')->user()->name }}</span>
                    @endauth
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
