<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacancy->title }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-fuchsia-100 p-4 my-10 rounded-2xl">
            <p class="font-bold text-sm uppercase text-indigo-600 my-3 dark:text-indigo-800">{{ __('Company') }}: <span
                    class="text-gray-800 normal-case font-normal">{{ $vacancy->company }}</span></p>
            <p class="font-bold text-sm uppercase text-indigo-600 my-3 dark:text-indigo-800">{{ __('Last Day To Apply') }}: <span
                    class="text-gray-800 normal-case font-normal">{{ $vacancy->last_day->toFormattedDateString() }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-indigo-600 my-3 dark:text-indigo-800">{{ __('Category') }}: <span
                    class="text-gray-800 normal-case font-normal">{{ $vacancy->category->category }}</span></p>
            <p class="font-bold text-sm uppercase text-indigo-600 my-3 dark:text-indigo-800">{{ __('Monthly Salary') }}: <span
                    class="text-gray-800 normal-case font-normal">{{ $vacancy->salary->salary }}</span></p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-6">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacancies/' . $vacancy->image) }}" alt="{{ $vacancy->title }}">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5 dark:text-indigo-600">Descripción del Puesto</h2>
            <p class="text-xl font-mono text-fuchsia-500 dark:text-gray-200">{{ $vacancy->description }}</p>
        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center rounded-xl dark:bg-slate-600">
            <p class="text-sm font-mono text-gray-700 dark:text-gray-300">
                {{ __('Would you like to apply for this vacancy?') }} <a
                    class="font-bold text-indigo-600 dark:text-indigo-400"
                    href="{{ route('register') }}">{{ __('Get an account and apply for this and other vacancies.') }}</a>
            </p>
        </div>
    @endguest

    @cannot('create', App\Models\Vacancy::class)
        @livewire('apply-vacancy')
    @endcannot()
    

</div>
