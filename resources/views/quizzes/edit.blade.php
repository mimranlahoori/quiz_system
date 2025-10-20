<x-app-layout>
    <h2 class="text-2xl font-semibold mb-4">Edit Quiz</h2>

<form action="{{ route('quizzes.update', $quiz) }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-lg">
    @csrf
    @method('PUT')
    <div>
        <label class="block mb-1">Title</label>
        <input type="text" name="title" value="{{ $quiz->title }}" class="w-full bg-gray-700 p-2 rounded">
    </div>
    <div>
        <label class="block mb-1">Total Questions</label>
        <input type="number" name="total_questions" value="{{ $quiz->total_questions }}" class="w-full bg-gray-700 p-2 rounded">
    </div>
    <div>
        <label class="block mb-1">Max Skips</label>
        <input type="number" name="max_skips" value="{{ $quiz->max_skips }}" class="w-full bg-gray-700 p-2 rounded">
    </div>
    <button type="submit" class="bg-yellow-600 px-4 py-2 rounded hover:bg-yellow-700">Update</button>
</form>
</x-app-layout>
