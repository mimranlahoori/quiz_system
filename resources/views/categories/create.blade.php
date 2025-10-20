<x-app-layout>
    <h2 class="text-2xl font-semibold mb-4">Create Category</h2>

<form action="{{ route('categories.store') }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-lg">
    @csrf
    <div>
        <label class="block mb-1">Category Name</label>
        <input type="text" name="cate_name" class="w-full bg-gray-700 p-2 rounded" required>
    </div>
    <div>
        <label class="block mb-1">Slug (optional)</label>
        <input type="text" name="slug" class="w-full bg-gray-700 p-2 rounded">
    </div>
    <div>
        <label class="block mb-1">Parent Category</label>
        <select name="cate_parent_id" class="w-full bg-gray-700 p-2 rounded">
            <option value="">-- None --</option>
            @foreach($parents as $parent)
                <option value="{{ $parent->id }}">{{ $parent->cate_name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block mb-1">Category Link (optional)</label>
        <input type="text" name="cate_link" class="w-full bg-gray-700 p-2 rounded">
    </div>

    <button type="submit" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Create</button>
</form>
</x-app-layout>
