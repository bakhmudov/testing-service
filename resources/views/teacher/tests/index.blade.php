<!-- resources/views/teacher/tests/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Тесты') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-4">
                        <h3 class="text-lg font-semibold">{{ __('Список тестов') }}</h3>
                        <a href="{{ route('teacher.tests.create') }}"
                           class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Добавить новый тест') }}</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800">
                            <thead>
                            <tr>
                                <th class="px-4 py-2 text-left bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">{{ __('Название теста') }}</th>
                                <th class="px-4 py-2 text-left bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">{{ __('Описание') }}</th>
                                <th class="px-4 py-2 text-center bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">{{ __('Время на прохождение') }}</th>
                                <th class="px-4 py-2 text-center bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300"
                                    width="280px">{{ __('Изменить/Удалить') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tests as $test)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-2 text-left">{{ $test->title }}</td>
                                    <td class="px-4 py-2 text-left">{{ $test->description }}</td>
                                    <td class="px-4 py-2 text-center">{{ $test->total_time }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <a class="bg-green-200 hover:bg-green-700 text-white font-bold py-1 px-3 rounded-lg"
                                           href="{{ route('teacher.tests.edit', $test->id) }}">{{ __('Изменить') }}</a>
                                        <form action="{{ route('teacher.tests.destroy', $test->id) }}" method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">{{ __('Удалить') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
