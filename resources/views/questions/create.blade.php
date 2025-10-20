<x-app-layout>

    <div class="max-w-4xl mx-auto py-12">
<div class="bg-gray-900 text-gray-200 p-6 sm:p-8 rounded-xl shadow-2xl">
<h2 class="text-3xl font-extrabold mb-6 text-blue-400 border-b border-gray-700 pb-3">
Add New Question - {{ $quiz->title }}
</h2>

    <form action="{{ route('questions.store', $quiz->id) }}" method="POST" class="space-y-6">
        @csrf

        <!-- Question Text Field -->
        <div>
            <label for="question_text" class="block mb-2 text-sm font-medium text-gray-300">
                Question Text (Min 10, Max 500 characters)
            </label>
            <textarea
                name="question_text"
                id="question_text"
                class="w-full bg-gray-800 rounded-lg border @error('question_text') border-red-500 @else border-gray-700 @enderror text-gray-100 p-3 focus:border-blue-500 focus:ring-blue-500 transition duration-150"
                rows="4"
                minlength="10"
                maxlength="500"
                required
            >{{ old('question_text') }}</textarea>
            @error('question_text')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Options Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            @php
                $options = ['a', 'b', 'c', 'd'];
                $labels = ['A', 'B', 'C', 'D'];
            @endphp

            @foreach ($options as $index => $option)
                <div>
                    <label for="option_{{ $option }}" class="block mb-1 text-sm font-medium text-gray-300">
                        Option {{ $labels[$index] }} (Max 200 characters)
                    </label>
                    <input
                        type="text"
                        name="option_{{ $option }}"
                        id="option_{{ $option }}"
                        class="w-full bg-gray-800 rounded-lg border @error('option_' . $option) border-red-500 @else border-gray-700 @enderror text-gray-100 p-3 focus:border-blue-500 focus:ring-blue-500 transition duration-150"
                        maxlength="200"
                        required
                        value="{{ old('option_' . $option) }}"
                    >
                    @error('option_' . $option)
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>

        <!-- Correct Option Select -->
        <div>
            <label for="correct_option" class="block mb-2 text-sm font-medium text-gray-300">
                Correct Option
            </label>
            <select
                name="correct_option"
                id="correct_option"
                class="bg-gray-800 rounded-lg border @error('correct_option') border-red-500 @else border-gray-700 @enderror w-full text-gray-100 p-3 focus:border-blue-500 focus:ring-blue-500 transition duration-150"
                required
            >
                <option value="" disabled selected>-- Select the correct answer --</option>
                <option value="a" {{ old('correct_option') == 'a' ? 'selected' : '' }}>Option A</option>
                <option value="b" {{ old('correct_option') == 'b' ? 'selected' : '' }}>Option B</option>
                <option value="c" {{ old('correct_option') == 'c' ? 'selected' : '' }}>Option C</option>
                <option value="d" {{ old('correct_option') == 'd' ? 'selected' : '' }}>Option D</option>
            </select>
            @error('correct_option')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end pt-4 space-x-3 border-t border-gray-700 mt-6">
            <a href="{{ route('quizzes.show', $quiz->id) }}"
               class="bg-gray-700 px-6 py-3 text-lg font-semibold rounded-lg hover:bg-gray-600 transition duration-150 shadow-md">
                Back
            </a>
            <button type="submit"
                    class="bg-blue-600 px-6 py-3 text-lg font-semibold rounded-lg hover:bg-blue-700 transition duration-150 shadow-lg transform hover:scale-[1.02] active:scale-[0.98]">
                Save Question
            </button>
        </div>
    </form>
</div>


</div>
</x-app-layout>
