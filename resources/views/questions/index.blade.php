<x-app-layout>
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">All Questions</h2>
</div>

<table class="min-w-full bg-gray-800 rounded">
    <thead class="bg-gray-700">
        <tr>
            <th class="px-4 py-2 text-left">Quiz</th>
            <th class="px-4 py-2 text-left">Question</th>
            <th class="px-4 py-2 text-left">Correct Option</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questions as $q)
        <tr class="border-b border-gray-700">
            <td class="px-4 py-2">{{ $q->quiz->title ?? 'N/A' }}</td>
            <td class="px-4 py-2">{{ Str::limit($q->question_text, 60) }}</td>
            <td class="px-4 py-2 font-semibold text-green-400 uppercase">{{ $q->correct_option }}</td>
            <td class="px-4 py-2 space-x-2">
                <a href="{{ route('questions.edit', $q) }}" class="text-yellow-400">Edit</a>
                <form action="{{ route('questions.destroy', $q) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-400" onclick="return confirm('Delete this question?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</x-app-layout>
