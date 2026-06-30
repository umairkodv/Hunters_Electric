<header class="bg-black text-white w-full py-6 px-12 flex gap-4 items-center justify-between">
    <a href="{{ route('home') }}" class="text-nowrap font-bold tracking-wide p-1 ring-2 ring-transparent hover:ring-red-500 transition-all duration-150 ease-in-out">{{ env('APP_NAME') }}</a>
    <x-searchbar/>
    <div class="flex">
        <a href="#" class="flex items-end gap-2 p-1 ring-2 ring-transparent hover:ring-red-500 transition-all duration-150 ease-in-out">
            <x-fas-user class="w-5 h-5 mb-1" />
            <div class="flex flex-col items-start justify-end text-nowrap">
                <span class="text-xs">Please Log In</span>
                <p class="font-bold text-sm">MY ACCOUNT</p>
            </div>
        </a>
        <a href="#" class="flex items-center gap-2 ml-10 p-1 ring-2 ring-transparent hover:ring-red-500 transition-all duration-150 ease-in-out">
            <x-fas-cart-shopping class="w-5 h-5" />
            <div class="w-6 h-6 bg-red-600 flex items-center justify-center rounded-full">
                <span class="text-xs font-bold">1</span>
            </div>
        </a>
    </div>
</header>
