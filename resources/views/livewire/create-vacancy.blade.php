<form action="md:w-1/2">
    <div>
        <x-input-label for="title" :value="__('Title Vacancy')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" />
        <x-input-error :messages="$errors->get('title')" class="mt-2 dark:bg-slate-700" />
    </div>
    <div class="mt-4">
        <x-input-label for="salary" :value="__('Monthly Salary')" />
        <select name="salary" id="salary"
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">-- {{ __('Select a role') }} --</option>
            <option value="1"> {{ __('Developer - get a job') }} </option>
            <option value="2"> {{ __('Recruiter - publish a job') }} </option>
        </select>
    </div>
    <div class="mt-4">
        <x-input-label for="category" :value="__('Category')" />
        <select name="category" id="category"
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">-- {{ __('Select a role') }} --</option>
            <option value="1"> {{ __('Developer - get a job') }} </option>
            <option value="2"> {{ __('Recruiter - publish a job') }} </option>
        </select>
    </div>
    <div class="mt-4">
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')"
            placeholder="ej. Netflix, Uber, Shopify" />
        <x-input-error :messages="$errors->get('company')" class="mt-2 dark:bg-slate-700" />
    </div>
    <div class="mt-4">
        <x-input-label for="last_day" :value="__('Last Day To Apply')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" name="last_day" :value="old('last_day')" />
        <x-input-error :messages="$errors->get('company')" class="mt-2 dark:bg-slate-700" />
    </div>
    <div class="mt-4">
        <x-input-label for="description" :value="__('Job Description')" />
        <textarea name="description" placeholder="{{ __('General job description, experience') }}"
            class="block mt-1 h-72 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>
    </div>
    <div class="mt-4">
        <x-input-label for="image" :value="__('Image')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
        <x-input-error :messages="$errors->get('email')" class="mt-2 dark:bg-slate-700" />
    </div>

    <x-primary-button
        class="mt-4 w-full justify-center font-bold bg-indigo-600 hover:bg-yellow-400 hover:text-gray-600 dark:bg-indigo-600 dark:text-gray-400 dark:hover:bg-black dark:hover:text-white dark:active:bg-indigo-500">
        {{ __('Vacancies Creation') }}
    </x-primary-button>
</form>
