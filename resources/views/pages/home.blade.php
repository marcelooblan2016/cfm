<x-app>
    <div class="text-center">
        @if (auth()->check() === true)
            <a href="{{ route('deliveries.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Go To Deliveries
            </a>
        @else
            <button-google-drive action-url="{{ route('auth.google.login') }}" />
        @endif
    </div>
</x-app>