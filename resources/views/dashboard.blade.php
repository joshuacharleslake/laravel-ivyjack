<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-full">
        <div class="bg-white p-6 overflow-hidden border border-gray-200 sm:rounded-lg">
           <p class="text-gray-600">{{ __('Welcome to IvyJack Company & Employee Management Application.') }}</p>
        </div>
    </div>
</x-app-layout>
