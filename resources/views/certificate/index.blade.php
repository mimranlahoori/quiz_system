<x-app-layout>
    <div class="max-w-5xl mx-auto p-6 text-gray-200">
        <h2 class="text-3xl font-bold mb-6">🎓 Certificates List</h2>

        <table class="w-full border border-gray-700 rounded-lg">
            <thead class="bg-gray-800 text-gray-400">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3 text-left">User</th>
                    <th class="p-3 text-left">Quiz</th>
                    <th class="p-3 text-center">Score</th>
                    <th class="p-3 text-center">Date</th>
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($certificates as $index => $attempt)
                    <tr class="border-t border-gray-700 hover:bg-gray-800/40">
                        <td class="p-3 text-center">{{ $index + 1 }}</td>
                        <td class="p-3">{{ $attempt->user->name }}</td>
                        <td class="p-3">{{ $attempt->quiz->title }}</td>
                        <td class="p-3 text-center">{{ $attempt->score }}%</td>
                        <td class="p-3 text-center">{{ $attempt->created_at->format('d M, Y') }}</td>
                        <td class="p-3 text-center">
                            <a href="{{ route('certificate.generate', $attempt->id) }}" class="bg-green-600 px-3 py-1 rounded hover:bg-green-700">Download</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="p-4 text-center text-gray-400">No certificates available</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">{{ $certificates->links() }}</div>
    </div>
</x-app-layout>
