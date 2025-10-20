<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-100">Category: {{ $category->name }}</h2>
        <a href="{{ route('categories.index') }}"
           class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">
           ← Back
        </a>
    </div>

    <div class="bg-gray-900 text-gray-200 rounded-lg shadow p-6">
        <h3 class="text-xl font-semibold mb-4">Quizzes in ({{ $category->cate_name }})</h3>

        @if($category->quizzes->count() > 0)
            <table class="min-w-full border border-gray-700 rounded-lg">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="px-4 py-2 border-b border-gray-700 text-left">#</th>
                        <th class="px-4 py-2 border-b border-gray-700 text-left">Title</th>
                        <th class="px-4 py-2 border-b border-gray-700 text-left">Total Questions</th>
                        <th class="px-4 py-2 border-b border-gray-700 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category->quizzes as $quiz)
                        <tr class="hover:bg-gray-800">
                            <td class="px-4 py-2 border-b border-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border-b border-gray-700">{{ $quiz->title }}</td>
                            <td class="px-4 py-2 border-b border-gray-700">{{ $quiz->total_questions }}</td>
                            <td class="px-4 py-2 border-b border-gray-700">
                                <a href="{{ route('quizzes.show', $quiz->id) }}"
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded mr-2">
                                   View
                                </a>

                                <form action="{{ route('categories.detachQuiz', [$category->id, $quiz->id]) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                            onclick="return confirm('Are you sure you want to detach this quiz?')">
                                        Detach
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-400">No quizzes found in this category.</p>
        @endif
    </div>
</x-app-layout>
