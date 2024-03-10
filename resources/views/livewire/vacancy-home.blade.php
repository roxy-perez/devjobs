<div>
    @livewire('vacancies-filter')
    <div class="py-12">
        <div class="max-w-7xl mx-auto py-8">
            <h3 class="font-extrabold text-4xl text-fuchsia-700 mb-12">
                {{ __('Our Latest Vacancies') }}
            </h3>
            <div class="bg-gray-200 shadow-sm rounded-lg p-6 divide-y divide-slate-300 dark:bg-slate-800">
                @forelse ($vacancies as $vacancy)
                    <div class="h-full md:flex md:flex-row items-start md:items-center justify-between gap-4 dark:bg-slate-800 dark:text-gray-100">
                        <div class="px-2 my-2">
                            <a class="text-3xl font-extrabold text-gray-600 dark:text-gray-300 hover:text-fuchsia-600 dark:hover:text-fuchsia-600 transition-colors"
                                href="{{ route('vacancy.show', $vacancy->id) }}">{{ $vacancy->title }}</a>
                            <p class="text-base text-black mb-3 dark:text-gray-400">{{ $vacancy->company }}</p>
                            <p class="text-sm text-gray-600 mb-3 dark:text-gray-300">{{ $vacancy->salary->salary }}</p>
                            <p class="font-bold text-base capitalized text-indigo-500 my-3 dark:text-indigo-400 dark:hover:text-indigo-400">
                                {{ $vacancy->category->category }}
                            </p>
                            <p class="text-sm text-gray-600 mb-3 dark:text-gray-400">
                                {{ __('Last Day To Apply') }}: <span
                                    class="normal-case font-bold text-fuchsia-600 dark:text-indigo-300">
                                    {{ $vacancy->last_day->toFormattedDateString() }}</span>
                            </p>
                        </div>

                        <div class="pr-2 pb-4">
                            <a class="bg-indigo-500 uppercase py-2 px-4 me-2 rounded-full block font-bold text-center text-white text-sm hover:bg-black hover:text-white dark:text-slate-200 transition-colors w-full md:w-auto"
                                href="{{ route('vacancy.show', $vacancy->id) }}">{{ __('Show vacancy') }}</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-lg text-black dark:text-indigo-400">{{ __('No vacancies to show.') }}</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
