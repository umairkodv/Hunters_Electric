@props(['url' => null, 'alt' => ''])

@if ($url)
    <img src="{{ $url }}" alt="{{ $alt }}" {{ $attributes }}>
@else
    {{-- Inline SVG placeholder: rendered directly in the page, so it can
         never 404 or fail to load regardless of asset path / server config.
         Wrapped in a <span> (not a bare <svg>) so the passed-in sizing,
         background, border, and padding classes behave exactly like they
         would on a normal element — SVG elements handle CSS padding and
         object-fit inconsistently across browsers, which is what caused
         the earlier broken-looking render. --}}
    <span {{ $attributes->merge(['class' => 'inline-flex items-center justify-center']) }}>
        <svg class="w-2/3 h-2/3" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="{{ $alt ?: 'No image available' }}">
            <rect x="3" y="3" width="18" height="18" rx="2" />
            <circle cx="9" cy="9" r="2" />
            <path d="M21 15l-5-5L5 21" />
        </svg>
    </span>
@endif
