{{-- resources/views/components/products/gallery.blade.php --}}
<div class="space-y-4">

    <div class="aspect-square overflow-hidden rounded-2xl bg-gray-100 border">
        <img
            src="{{ asset('storage/products/placeholder.jpg') }}"
            alt="{{ $product->name }}"
            class="h-full w-full object-cover"
        >
    </div>

    {{-- Placeholder for future thumbnails --}}
    <div class="grid grid-cols-4 gap-3 opacity-60">
        @for ($i = 0; $i < 4; $i++)
            <div class="aspect-square rounded-lg bg-gray-100 border"></div>
        @endfor
    </div>

</div>
