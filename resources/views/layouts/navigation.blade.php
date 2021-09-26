<div class="p-5 flex justify-between border-b border-gray-200 md:hidden">
    <a href="{{ route('dashboard') }}"
       title="{{ env('APP_NAME') }}"
       class="flex items-center justify-center">
        {!! file_get_contents('images/ivyjack-logo.svg') !!}
    </a>
    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out md:hidden ">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            {{-- Menu --}}
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            {{--Close--}}
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
<div
    class="fixed top-0 left-0 z-20 h-full pb-10 overflow-x-hidden overflow-y-auto transition origin-left transform bg-gray-900 w-60 md:-translate-x-0"
    :class="{'-translate-x-0': open, '-translate-x-full': ! open}"
>
    <div class="p-5 flex justify-between">
        <a href="{{ route('dashboard') }}"
           title="{{ env('APP_NAME') }}"
           class="flex items-center justify-center">
            {!! file_get_contents('images/ivyjack-logo-white.svg') !!}
        </a>
    </div>
    <p class="text-sm text-gray-50 mb-4 px-4">{{__('Welcome')}} {{ Auth::user()->name }}</p>
    <nav class="text-sm font-medium text-gray-500" aria-label="Main Navigation">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('companies.index')" :active="request()->routeIs('companies.index')">
            {{ __('Companies') }}
        </x-nav-link>
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('login')">
            {{ __('Employees') }}
        </x-nav-link>
        <form method="POST"
              action="{{ route('logout') }}"
              class="px-4 py-3"
        >
            @csrf
            <button type="submit" class="hover:text-gray-200">
                <i class="fas fa-sign-out-alt mr-2"></i>
                {{ __('Logout') }}
            </button>
        </form>
    </nav>
</div>
