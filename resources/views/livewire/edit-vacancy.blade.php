<form class="md:w-1/2 space-y-5" wire:submit='updateVacancy'>
    <div>
        <x-input-label for="title" :value="__('Title Vacancy')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model.live='title' :value="old('title')" />
        <x-input-error :messages="$errors->get('title')" class="mt-2 dark:bg-slate-700" />
    </div>
    <div class="mt-4">
        <x-input-label for="salary" :value="__('Monthly Salary')" />
        <select wire:model.live='salary' id="salary"
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">-- {{ __('Select') }} --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salary')" class="mt-2 dark:bg-slate-700" />
    </div>
    <div class="mt-4">
        <x-input-label for="category" :value="__('Category')" />
        <select wire:model.live='category' id="category"
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">-- {{ __('Select') }} --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category')" class="mt-2 dark:bg-slate-700" />
    </div>
    <div class="mt-4">
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model.live='company' :value="old('company')"
            placeholder="ej. Netflix, Uber, Shopify" />
        <x-input-error :messages="$errors->get('company')" class="mt-2 dark:bg-slate-700" />
    </div>
    <div class="mt-4">
        <x-input-label for="last_day" :value="__('Last Day To Apply')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" wire:model.live="last_day"
            :value="old('last_day')" />
        <x-input-error :messages="$errors->get('last_day')" class="mt-2 dark:bg-slate-700" />
    </div>
    <div class="mt-4">
        <x-input-label for="description" :value="__('Job Description')" />
        <textarea wire:model.live="description" placeholder="{{ __('General job description, experience') }}"
            class="block mt-1 h-72 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2 dark:bg-slate-700" />
    </div>
    <div class="mt-4">
        <x-input-label class="uppercase" for="image" :value="__('Choose Image')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" wire:model.live="new_image" accept="image/*" />

        <div class="my-5 w-80">
            <x-input-label class="uppercase" for="image" :value="__('Current Image')" />
            <img src="{{ asset('storage/vacancies/' . $image) }}" alt="{{ $title }}">
        </div>

        <div class="my-5 w-80">
            @if ($new_image)
                {{ __('Image') }}
                <img src="{{ $new_image->temporaryUrl() }}" alt="{{ $title }}" class="w-80">
            @endif
        </div>

        <x-input-error :messages="$errors->get('new_image')" class="mt-2 dark:bg-slate-700" />
    </div>

    <x-primary-button
        class="mt-4 font-bold bg-indigo-600 hover:bg-yellow-400 hover:text-gray-600 dark:bg-indigo-600 dark:text-gray-400 dark:hover:bg-black dark:hover:text-white dark:active:bg-indigo-500">
        {{ __('Save') }}
    </x-primary-button>
</form>
