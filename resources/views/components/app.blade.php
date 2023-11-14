<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name') }}</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div id="app">
            <!-- HEADER HERE TODO -->
            <div class="grid-container mt-[5em] mb-[5em]">
                <!-- COLUMN GRID FOR CONTENT -->
                <div class="grid grid-cols-6 gap-4">
                    <div></div>
                    <div class="col-span-4 p-3 bg-gray-100 min-h-screen">
                        {{ $slot }}
                    </div>
                    <div></div>
                </div>
            </div>
            <!-- FOOTER HERE TODO -->
        </div>
        @vite('resources/js/app.js')
    </body>
</html>