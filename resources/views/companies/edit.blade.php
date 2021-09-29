<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if($company->exists)
                {{ __('company.edit') }}
            @else
                {{ __('company.add') }}
            @endif
        </h2>
    </x-slot>
    <div class="max-w-full">

        <x-validation-errors class="mb-4" :errors="$errors" />

        <x-success-message class="mb-4" />

        <div class="bg-white p-6 overflow-hidden border border-gray-200 sm:rounded-lg">

            <form method="POST"
                  action="{{ $company->exists ? route('companies.update', ['company' => $company]) : route('companies.store') }}"
                  enctype="multipart/form-data"
            >

            @if($company->exists)
                @method('PUT')
            @endif

            @csrf

            <!-- Name -->
                <div>
                    <x-label for="name" :value="__('globals.name')" class="inline-block" />

                    <span class="inline text-red-600">*</span>

                    <x-input id="name"
                             class="block mt-1 w-full"
                             type="text"
                             name="name"
                             value="{{ old('name') ?? $company->name }}"
                             required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('globals.email')" />

                    <x-input id="email"
                             class="block mt-1 w-full"
                             type="text"
                             name="email"
                             value="{{ old('email') ?? $company->email }}"/>
                </div>

                <!-- Website Address -->
                <div class="mt-4">
                    <x-label for="website" :value="__('globals.website')" />

                    <x-input id="website"
                             class="block mt-1 w-full"
                             type="text"
                             name="website"
                             value="{{ old('email') ?? $company->website }}"/>
                </div>

                <!-- Company Image -->
                <div class="mt-4">
                    <x-label for="image" :value="__('company.company_image')" />

                    @if($company->image)
                        <img class="mt-1 mb-4 w-full md:w-1/3" src="{{ asset('storage/images/company-logos/' . $company->image) }}" />
                    @endif

                    <div class="flex items-center justify-center w-full md:w-1/3 mt-1">
                        <label
                            class="flex flex-col w-full p-2 border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-blue-300">
                            <div class="flex flex-col items-center justify-center pt-7">
                                <i class="fas fa-file-upload text-sm text-gray-400 group-hover:text-primary"></i>
                                <p class="pt-1 text-sm text-gray-400 group-hover:text-gray-600">
                                    {{ __('globals.upload_image') }}
                                </p>
                                <p class="pt-1 text-xs text-gray-400 group-hover:text-gray-600">
                                    {{ __('jpg/jpeg/png') }}
                                </p>
                                <p class="pt-1 text-xs text-gray-400 group-hover:text-gray-600">
                                    {{ __('Min size: 100px x 100px') }}
                                </p>
                                <p class="pt-2 text-xs text-primary font-bold group-hover:text-gray-600 hidden">
                                    <span class="js-image-upload-file-name">{{ __('image/sds.png') }}</span>
                                    <i class="fas fa-check text-green-500 ml-2"></i>
                                </p>
                            </div>
                            <x-input id="image"
                            class="js-image-upload-input opacity-0"
                            type="file"
                            name="image"
                            value="{{ old('image') ?? $company->image }}"/>
                        </label>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        @if($company->exists)
                            {{ __('company.update') }}
                        @else
                            {{ __('company.create') }}
                        @endif
                    </x-button>
                </div>
            </form>

            @if($company->exists)
                <div class="mt-3 flex justify-end">
                    <x-confirm-delete-modal
                        :model="$company"
                    >
                        <x-slot name="confirmDelete">
                            <div class="text-center font-light text-gray-700 mb-8 whitespace-normal">
                                {{ __('company.confirm_delete') }}
                            </div>
                        </x-slot>

                        @if($company->exists)
                            <form method="POST"
                                  action="{{ route('companies.destroy', ['company' => $company]) }}"
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
