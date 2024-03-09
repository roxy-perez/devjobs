<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto py-8">
            <h3 class="font-extrabold text-4xl text-fuchsia-700 mb-12">
                {{ __('Our Latest Vacancies') }}
            </h3>
            <div class="bg-gray-200 shadow-sm rounded-lg p-6">
                @forelse ($vacancies as $vacancy)
                    <div class="md:flex md:justify-between md:items-center">
                        <div class="md:flex-1 md:pr-8 px-2">
                            <a class="text-3xl font-extrabold text-gray-600"
                                href="{{ route('vacancy.show', $vacancy->id) }}">{{ $vacancy->title }}</a>
                                <p class="text-base text-gray-600 mb-3">{{ $vacancy->company }}</p>
                                <p class="whitespace-nowrap font-bold text-sm capitalized text-indigo-600 my-3 dark:text-indigo-800">{{ __('Last Day To Apply') }} <span
                                    class="text-gray-800 normal-case font-bold">{{ $vacancy->last_day->toFormattedDateString() }}</span>
                                </p>
                        </div>

                        <div class="md:m-0 pr-2 pb-4">
                            <a class="bg-indigo-500 uppercase py-2 px-4 me-2 w-full rounded-full block font-bold text-center text-white text-sm dark:text-slate-200 hover:bg-fuchsia-600 dark:hover:text-white"
                                href="{{ route('vacancy.show', $vacancy->id) }}">Ver vacante</a>
                        </div>
                    @empty
                        <p class="p-3 text-center text-sm text-gray-700">{{ __('No vacancies to show.') }}</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
