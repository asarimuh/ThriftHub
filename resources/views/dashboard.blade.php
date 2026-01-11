<x-app-layout>
@if(auth()->user()->isBuyer())
    <form method="POST" action="{{ route('seller.upgrade') }}">
        @csrf

        <button
            type="submit"
            class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 transition">
            Mulai jual barang
        </button>
    </form>
@endif

</x-app-layout>
