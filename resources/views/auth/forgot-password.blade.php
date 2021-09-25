<x-guest-layout>
    <div
        class="w-full px-0 pt-5 pb-6 px-6 mx-auto mt-4 mb-0 mt-8 mb-5 space-y-4 bg-transparent border-0 border-gray-200 rounded-lg bg-white border sm:w-10/12 max-w-lg"
    >
        <h1 class="mb-5 text-xl font-bold text-left sm:text-center text-gray-800"> {{ __('Forgotten Password?') }}</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </div>
    <p class="mb-4 space-y-2 text-sm text-center text-gray-600">
        @if (Route::has('login'))
            <a class="w-full btn btn-sm btn-link sm:w-auto" href="{{ route('login') }}">
                {{ __('Back to Login') }}
            </a>
        @endif
    </p>
</x-guest-layout>
