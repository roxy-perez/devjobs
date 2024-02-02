<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacancies as $vacancy)
        <div
            class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 md:flex md:justify-between md:items-center">
            <div class="leading-5 font-semibold text-gray-900 dark:text-gray-100">
                <a href="#" class="text-xl font-bold">{{ $vacancy->title }}</a>
                <p class="text-sm text-gray-600 font-bold dark:text-gray-100">{{ $vacancy->company }}</p>
                <p class="text-sm text-gray-500 font-light dark:text-gray-200">{{ __('Last Day To Apply') }}
                    {{ $vacancy->last_day->format('d/m/Y') }}</p>
            </div>
            <div class="flex flex-col items-stretch gap-3 mt-5 md:flex-row md:mt-0">
                <a href="#"
                    class="bg-black uppercase py-2 px-4 rounded-full  text-center text-white text-xs font-bold dark:text-slate-400">
                    {{ __('Candidates') }}
                </a>
                <a href="#"
                    class="bg-indigo-500 uppercase py-2 px-4 rounded-full text-center text-white text-xs font-bold dark:text-slate-400">
                    {{ __('Edit') }}
                </a>
                <a href="#"
                    class="bg-red-500 uppercase py-2 px-4 rounded-full text-center text-white text-xs font-bold dark:text-slate-400">
                    {{ __('Delete') }}
                </a>
            </div>
        </div>
    @empty
        <p class="p-3 text-center text-sm text-gray-600">{{ __('No vacancies to show.') }}</p>
    @endforelse

    <div class="p-3 flex justify-center ">
        {{ $vacancies->links() }}
    </div>
</div>


