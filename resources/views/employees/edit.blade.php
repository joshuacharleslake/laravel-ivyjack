<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if($employee->exists)
                {{ __('employee.edit') }}
            @else
                {{ __('employee.add') }}
            @endif
        </h2>
    </x-slot>
    <div class="max-w-full">

        <x-validation-errors class="mb-4" :errors="$errors" />

        <x-success-message class="mb-4" />

        <div class="bg-white p-6 overflow-hidden border border-gray-200 sm:rounded-lg">

            <form method="POST"
                  action="{{ $employee->exists ? route('employees.update', ['employee' => $employee]) : route('employees.store') }}"
            >

            @if($employee->exists)
                @method('PUT')
            @endif

            @csrf

                <!-- First Name -->
                <div>
                    <x-label for="first_name" :value="__('globals.first_name')" class="inline-block" />

                    <span class="inline text-red-600">*</span>

                    <x-input id="first_name"
                             class="block mt-1 w-full"
                             type="text"
                             name="first_name"
                             value="{{ old('first_name') ?? $employee->first_name }}"
                             required autofocus />
                </div>

                <!-- Last Name -->
                <div class="mt-4">
                    <x-label for="last_name" :value="__('globals.last_name')" class="inline-block" />

                    <span class="inline text-red-600">*</span>

                    <x-input id="last_name"
                             class="block mt-1 w-full"
                             type="text"
                             name="last_name"
                             value="{{ old('last_name') ?? $employee->last_name }}"
                             required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('globals.email')" />

                    <x-input id="email"
                             class="block mt-1 w-full"
                             type="text"
                             name="email"
                             value="{{ old('email') ?? $employee->email }}"/>
                </div>

                <!-- Website Address -->
                <div class="mt-4">
                    <x-label for="telephone" :value="__('globals.telephone')" />

                    <x-input id="telephone"
                             class="block mt-1 w-full"
                             type="text"
                             name="telephone"
                             value="{{ old('telephone') ?? $employee->telephone }}"/>
                </div>

                <!-- Website Address -->
                <div class="mt-4">
                    <x-label for="company_id" :value="__('employee.company')" class="inline-block" />

                    <span class="inline text-red-600">*</span>

                    <x-select-input id="company_id"
                             class="block mt-1 w-full"
                             name="company_id">
                        <x-slot name="options">
                            <option disabled>{{ __('Please Select...') }}</option>
                            @foreach($companies as $company)
                                <option value="{{ $company['id'] }}"
                                        @if(request()->get('client_id') == $company['id'] || $employee->company_id === $company['id'] )
                                        selected="selected"
                                    @endif>
                                    {{ $company['name'] }}
                                </option>
                            @endforeach
                        </x-slot>
                    </x-select-input>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        @if($employee->exists)
                            {{ __('employee.update') }}
                        @else
                            {{ __('employee.create') }}
                        @endif
                    </x-button>
                </div>
            </form>

            @if($employee->exists)
                <div class="mt-3 flex justify-end">
                    <x-confirm-delete-modal
                        :model="$employee"
                    >
                        <x-slot name="confirmDelete">
                            <div class="text-center font-light text-gray-700 mb-8 whitespace-normal">
                                {{ __('employee.confirm_delete') }}
                            </div>
                        </x-slot>

                        @if($employee->exists)
                            <form method="POST"
                                  action="{{ route('employees.destroy', ['employee' => $employee]) }}"
                                  class="inline-flex w-full"
                            >
                                @method('DELETE')
                                @csrf
                                <button class="w-full bg-red-500 text-gray-200 rounded hover:bg-red-400 px-6 py-2 focus:outline-none mx-1">
                                    {{ __('globals.delete') }}
                                </button>
                            </form>
                        @endif
                    </x-confirm-delete-modal>
                </div>
            @endif

        </div>
    </div>

</x-app-layout>
