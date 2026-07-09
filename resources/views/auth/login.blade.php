<x-layout>
    <div class="w-full bg-[#f8fafc] min-h-screen py-16 border-t border-gray-100 select-none antialiased flex items-center justify-center">
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-2xl shadow-2xs p-8">
            <div class="text-center mb-8">
                <span class="inline-block h-2 w-10 bg-accent rounded-full mb-3"></span>
                <h1 class="text-lg font-black uppercase tracking-wider text-nav-text">Sign In</h1>
                <p class="text-xs text-gray-500 font-semibold mt-1">Access your account to track quotes and orders.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 text-xs font-bold px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 text-xs font-bold px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login.attempt') }}" method="POST" class="flex flex-col gap-4">
                @csrf

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Password</label>
                    <input type="password" name="password" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                </div>

                <label class="flex items-center gap-2 text-xs font-semibold text-gray-500">
                    <input type="checkbox" name="remember" class="rounded border-gray-300">
                    Remember me
                </label>

                <button type="submit"
                        class="mt-2 w-full bg-accent text-white text-xs font-black uppercase tracking-widest py-3 rounded-lg hover:bg-accent-hover transition-colors">
                    Sign In
                </button>
            </form>

            <p class="text-center text-xs font-semibold text-gray-500 mt-6">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-accent hover:text-accent-hover font-black">Create one</a>
            </p>
        </div>
    </div>
</x-layout>
