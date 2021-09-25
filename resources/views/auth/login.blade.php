<x-guest-layout>
    <div
        class="w-full px-0 pt-5 pb-6 px-6 mx-auto mt-4 mb-0 mt-8 mb-5 space-y-4 bg-transparent border-0 border-gray-200 rounded-lg bg-white border sm:w-10/12 max-w-lg"
    >
        <h1 class="mb-5 text-xl font-bold text-left sm:text-center text-gray-800">Log in to your account</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-10" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Log In') }}
                </x-button>
            </div>
        </form>
    </div>
    <p class="mb-4 space-y-2 text-sm text-center text-gray-600">
        @if (Route::has('password.request'))
            <a class="w-full btn btn-sm btn-link sm:w-auto" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif
    </p>
</x-guest-layout>
