<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 border-b">
                    <h1 class="text-3xl font-bold text-center my-10">{{ __('My Notifications') }}</h1>
                    <div class="divide-y divide-gray-200">
                        @forelse ($notifications as $notification)
                            <div class="p-5 flex lg:justify-between lg:items-center">
                                <div>
                                    <p>Tienes un nuevo candidato en:
                                        <span class="font-bold">{{ $notification->data['vacancy_name'] }}</span>
                                    </p>
                                    <p>Tienes un nuevo candidato en:
                                        <span class="font-bold">{{ $notification->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                                <div class="mt-5 lg:mt-8">
                                    <a href="{{ route('candidates.index', $notification->data['vacancy_id']) }}"
                                        class="p-2 bg-fuchsia-500 text-sm uppercase font-bold text-gray-100 rounded-2xl hover:bg-black">Ver
                                        candidatos</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600">No hay notificaciones nuevas</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
