<x-layout>
    <div class="w-full bg-[#f8fafc] min-h-screen py-16 border-t border-gray-100 select-none antialiased flex items-center justify-center">
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-2xl shadow-2xs p-8">
            <div class="text-center mb-8">
                <span class="inline-block h-2 w-10 bg-accent rounded-full mb-3"></span>
                <h1 class="text-lg font-black uppercase tracking-wider text-nav-text">Create Account</h1>
                <p class="text-xs text-gray-500 font-semibold mt-1">Sign up to request quotes and track orders.</p>
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

            <form action="{{ route('register.attempt') }}" method="POST" class="flex flex-col gap-4">
                @csrf

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Password</label>
                    <input type="password" name="password" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                </div>

                <button type="submit"
                        class="mt-2 w-full bg-accent text-white text-xs font-black uppercase tracking-widest py-3 rounded-lg hover:bg-accent-hover transition-colors">
                    Create Account
                </button>
            </form>

            <p class="text-center text-xs font-semibold text-gray-500 mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="text-accent hover:text-accent-hover font-black">Sign in</a>
            </p>
        </div>
    </div>
</x-layout>
