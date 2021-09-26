<div x-data="{showDeleteModal:false}"
     x-bind:class="{ 'model-open': showDeleteModal }"
     class="inline-flex">
    <button @click={showDeleteModal=true}
            type="button"
            class="bg-red-500 text-gray-200 rounded hover:bg-red-400 px-3 py-1 focus:outline-none text-center">
        {{ __('globals.delete') }}
    </Button>
    <div x-show="showDeleteModal" tabindex="0"
         class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed flex items-center">
        <div @click.away="showDeleteModal = false" class="z-50 relative p-3 mx-auto my-0 max-w-full"
             style="width: 500px;">
            <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden px-10 py-10">
                <div class="text-center text-red-400">
                    <i class="far fa-trash-alt"></i>
                </div>
                <div class="text-center py-2 text-lg md:text-2xl text-gray-700 whitespace-normal">{{ __('globals.confirm_delete', ['name' => $model->name]) }}</div>
                {{ $confirmDelete }}
                <div class="flex flex-col-reverse md:justify-between md:flex-row w-full">
                    <div class="inline-flex w-full mt-2 md:mt-0">
                        <button @click={showDeleteModal=false}
                                class="w-full bg-gray-300 text-gray-900 rounded hover:bg-gray-200 px-6 py-2 focus:outline-none mx-1">
                            {{ __('globals.cancel') }}
                        </button>
                    </div>
                    {{ $slot }}
                </div>
            </div>
        </div>
        <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
    </div>
</div>
