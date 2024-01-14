<x-guest-layout>
    <div class="mb-4 text-sm text-black dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label class="text-indigo-500 font-bold" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="flex items-center justify-center mt-4">
            <x-primary-button
                class="w-full bg-indigo-600 hover:bg-yellow-500 hover:text-gray-600 dark:bg-indigo-700 dark:hover:bg-black dark:hover:text-gray-200">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
        <div class="flex justify-between mt-4 my-4 gap-2">
            <x-link :link="route('register')" class="text-gray-500 hover:text-indigo-700 font-bold dark:hover:text-indigo-600">
                {{ __('Register') }}
            </x-link>
            <x-link :link="route('login')" class="text-gray-500 hover:text-indigo-700 font-bold dark:hover:text-indigo-600">
                {{ __('Log in') }}
            </x-link>
        </div>

    </form>
</x-guest-layout>
