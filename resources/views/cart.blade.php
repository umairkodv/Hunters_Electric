<x-layout>
    <div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100 select-none antialiased">
        <div class="max-w-4xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <div class="border-b border-gray-200 pb-6 w-full">
                <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                    <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                    <span class="text-accent">Your Cart</span>
                </h1>
                <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">Add one or more parts, then request a quote for everything at once.</p>
            </div>

            @if ($items->isEmpty())
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs px-6 py-12 text-center">
                    <p class="text-sm font-bold text-nav-text">Your cart is empty.</p>
                    <p class="text-xs text-gray-500 font-semibold mt-1">Browse the catalog and add a part to get started.</p>
                    <a href="{{ route('home') }}" class="inline-block mt-4 text-xs font-black uppercase tracking-widest text-accent hover:text-accent-hover transition-colors">
                        &larr; Back to Catalog
                    </a>
                </div>
            @else
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-[#f8fafc] border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Quantity</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Catalog Price</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($items as $item)
                                @php $product = $item['product']; @endphp
                                <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ $product->display_image_url }}" alt="{{ $product->part_number }}" class="h-10 w-10 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1 shrink-0">
                                            <div>
                                                <p class="text-xs font-black uppercase tracking-wider text-nav-text">{{ $product->part_number }}</p>
                                                <p class="text-xs font-semibold text-gray-500 mt-0.5">{{ $product->type_description }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('cart.update', $product) }}" method="POST" class="flex items-center gap-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                                   class="w-16 border border-gray-300 rounded-lg px-2 py-1.5 text-xs font-bold text-nav-text outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                                            <button type="submit" class="text-[10px] font-black uppercase tracking-widest text-accent hover:text-accent-hover transition-colors">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 text-xs font-black text-nav-text text-right">${{ number_format($product->price, 2) }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <form action="{{ route('cart.remove', $product) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-[10px] font-black uppercase tracking-widest text-red-500 hover:text-red-700 transition-colors">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
                    @auth
                        <form action="{{ route('quotations.store') }}" method="POST" class="flex flex-col gap-4">
                            @csrf
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Notes (optional)</label>
                                <textarea name="customer_notes" rows="3" placeholder="Anything we should know about this request?"
                                          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">{{ old('customer_notes') }}</textarea>
                            </div>
                            <button type="submit" class="self-start bg-accent text-white text-xs font-black uppercase tracking-widest px-6 py-3 rounded-lg hover:bg-accent-hover transition-colors">
                                Request a Quote
                            </button>
                        </form>
                    @else
                        <p class="text-xs font-semibold text-gray-500 mb-3">Sign in to request a quote for the items in your cart. Your cart will still be here after you log in.</p>
                        <a href="{{ route('login') }}" class="inline-block bg-accent text-white text-xs font-black uppercase tracking-widest px-6 py-3 rounded-lg hover:bg-accent-hover transition-colors">
                            Sign In to Continue
                        </a>
                    @endauth
                </div>
            @endif

        </div>
    </div>
</x-layout>
