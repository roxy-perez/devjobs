<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-yellow-600 border-yellow-400 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-indigo-600 dark:text-indigo-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex justify-between mt-4 gap-2">
            <x-primary-button
                class="h-10 w-1/2 ms-3 text-black  bg-yellow-500 hover:bg-indigo-600 hover:text-white dark:bg-indigo-600 dark:text-white dark:hover:bg-yellow-600">
                <x-link :link="route('register')">
                    {{ __('Register') }}
                </x-link>
            </x-primary-button>

            <x-primary-button
                class="h-10 w-full ms-2 font-bold bg-indigo-600 hover:bg-yellow-500 hover:text-black dark:bg-indigo-600 dark:text-white dark:hover:bg-yellow-600">
                {{ __('Log in') }}
            </x-primary-button>

            <x-link :link="route('password.request')" class="h-10 w-1/2  ms-3 hover:text-indigo-700 font-bold">
                {{ __('Forgot your password?') }}
            </x-link>
        </div>
    </form>
</x-guest-layout>
