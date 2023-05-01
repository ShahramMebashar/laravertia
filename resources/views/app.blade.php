<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/scripts/app.ts', "resources/views/pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased h-full bg-gray-50 dark:bg-gray-900">
        <script>
            var theme = localStorage.getItem('vueuse-color-scheme') || 'auto';
            if(theme === 'dark') {
                document.documentElement.classList.add('dark');
            }
        </script>
        @inertia
    </body>
</html>
