@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="alert text-red-700 bg-red-100 border border-red-200 rounded p-4" role="alert">
            <div class="font-bold text-red-600">
                {{ __('globals.error_title') }}
            </div>

            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
