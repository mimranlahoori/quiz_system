<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">{{ $quiz->title }}</h2>
        @if($quiz->attempts()->where('user_id', auth()->id())->where('completed', false)->exists())
            <a href="{{ route('attempts.start', $quiz->id) }}" class="bg-yellow-600 text-white px-3 py-2 rounded">Resume
                Quiz</a>
        @else
            <a href="{{ route('attempts.start', $quiz->id) }}" class="bg-green-600 text-white px-3 py-2 rounded">Start
                Quiz</a>
        @endif

    </div>

    <div class="bg-gray-800 text-white p-4 rounded-lg shadow">
        <p><strong>Total Questions:</strong> {{ $quiz->total_questions }}</p>
        <p><strong>Max Skips:</strong> {{ $quiz->max_skips }}</p>
    </div>

    <div class="flex justify-between items-center mt-8 mb-4">
        <h3 class="text-xl font-semibold">Questions</h3>
        <a href="{{ route('questions.create', $quiz->id) }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add Question
        </a>
    </div>

    <div class="overflow-x-auto bg-gray-900 text-gray-200 rounded-lg shadow-lg">
        <table class="min-w-full border border-gray-700">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-2 border-b border-gray-700 text-left">#</th>
                    <th class="px-4 py-2 border-b border-gray-700 text-left">Question</th>
                    <th class="px-4 py-2 border-b border-gray-700 text-left">Options</th>
                    <th class="px-4 py-2 border-b border-gray-700 text-left">Correct</th>
                    <th class="px-4 py-2 border-b border-gray-700 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($quiz->questions as $index => $q)
                    <tr class="hover:bg-gray-800">
                        <td class="px-4 py-2 border-b border-gray-700">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b border-gray-700">{{ $q->question_text }}</td>
                        <td class="px-4 py-2 border-b border-gray-700">
                            <ul class="list-disc list-inside">
                                <li>A. {{ $q->option_a }}</li>
                                <li>B. {{ $q->option_b }}</li>
                                <li>C. {{ $q->option_c }}</li>
                                <li>D. {{ $q->option_d }}</li>
                            </ul>
                        </td>
                        <td class="px-4 py-2 border-b border-gray-700 font-semibold text-green-400">
                            {{ strtoupper($q->correct_option) }}
                        </td>
                        <td class="px-4 py-2 border-b border-gray-700 text-center">
                            <a href="{{ route('questions.edit', $q->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded mr-2">
                                Edit
                            </a>
                            <form action="{{ route('questions.destroy', $q->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this question?')"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-400 py-4">
                            No questions found for this quiz.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>