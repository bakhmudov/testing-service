<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Учебные материалы') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-4">
                        <a href="{{ route('teacher.materials.create') }}"
                           class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Добавить учебные материалы') }}</a>
                    </div>
                    <table class="table-auto w-full bg-gray-800">
                        <thead>
                        <tr>
                            <th class="px-4 py-2 text-left bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">{{ __('Название') }}</th>
                            <th class="px-4 py-2 text-left bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">{{ __('Содержание') }}</th>
                            <th class="px-4 py-2 text-center bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">{{ __('Тема') }}</th>
                            <th class="px-4 py-2 text-center bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300"
                                width="280px">{{ __('Действие') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($materials as $material)
                            <tr class="bg-gray-700 border-b border-gray-600">
                                <td class="px-4 py-2 text-left">{{ $material->title }}</td>
                                <td class="px-4 py-2 text-left">{{ Str::limit($material->content, 100) }}</td>
                                <td class="px-4 py-2 text-center">{{ $material->topic->name }}</td>
                                <td class="px-4 py-2 text-center">
                                    <a class="bg-green-200 hover:bg-green-700 text-white font-bold py-1 px-3 rounded-lg"
                                       href="{{ route('teacher.materials.edit', $material->id) }}">{{ __('Изменить') }}</a>
                                    <form action="{{ route('teacher.materials.destroy', $material->id) }}" method="POST"
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
</x-app-layout>
