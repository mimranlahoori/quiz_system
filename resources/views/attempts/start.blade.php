<x-app-layout>
    <div class="max-w-3xl mx-auto bg-gray-900 text-gray-200 p-6 rounded-lg shadow-lg">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">{{ $quiz->title }}</h2>
            <span>Score: {{ $attempt->score }}</span>
        </div>

        <div class="border-t border-gray-700 pt-4">
            <h3 class="text-lg font-semibold mb-3">Question:</h3>
            <p class="mb-4">{{ $question->question_text }}</p>

            <form action="{{ route('attempts.answer', [$attempt->id, $question->id]) }}" method="POST">
                @csrf

                <div class="space-y-2 mb-6">
                    @foreach(['a','b','c','d'] as $option)
                        <label class="flex items-center bg-gray-800 px-4 py-2 rounded cursor-pointer hover:bg-gray-700">
                            <input type="radio" name="selected_option" value="{{ $option }}" class="mr-3">
                            {{ strtoupper($option) }}. {{ $question['option_'.$option] }}
                        </label>
                    @endforeach
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Submit</button>

                    @if($attempt->skipped_count < $quiz->max_skips)
                        <button type="submit" name="skip" value="1"
                                class="bg-yellow-500 px-4 py-2 rounded hover:bg-yellow-600">
                            Skip ({{ $attempt->skipped_count }}/{{ $quiz->max_skips }})
                        </button>
                    @else
                        <span class="text-gray-500 italic">Skip limit reached</span>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
