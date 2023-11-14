<x-app>
    <x-slot:title>
        Delivery
    </x-slot>
    <div>
        <div class="text-center py-3">
            <a href="{{ route('deliveries.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add New Delivery
            </a>
        </div>

        <hr/>
        <div class="py-3">
            <p class="text-center text-2xl text-red-500">List of delieveries here todo...</p>
        </div>
    </div>
</x-app>