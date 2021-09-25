<x-guest-layout>
    <div
        class="w-full px-0 pt-5 pb-6 px-6 mx-auto mt-4 mb-0 mt-8 mb-5 space-y-4 bg-transparent border-0 border-gray-200 rounded-lg bg-white border sm:w-10/12 max-w-lg"
    >
        <h1 class="mb-5 text-xl font-light text-left sm:text-center text-gray-800"> {{ __('Confirm Password') }}</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>
