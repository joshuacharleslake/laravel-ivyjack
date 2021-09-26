<x-guest-layout>
    <div
        class="w-full px-0 pt-5 pb-6 px-6 mx-auto mt-4 mb-0 mt-8 mb-5 space-y-4 bg-transparent border-0 border-gray-200 rounded-lg bg-white border sm:w-10/12 max-w-lg"
    >
        <h1 class="mb-5 text-xl font-bold text-left sm:text-center text-gray-800"> {{ __('Verify Email') }}</h1>

        <!-- Session Status -->
        <x-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4" :errors="$errors" />

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-button>
                    {{ __('Resend Verification Email') }}
                </x-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            </div>



        <div class="mt-4 flex items-center justify-between">

        </div>
    </x-auth-card>
</x-guest-layout>
