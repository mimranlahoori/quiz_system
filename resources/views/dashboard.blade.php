<x-app-layout>
    <div class="p-6">
        <h2 class="text-3xl font-bold mb-6 text-white">📊 Dashboard Overview</h2>

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-gray-800 p-4 rounded-xl shadow text-center">
                <h3 class="text-lg font-semibold">Quizzes</h3>
                <p class="text-2xl font-bold text-green-400">{{ $data['total_quizzes'] }}</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-xl shadow text-center">
                <h3 class="text-lg font-semibold">Categories</h3>
                <p class="text-2xl font-bold text-blue-400">{{ $data['total_categories'] }}</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-xl shadow text-center">
                <h3 class="text-lg font-semibold">Questions</h3>
                <p class="text-2xl font-bold text-yellow-400">{{ $data['total_questions'] }}</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-xl shadow text-center">
                <h3 class="text-lg font-semibold">Attempts</h3>
                <p class="text-2xl font-bold text-red-400">{{ $data['total_attempts'] }}</p>
            </div>
        </div>

        <!-- Recent Quizzes -->
        <div class="bg-gray-900 p-5 rounded-xl mb-6">
            <h3 class="text-xl font-semibold mb-3 text-gray-200">📝 Recent Quizzes</h3>
            <table class="w-full text-left border border-gray-700 rounded">
                <thead class="bg-gray-800 text-gray-400">
                    <tr>
                        <th class="p-2">Title</th>
                        <th class="p-2">Total Questions</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recent_quizzes as $quiz)
                        <tr class="border-t border-gray-700">
                            <td class="p-2">{{ $quiz->title }}</td>
                            <td class="p-2">{{ $quiz->total_questions }}</td>
                            <td class="p-2">
                                <a href="{{ route('quizzes.show', $quiz->id) }}" class="text-blue-400 hover:underline">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="p-3 text-gray-400 text-center">No quizzes found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Recent Attempts -->
        <div class="bg-gray-900 p-5 rounded-xl">
            <h3 class="text-xl font-semibold mb-3 text-gray-200">🎯 Recent Attempts</h3>
            <table class="w-full text-left border border-gray-700 rounded">
                <thead class="bg-gray-800 text-gray-400">
                    <tr>
                        <th class="p-2">User</th>
                        <th class="p-2">Quiz</th>
                        <th class="p-2">Score</th>
                        <th class="p-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recent_attempts as $attempt)
                        <tr class="border-t border-gray-700">
                            <td class="p-2">{{ $attempt->user->name ?? 'N/A' }}</td>
                            <td class="p-2">{{ $attempt->quiz->title ?? 'N/A' }}</td>
                            <td class="p-2">{{ $attempt->score }}</td>
                            <td class="p-2">
                                @if($attempt->completed)
                                    <span class="text-green-400">Completed</span>
                                @else
                                    <span class="text-yellow-400">In Progress</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="p-3 text-gray-400 text-center">No attempts found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
