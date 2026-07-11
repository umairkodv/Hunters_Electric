@props(['status'])

@php
    $styles = [
        'pending' => 'bg-gray-200/50 text-gray-500',
        'quoted' => 'bg-blue-100 text-blue-700',
        'approved' => 'bg-green-100 text-green-700',
        'rejected' => 'bg-red-100 text-red-700',
    ];

    $labels = [
        'pending' => 'Pending Review',
        'quoted' => 'Quoted',
        'approved' => 'Approved',
        'rejected' => 'Rejected',
    ];

    $style = $styles[$status] ?? 'bg-gray-200/50 text-gray-500';
    $label = $labels[$status] ?? ucfirst($status);
@endphp

<span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md uppercase tracking-widest {{ $style }}">
    {{ $label }}
</span>
