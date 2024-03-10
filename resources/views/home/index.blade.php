<x-app-layout>
    <div class="py-16 bg-gray-50 overflow-hidden lg:py-24 dark:bg-slate-800">
        <div class=" max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
            <div class="relative">
                <h1 class="text-center text-4xl leading-8 font-extrabold tracking-tight text-indigo-600 sm:text-6xl">
                    {{ __('Find a job at Tech remotely') }}</h1>
                <p class="mt-4 max-w-3xl mx-auto text-center text-xl text-gray-500">{{__('Find your dream job in a international company; we have vacancies for: developers, backend, devops, mobile and much more!')}}</p>
            </div>
        </div>
    </div>
    @livewire('vacancy-home')
</x-app-layout>
