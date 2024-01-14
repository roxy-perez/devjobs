@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1 p-2 font-bold bg-indigo-100 border-l-4 rounded-r-md border-indigo-400 dark:p-2 dark:font-bold dark:bg-yellow-100 dark:border-l-4 dark:rounded-r-md dark:bg-gray-300 dark:border-indigo-400']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
