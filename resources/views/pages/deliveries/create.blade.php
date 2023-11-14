<x-app>
    <x-slot:title>
        Create Delivery
    </x-slot>
    <div>
        <create-delivery 
            :users="{{ json_encode([auth()->user()]) }}"
            csrf-token="{{ csrf_token() }}"
         />
    </div>
</x-app>