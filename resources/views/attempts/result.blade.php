<x-app-layout>
    <div class="max-w-2xl mx-auto bg-gray-900 text-gray-200 p-6 rounded-lg shadow-lg text-center">
        <h2 class="text-2xl font-semibold mb-4">{{ $quiz->title }} - Result</h2>

        <p class="text-lg mb-2">Total Questions: {{ $quiz->total_questions }}</p>
        <p class="text-lg mb-2">Correct Answers: {{ $attempt->score }}</p>
        <p class="text-lg mb-2">Skipped: {{ $attempt->skipped_count }}</p>

        <div class="mt-6">
            <a href="{{ route('quizzes.show', $quiz->id) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Back to Quiz
            </a>
        </div>
    </div>
</x-app-layout>
