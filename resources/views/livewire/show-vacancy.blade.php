<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacancy->title }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-fuchsia-100 p-4 my-10">
            <p class="font-bold text-sm uppercase text-indigo-600 my-3">{{ __('Company') }}: <span
                    class="text-gray-800 normal-case font-normal">{{ $vacancy->company }}</span></p>
            <p class="font-bold text-sm uppercase text-indigo-600 my-3">{{ __('Last Day To Apply') }}: <span
                    class="text-gray-800 normal-case font-normal">{{ $vacancy->last_day->toFormattedDateString() }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-indigo-600 my-3">{{ __('Category') }}: <span
                    class="text-gray-800 normal-case font-normal">{{ $vacancy->category->category }}</span></p>
            <p class="font-bold text-sm uppercase text-indigo-600 my-3">{{ __('Monthly Salary') }}: <span
                    class="text-gray-800 normal-case font-normal">{{ $vacancy->salary->salary }}</span></p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-6">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacancies/' . $vacancy->image) }}" alt="{{ $vacancy->title }}">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción del Puesto</h2>
            <p>{{ $vacancy->description }}</p>
        </div>
    </div>

</div>
