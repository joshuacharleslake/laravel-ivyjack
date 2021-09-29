@props(['errors'])

@if (session('message'))
    <div {{ $attributes }}>
        <div class="alert text-red-700 bg-green-100 border border-green-200 rounded p-4" role="alert">
            <div class="font-bold text-green-600">
                {{ __('globals.success') }}
            </div>

            <ul class="mt-3 list-disc list-inside text-sm text-green-600">
                <li>{{ session('message') }}</li>
            </ul>
        </div>
    </div>
@endif
