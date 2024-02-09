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
            <div class="flex flex-col gap-4 mt-5 md:flex-row md:mt-0">
                <a href="#"
                    class="bg-black uppercase py-2 px-4 rounded-full text-center text-white text-xs font-bold dark:text-slate-400">
                    {{ __('Candidates') }}
                </a>
                <a href="{{ route('vacancy.edit', $vacancy->id) }}"
                    class="bg-indigo-500 uppercase py-2 px-4 rounded-full text-center text-white text-xs font-bold dark:text-slate-400">
                    {{ __('Edit') }}
                </a>
                <button wire:click="$dispatch('showAlert', {{ $vacancy->id }})" type="button"
                    class="bg-red-500 uppercase py-2 px-4 rounded-full text-center text-white text-xs font-bold dark:text-slate-400">
                    {{ __('Delete') }}
                </button>
            </div>
        </div>
    @empty
        <p class="p-3 text-center text-sm text-gray-600">{{ __('No vacancies to show.') }}</p>
    @endforelse

    <div class="p-3 flex justify-center">
        {{ $vacancies->links() }}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @this.on('showAlert', vacancyId => {
                Swal.fire({
                    title: "{{ __('Delete Vacancy') }}",
                    text: "{{ __('A deleted vacancy cannot be restored.') }}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "{{ __('Cancel') }}",
                    confirmButtonText: "{{ __('Yes') }}"
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('deleteVacancy', vacancyId);
                        Swal.fire({
                            title: "{{ __('actions.done') }}",
                            text: "{{ __('The vacancy has been deleted.') }}",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>
@endpush
