<div class="bg-indigo-100 dark:bg-gray-200 p-5 mt-10 flex flex-col justify-center items-center rounded-2xl">
    <h3 class="text-center text-2xl font-bold my-4">{{ __('Apply for this vacancy') }}</h3>

    @if (session()->has('message'))
        <p
            class="uppercase border border-green-600 bg-green-100 text-indigo-600 font-bold p-2 my-5 dark:bg-green-700 dark:text-gray-600 dark:border-green-600 rounded-lg text-sm">
            {{ session('message') }}
        </p>
    @else
        <form wire:submit.prevent='apply' class="w-96 mt-5 text-center">
            <div class="mb-4">
                <x-input-label class="font-bold text-sm text-center uppercase text-indigo-600 dark:text-indigo-800 my-3"
                    for="cv" :value="__('Curriculum Vitae')" />(PDF)
                <x-text-input type="file" id="cv" wire:model.live='cv' class="block p-1 mt-1 w-full"
                    accept=".pdf" />
            </div>

            <x-primary-button
                class="mt-4 font-bold bg-indigo-600 hover:bg-yellow-400 hover:text-gray-600 dark:bg-indigo-600 dark:text-gray-400 dark:hover:bg-black dark:hover:text-white dark:active:bg-indigo-500">
                {{ __('Apply') }}
            </x-primary-button>
            <x-input-error :messages="$errors->get('cv')" class="mt-2 bg-slate-300 dark:bg-slate-700" />
        </form>
    @endif
</div>
