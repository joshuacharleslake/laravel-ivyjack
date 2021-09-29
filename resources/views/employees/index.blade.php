<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('employee.employees') }}
        </h2>
    </x-slot>
    <div class="max-w-full">
        <x-validation-errors class="mb-4" :errors="$errors" />
        <x-success-message class="mb-4" />
        <div class="bg-white p-6 overflow-hidden border border-gray-200 sm:rounded-lg">
            <div class="flex flex-col-reverse md:justify-between md:flex-row">
                <form action="{{ route('employees.index') }}" method="GET" role="search">
                    @method('GET')
                    @csrf
                    <!-- Search -->
                    <div>
                        <x-label for="search" :value="__('Search')" class="font-bold" />
                        <div class="relative">
                            <x-input id="name"
                                     class="block mt-1 w-full pr-8"
                                     type="text"
                                     name="search"
                                     autofocus />
                            <button class="absolute top-2.5 right-2.5 ml-3 hover:text-primary">
                                <i class="fas fa-search"></i>
                                <span class="sr-only">{{ __('globals.search') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="pt-3 mb-3">
                    <x-link-button href="{{ route('employees.create') }}" class="bg-green-400 text-white">
                        {{ __('employee.add') }}
                    </x-link-button>
                </div>
            </div>


            <div class="flex flex-col mt-8">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border border-gray-200 sm:rounded-md">
                        <table class="min-w-full">
                            <thead class="bg-gray-900">
                            <tr>
                                <th
                                    class="px-6 py-3 text-sm font-bold leading-4 tracking-wider text-left text-white border-b border-gray-200">
                                    {{ __('globals.id') }}
                                </th>
                                <th
                                    class="px-6 py-3 text-sm font-bold leading-4 tracking-wider text-left text-white border-b border-gray-200">
                                    {{ __('globals.name') }}
                                </th>
                                <th
                                    class="px-6 py-3 text-sm font-bold leading-4 tracking-wider text-left text-white border-b border-gray-200">
                                    {{ __('globals.email') }}
                                </th>
                                <th
                                    class="px-6 py-3 text-sm font-bold leading-4 tracking-wider text-left text-white border-b border-gray-200">
                                    {{ __('globals.telephone') }}
                                </th>
                                <th
                                    class="px-6 py-3 text-sm font-bold leading-4 tracking-wider text-left text-white border-b border-gray-200">
                                    <span class="sr-only">{{ __('globals.actions') }}</span></th>
                            </tr>
                            </thead>

                            <tbody class="bg-white">
                            @if($employees->count() > 0)
                                @foreach($employees as $key => $employee)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-primary"> {{ $employee->id }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500"> {{ $employee->first_name . ' ' . $employee->last_name  }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500"> {{ $employee->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500"> {{ $employee->telephone }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('employees.edit', ['employee' => $employee ]) }}"
                                               class="bg-blue-200 text-gray-900 rounded hover:bg-blue-100 px-3 py-1 focus:outline-none mx-1 text-center">
                                                {{ __('globals.edit') }}
                                            </a>

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

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr col-span="5">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500"> {{ __('globals.no_results_found') }}</div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $employees->links() }}
        </div>
    </div>

</x-app-layout>
