<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 text-gray-200">
        <h2 class="text-3xl font-bold mb-4">🎯 Quiz Results</h2>
        <div class="bg-gray-900 p-5 rounded-xl shadow mb-6">
            <h3 class="text-xl font-semibold mb-2">{{ $attempt->quiz->title }}</h3>
            <p><strong>Total Questions:</strong> {{ $total }}</p>
            <p><strong>Correct Answers:</strong> <span class="text-green-400">{{ $correct }}</span></p>
            <p><strong>Wrong Answers:</strong> <span class="text-red-400">{{ $wrong }}</span></p>
            <p><strong>Skipped:</strong> <span class="text-yellow-400">{{ $skipped }}</span></p>
            <p><strong>Score:</strong> {{ $percentage }}%</p>
        </div>

        <div class="text-center">
            @if($percentage >= 70)
                <a href="{{ route('certificate.generate', $attempt->id) }}" class="bg-green-600 px-4 py-2 rounded hover:bg-green-700">
                    🎓 Download Certificate
                </a>
            @else
                <p class="text-red-400 font-semibold">You need at least 70% to earn a certificate.</p>
            @endif
        </div>
    </div>
</x-app-layout>
