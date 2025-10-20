<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quizzes') }}
        </h2>
    </x-slot>

    <div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">All Quizzes</h2>
    <a href="{{ route('quizzes.create') }}" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">+ Create Quiz</a>
</div>

<table class="min-w-full bg-gray-800 rounded">
    <thead class="bg-gray-700">
        <tr>
            <th class="px-4 py-2 text-left">Title</th>
            <th class="px-4 py-2 text-left">Questions</th>
            <th class="px-4 py-2 text-left">Max Skips</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($quizzes as $quiz)
            <tr class="border-b border-gray-700">
                <td class="px-4 py-2">{{ $quiz->title }}</td>
                <td class="px-4 py-2">{{ $quiz->total_questions }}</td>
                <td class="px-4 py-2">{{ $quiz->max_skips }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('quizzes.edit', $quiz) }}" class="text-yellow-400">Edit</a>
                    <a href="{{ route('quizzes.show', $quiz) }}" class="text-blue-400">View</a>
                    <form action="{{ route('quizzes.destroy', $quiz) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-400" onclick="return confirm('Delete quiz?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</x-app-layout>
