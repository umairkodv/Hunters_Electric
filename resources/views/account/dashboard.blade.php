<x-layout>
    <div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100 select-none antialiased">
        <div class="max-w-5xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6 w-full">
                <div class="text-left">
                    <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                        <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                        <span class="text-accent">My Account</span>
                    </h1>
                    <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">Welcome back, {{ $user->name }}.</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-red-600 transition-colors">
                        Sign Out
                    </button>
                </form>
            </div>

            @if (session('status'))
                <div class="bg-green-50 border border-green-200 text-green-800 text-xs font-bold px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">Name</p>
                    <p class="text-sm font-bold text-nav-text mt-1">{{ $user->name }}</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">Email</p>
                    <p class="text-sm font-bold text-nav-text mt-1">{{ $user->email }}</p>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
                <a href="{{ route('account.edit') }}" class="text-xs font-black uppercase tracking-widest text-accent hover:text-accent-hover transition-colors">
                    Edit Profile &rarr;
                </a>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Quotes &amp; Orders</p>
                <p class="text-xs font-semibold text-gray-500">You don't have any quote requests or orders yet. Browse the catalog and request a quote on any part to get started.</p>
            </div>

        </div>
    </div>
</x-layout>
