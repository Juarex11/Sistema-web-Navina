<x-guest-layout>


    <div class="grid grid-cols-1 md:grid-cols-2 max-w-5xl mx-auto">
        <div class="p-1 flex items-center justify-center">
            <img src="{{ asset('images/Navina_logo_shadow.webp') }}" alt="Register Image" class=" h-auto object-contain">
        </div>

        <div>
            <h1 class="text-2xl font-bold text-center">Registrate</h1>
            <p class="text-center text-gray-500 mb-1">Crea una cuenta para acceder a todas las funciones</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nombre')" />

                    <x-text-input id="name" 
                                  class="block mt-1 w-full" 
                                  type="text" 
                                  name="name"
                                  placeholder="Ingrese su nombre"
                                  :value="old('name')" 
                                  required autofocus autocomplete="name" />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input id="email" 
                                  class="block mt-1 w-full" 
                                  type="email" 
                                  name="email"
                                  placeholder="Ingrese su correo electrónico" 
                                  :value="old('email')" 
                                  required autocomplete="username" />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    placeholder="Ingrese su contraseña"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4 mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    placeholder="Confirme su contraseña"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>


                
                <div>
                    <x-primary-button class="ms-1 w-full h-11 flex items-center justify-center">
                        {{ __('Registrarse') }}
                    </x-primary-button>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('¿Ya tienes una cuenta?') }}
                    </a>
                </div>


            </form>
        </div>
    </div>

</x-guest-layout>