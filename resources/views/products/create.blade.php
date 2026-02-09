<x-app-layout>
<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="mt-10   max-w-lg mx-auto bg-white p-6 rounded-lg shadow space-y-5">
    @csrf

    <div class="space-y-1">
        <label class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-md border-gray-300 focus:border-gray-900 focus:ring-gray-900">
        @error('name') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="space-y-1">
        <label class="block text-sm font-medium text-gray-700">Price</label>
        <input type="number" name="price" step="0.01" value="{{ old('price') }}" class="w-full rounded-md border-gray-300 focus:border-gray-900 focus:ring-gray-900">
        @error('price') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="space-y-1">
        <label class="block text-sm font-medium text-gray-700">Category</label>
        <select name="category_id" class="rounded-md border-gray-300 focus:border-gray-900">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="space-y-1">
        <label class="block text-sm font-medium text-gray-700">Thumbnail</label>
        <input type="file" name="thumbnail" class="block w-full text-sm text-gray-600 file:mr-4 file:rounded-md file:border-0 file:bg-gray-900 file:px-4 file:py-2 file:text-white hover:file:bg-gray-800">
        @error('thumbnail') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    
    
    <button type="submit" class="w-full rounded-md bg-gray-900 px-4 py-2 text-white text-sm font-medium hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900">
        Create
    </button>
</form>
</x-app-layout>