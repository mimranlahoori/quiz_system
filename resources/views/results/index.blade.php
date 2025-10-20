<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6 text-white">📋 Quiz Results History</h2>

        <table class="min-w-full bg-gray-900 text-gray-200 rounded-lg shadow-md">
    <thead>
        <tr class="bg-gray-800">
            <th class="p-3 text-center">#</th>
            <th class="p-3">User</th>
            <th class="p-3">Quiz</th>
            <th class="p-3 text-center">Score</th>
            <th class="p-3 text-center">Status</th>
            <th class="p-3 text-center">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($results as $index => $attempt)
            <tr class="border-t border-gray-700 hover:bg-gray-800/40 transition">
                <td class="p-3 text-center">{{ $index + 1 }}</td>
                <td class="p-3">{{ $attempt->user->name ?? 'N/A' }}</td>
                <td class="p-3">{{ $attempt->quiz->title ?? 'N/A' }}</td>
                <td class="p-3 text-center">{{ $attempt->score }}%</td>
                <td class="p-3 text-center">
                    @if($attempt->completed)
                        <span class="text-green-400 font-semibold">Completed</span>
                    @else
                        <span class="text-yellow-400 font-semibold">In Progress</span>
                    @endif
                </td>
                <td class="p-3 text-center flex justify-center gap-2">
                    @if(!$attempt->completed)
                        <a href="{{ route('attempts.start', $attempt->quiz_id) }}" 
                           class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded-md text-sm">
                           Resume Quiz
                        </a>
                    @else
                        <a href="{{ route('results.show', $attempt->id) }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md text-sm">
                           View Result
                        </a>
                        <a href="{{ route('certificate.generate', $attempt->id) }}" 
                           class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-md text-sm">
                           Download Certificate
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="p-4 text-center text-gray-400">No results found</td>
            </tr>
        @endforelse
    </tbody>
</table>


        <div class="mt-4">{{ $results->links() }}</div>
    </div>
</x-app-layout>
