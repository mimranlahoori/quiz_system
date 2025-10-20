<x-app-layout>
    <div class="max-w-3xl mx-auto bg-gray-900 text-gray-200 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">Edit Question</h2>

        <form action="{{ route('questions.update', $question->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-semibold">Question Text</label>
                <textarea name="question_text" class="w-full bg-gray-800 rounded border-gray-700" rows="3" required>{{ $question->question_text }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label>Option A</label>
                    <input type="text" name="option_a" value="{{ $question->option_a }}" class="w-full bg-gray-800 rounded border-gray-700" required>
                </div>
                <div>
                    <label>Option B</label>
                    <input type="text" name="option_b" value="{{ $question->option_b }}" class="w-full bg-gray-800 rounded border-gray-700" required>
                </div>
                <div>
                    <label>Option C</label>
                    <input type="text" name="option_c" value="{{ $question->option_c }}" class="w-full bg-gray-800 rounded border-gray-700" required>
                </div>
                <div>
                    <label>Option D</label>
                    <input type="text" name="option_d" value="{{ $question->option_d }}" class="w-full bg-gray-800 rounded border-gray-700" required>
                </div>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Correct Option</label>
                <select name="correct_option" class="bg-gray-800 rounded border-gray-700 w-full" required>
                    <option value="a" {{ $question->correct_option == 'a' ? 'selected' : '' }}>Option A</option>
                    <option value="b" {{ $question->correct_option == 'b' ? 'selected' : '' }}>Option B</option>
                    <option value="c" {{ $question->correct_option == 'c' ? 'selected' : '' }}>Option C</option>
                    <option value="d" {{ $question->correct_option == 'd' ? 'selected' : '' }}>Option D</option>
                </select>
            </div>

            <div class="flex justify-end mt-4">
                <a href="{{ route('quizzes.show', $question->quiz_id) }}"
                   class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 mr-2">Back</a>
                <button type="submit"
                        class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Update Question</button>
            </div>
        </form>
    </div>
</x-app-layout>
