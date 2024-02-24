<div class="bg-indigo-100 dark:bg-gray-200 p-5 mt-10 flex flex-col justify-center items-center rounded-2xl">
    <h3 class="text-center text-2xl font-bold my-4">{{ __('Apply for this vacancy') }}</h3>

    <form class="w-96 mt-5" action="">
        <div class="mb-4">
            <x-input-label class="font-bold text-sm text-center uppercase text-indigo-600 dark:text-indigo-800 my-3" for="cv" :value="__('Curriculum Vitae')" />
            <x-text-input type="file" id="cv" name="cv" class="block p-1 mt-1 w-full" accept=".pdf"/>
        </div>
    </form>
</div>
