<x-app-layout>
    <h2 class="text-2xl font-semibold mb-4">Create New Quiz</h2>

<form action="{{ route('quizzes.store') }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-lg">
    @csrf
    <div>
        <label class="block mb-1">Title</label>
        <input type="text" name="title" class="w-full bg-gray-700 p-2 rounded" required>
    </div>
    <div>
        <label class="block mb-1">Total Questions</label>
        <input type="number" name="total_questions" value="55" class="w-full bg-gray-700 p-2 rounded">
    </div>
    <div>
        <label class="block mb-1">Max Skips</label>
        <input type="number" name="max_skips" value="5" class="w-full bg-gray-700 p-2 rounded">
    </div>
    <button type="submit" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Create</button>
</form>
</x-app-layout>
