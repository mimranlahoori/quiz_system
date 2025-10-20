<x-app-layout>
    <div class="p-6 bg-gray-900 text-gray-200 min-h-screen">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-white">🎯 Quiz Dashboard</h1>
            <a href="{{ route('quizzes.index') }}" 
               class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
               + New Quiz
            </a>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-gray-800 rounded-lg p-5 shadow-md">
                <h2 class="text-lg font-semibold text-gray-300 mb-2">Total Quizzes</h2>
                <p class="text-3xl font-bold text-green-400">{{ \App\Models\Quiz::count() }}</p>
            </div>

            <div class="bg-gray-800 rounded-lg p-5 shadow-md">
                <h2 class="text-lg font-semibold text-gray-300 mb-2">Total Categories</h2>
                <p class="text-3xl font-bold text-blue-400">{{ \App\Models\Category::count() }}</p>
            </div>

            <div class="bg-gray-800 rounded-lg p-5 shadow-md">
                <h2 class="text-lg font-semibold text-gray-300 mb-2">Your Attempts</h2>
                <p class="text-3xl font-bold text-yellow-400">
                    {{ \App\Models\UserQuizAttempt::where('user_id', auth()->id())->count() }}
                </p>
            </div>
        </div>

        {{-- Recent Activity --}}
        <div class="bg-gray-800 rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-semibold text-white mb-4">🕒 Recent Quiz Attempts</h2>

            <table class="min-w-full text-sm text-gray-300">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="text-left py-2">Quiz</th>
                        <th class="text-center py-2">Score</th>
                        <th class="text-center py-2">Status</th>
                        <th class="text-center py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(\App\Models\UserQuizAttempt::with('quiz')
                        ->where('user_id', auth()->id())
                        ->latest()
                        ->take(5)
                        ->get() as $attempt)
                        <tr class="border-b border-gray-700 hover:bg-gray-700/40 transition">
                            <td class="py-2">{{ $attempt->quiz->title ?? 'N/A' }}</td>
                            <td class="text-center">{{ $attempt->score }}%</td>
                            <td class="text-center">
                                @if($attempt->completed)
                                    <span class="text-green-400">Completed</span>
                                @else
                                    <span class="text-yellow-400">In Progress</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if(!$attempt->completed)
                                    <a href="{{ route('attempts.start', $attempt->quiz_id) }}" 
                                       class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded-md text-sm">
                                       Resume
                                    </a>
                                @else
                                    <a href="{{ route('results.show', $attempt->id) }}" 
                                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md text-sm">
                                       View Result
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center py-4 text-gray-400">No attempts yet</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Quick Links --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('categories.index') }}" 
               class="bg-blue-700 hover:bg-blue-800 p-5 rounded-lg text-white text-center font-semibold shadow-md transition">
               📚 Manage Categories
            </a>

            <a href="{{ route('quizzes.index') }}" 
               class="bg-green-700 hover:bg-green-800 p-5 rounded-lg text-white text-center font-semibold shadow-md transition">
               🧩 Manage Quizzes
            </a>

            <a href="{{ route('results.index') }}" 
               class="bg-purple-700 hover:bg-purple-800 p-5 rounded-lg text-white text-center font-semibold shadow-md transition">
               🏆 View Results
            </a>
        </div>

    </div>
</x-app-layout>
