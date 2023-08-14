<link href="{{ asset('vendor/ejntaylor/vellum/css/app.css') }}" rel="stylesheet">
<html class="h-full bg-gray-100">
<head>
    @stack('styles')
</head>
<body class="h-full">
<div class="min-h-full">
    <div class="bg-gray-800 pb-32">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="border-b border-gray-700">
                    <div class="flex h-16 items-center justify-between px-4 sm:px-0">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <a href="/vellum"
                                   class="bg-grey-100 text-white font-bold border border-white border-dashed py-2 px-4 rounded-md">Vellum</a>
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-10 flex items-baseline space-x-4">
                                    <a href="/"
                                       class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                    >Your Site</a>
                                    <a href="https://github.com/ejntaylor/vellum"
                                       class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">GitHub</a>
                                </div>
                            </div>
                        </div>

                        <div class="flex">
                            <form method="POST" action="{{ route('vellum.toggle-markdown') }}" class="m-0">
                                @csrf

                                <button type="submit"
                                        class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                    {{ session('markdown', false) ? 'Switch to Blade' : 'Switch to Markdown' }}
                                </button>
                            </form>

                            @if(Route::has(config('vellum.routes.logout')))
                            <form method="POST" action="{{ route(config('vellum.routes.logout')) }}" class="m-0">
                                @csrf

                                <button type="submit"
                                        class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                    Logout
                                </button>
                            </form>
                            @endif

                        </div>

                        <div class="-mr-2 flex md:hidden">
                        </div>
                    </div>
                </div>
            </div>

        </nav>
        <header class="py-10">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold tracking-tight text-white">@stack('title')</h1>

                </div>
                @stack('additional-content')
            </div>
        </header>
    </div>

    <main class="-mt-32">
        <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
            <div class="rounded-lg bg-white px-5 py-6 shadow sm:px-6">
                <div class="relative min-h-96 overflow-hidden rounded p-8">
                    @yield('content')
                </div>

            </div>
        </div>
    </main>
</div>


</body>
</html>
