<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 border-b">
                    <h1 class="text-3xl font-bold text-center my-10">{{ $vacancy->title }}</h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($vacancy->candidates as $candidate)
                                <li
                                    class="p-3 flex items-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-indigo-700">{{ $candidate->user->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $candidate->user->email }}</p>
                                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Días de
                                            postulación:
                                            <span class="font-normal text-gray-600 dark:text-gray-500"> {{ $candidate->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                    <div>
                                        <a href="{{ asset('storage/cv' . $candidate->cv) }}" target="_blank" rel="noopener noreferrer"
                                            class="inline-flex items-center shadow-sm px-3 py-0.5 border border-5 border-indigo-400 text-sm leading-5 font-mono font-bold rounded-full bg-slate-200 text-black dark:text-gray-200 dark:bg-indigo-400 hover:bg-fuchsia-500 dark:hover:bg-slate-300">Ver CV</a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600">No hay candidatos aún</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
