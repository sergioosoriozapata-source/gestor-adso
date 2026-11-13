<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestor ADSO')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-8">
                    <span class="font-bold text-xl text-indigo-600">Gestor ADSO</span>
                    @auth
                        <a href="{{ route('aprendices.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition">Aprendices</a>
                    @endauth
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-sm text-gray-600">Hola, <strong class="text-gray-800">{{ auth()->user()->name }}</strong></span>

                        @if (Route::has('profile.edit'))
                            <a href="{{ route('profile.edit') }}" class="text-sm text-gray-600 hover:text-indigo-600 transition">Perfil</a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-red-600 hover:text-red-800 font-medium transition">Salir</button>
                        </form>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-indigo-600 transition">Iniciar sesión</a>
                        <a href="{{ route('register') }}" class="text-sm font-medium bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">Registrarse</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        @if (session('ok'))
            <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-4 rounded-r-lg shadow-sm">
                <p class="text-sm text-green-700">{{ session('ok') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-4 rounded-r-lg shadow-sm">
                <p class="text-sm text-red-700">{{ session('error') }}</p>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @isset($header)
            <header class="mb-6">{{ $header }}</header>
        @endisset

        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset
    </main>
</body>
</html>
