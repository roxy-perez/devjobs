<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vacancies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
                <div class="uppercase font-bold bg-green-500 text-white p-4 rounded-lg mb-6 text-center border-2 border-indigo-500">
                    {{ session('message') }}
                </div>
            @endif
            @livewire('show-vacancies')
        </div>
    </div>
</x-app-layout>
