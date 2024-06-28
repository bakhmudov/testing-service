<!-- resources/views/teacher/tests/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Создать тест') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('teacher.tests.store') }}">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Название теста')" />
                            <x-text-input id="title" class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-300" type="text" name="title" :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Описание')" />
                            <textarea id="description" class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-300" name="description">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="total_time" :value="__('Время на прохождение (в минутах)')" />
                            <x-text-input id="total_time" class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-300" type="number" name="total_time" :value="old('total_time')" required />
                            <x-input-error :messages="$errors->get('total_time')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="topic_id" :value="__('Тема')" />
                            <select id="topic_id" class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-300" name="topic_id" required>
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('topic_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Создать') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
