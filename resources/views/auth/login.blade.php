<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen w-screen flex justify-center items-center">

    <div class=" grid grid-cols-1 md:grid-cols-2 shadow-xl rounded-xl border border-neutral-200
    lg:w-[65vw]">
    
        <!-- Parte izquierda con imagen -->
        <div class="flex items-center justify-center">
            <!-- Imagen de Navina -->
            <img src="{{ asset('images/Navina_logo.webp') }}" alt="Login Image" 
            class="w-[310px] h-auto object-contain">
        </div>
    
    
        <!-- Parte derecha con formulario de inicio de sesión -->
        <div class="p-6">
            <h1 class="text-2xl font-bold text-center">Inicio de Sesión</h1>
            <p class="text-center text-gray-500 mb-4">Ingrese sus credenciales para acceder</p>
    
            <form method="POST" action="{{ route('login') }}">
                @csrf
    
                <!-- Email Address -->
                <div class="mt-6">
                    <x-input-label for="email" :value="__('Email')" />
    
                    <div class="relative mt-1">
                        <img src="{{ asset('images/person.svg') }}"
                            class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 pointer-events-none">
    
                        <x-text-input id="email" class="block mt-1 w-full pl-10"
                            type="email"
                            name="email" :value="old('email')"
                            required autofocus autocomplete="username"
                            placeholder="Ingrese su correo electrónico" />
    
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
    
                    <div class="relative mt-1">
                        <img src="{{ asset('images/lock.svg') }}" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 pointer-events-none">
    
                        <x-text-input id="password" class="block mt-1 w-full pl-10"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Ingrese su contraseña" />
    
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
    
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                    </label>
                </div>
    
                <div class="flex items-center justify-center mt-4">
                    <x-primary-button class=" bg-pink-400 w-full h-11 flex items-center justify-center">
                        {{ __('Iniciar Sesión') }}
                    </x-primary-button>
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                    @endif
                </div>
    
            </form>
        </div>
    </div>

</body>
</html>

