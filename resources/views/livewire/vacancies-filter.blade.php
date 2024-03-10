<div class="bg-gray-100 py-10 dark:bg-slate-800 dark:text-gray-300">

    <h2 class="text-2xl md:text-4xl text-gray-600 text-center capitalize font-extrabold my-5">
        {{ __('Search and filter vacancies') }}</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent='readData'>
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold dark:text-gray-400" for="termino">Término de
                        Búsqueda
                    </label>
                    <input id="termino" type="text" placeholder="Buscar por Término: ej. Laravel, Shopify..."
                        class="text-lg rounded-lg shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full dark:border-indigo-300 dark:text-gray-700"
                        wire:model='term' />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold dark:text-gray-400">{{ __('Category') }}</label>
                    <select wire:model='category' class="border-gray-300 text-gray-600 p-2 w-full rounded-lg">
                        <option>-- {{ __('Select') }} --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label
                        class="block mb-1 text-sm text-gray-700 uppercase font-bold dark:text-gray-400">{{ __('Monthly Salary') }}</label>
                    <select wire:model='salary' class="border-gray-300 text-gray-600 p-2 w-full rounded-lg dark:border-indigo-300">
                        <option>-- {{ __('Select') }} --</option>
                        @foreach ($salaries as $salary)
                            <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <input type="submit"
                    class="bg-indigo-500 hover:bg-fuchsia-500 transition-colors text-white text-sm font-bold px-10 py-2 rounded-full cursor-pointer uppercase w-full md:w-auto"
                    value="{{ __('Search') }}" />
            </div>
        </form>
    </div>
</div>
