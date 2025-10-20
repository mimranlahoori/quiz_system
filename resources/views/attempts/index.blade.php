<x-app-layout>
    <h2 class="text-2xl font-semibold mb-4">All Quiz Attempts</h2>

<table class="min-w-full bg-gray-900 text-gray-200 rounded-lg shadow-md">
    <thead>
        <tr class="bg-gray-800 text-left">
            <th class="px-4 py-2">Quiz Title</th>
            <th class="px-4 py-2">Total Questions</th>
            <th class="px-4 py-2">Score</th>
            <th class="px-4 py-2">Skipped</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2 text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attempts as $a)
        <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
            <td class="px-4 py-2">{{ $a->quiz->title }}</td>
            <td class="px-4 py-2">{{ $a->quiz->total_questions }}</td>
            <td class="px-4 py-2">{{ $a->score }}</td>
            <td class="px-4 py-2">{{ $a->skipped_count }}</td>
            <td class="px-4 py-2">
                @if($a->completed)
                    <span class="text-green-400 font-semibold">Completed</span>
                @else
                    <span class="text-yellow-400 font-semibold">In Progress</span>
                @endif
            </td>
            <td class="px-4 py-2 text-center">
                @if(!$a->completed)
                    <a href="{{ route('attempts.start', $a->quiz_id) }}" 
                       class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded-md text-sm">
                       Resume Quiz
                    </a>
                @else
                    <a href="{{ route('results.show', $a->id) }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md text-sm">
                       View Result
                    </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</x-app-layout>
