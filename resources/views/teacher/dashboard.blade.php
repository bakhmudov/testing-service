<!-- resources/views/teacher.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teacher Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as a teacher!") }}
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a class="bg-blue-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded-lg"
                       href="{{ route('teacher.materials.index') }}">{{ __('Учебные материалы') }}</a>
                    <a class="bg-blue-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded-lg"
                       href="{{ route('teacher.tests.index') }}">{{ __('Тесты') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
