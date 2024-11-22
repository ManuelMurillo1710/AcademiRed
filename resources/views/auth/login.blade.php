<x-guest-layout>
    <!-- Contenedor principal -->
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-indigo-600 to-purple-500">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg overflow-hidden p-6">
            <!-- Título -->
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">{{ __('Welcome Back') }}</h2>
            <p class="text-sm text-center text-gray-600 mb-6">{{ __('Log in to access your account') }}</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Formulario -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Email') }}</label>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           autocomplete="username"
                           class="block w-full px-4 py-2 border rounded-md shadow-sm border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('email')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Password') }}</label>
                    <input id="password" 
                           type="password" 
                           name="password" 
                           required 
                           autocomplete="current-password"
                           class="block w-full px-4 py-2 border rounded-md shadow-sm border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('password')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="flex items-center text-sm text-gray-600">
                        <input id="remember_me" 
                               type="checkbox" 
                               name="remember" 
                               class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <span class="ml-2">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Botón de Inicio de Sesión -->
                <div>
                    <button type="submit" 
                            class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>

            <!-- Registro -->
            <p class="mt-6 text-sm text-center text-gray-600">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                    {{ __('Sign up') }}
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
