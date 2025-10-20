<x-app-layout>
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">All Categories</h2>
    <a href="{{ route('categories.create') }}" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">+ Add Category</a>
</div>

<table class="min-w-full bg-gray-800 rounded">
    <thead class="bg-gray-700">
        <tr>
            <th class="px-4 py-2 text-left">Name</th>
            <th class="px-4 py-2 text-left">Slug</th>
            <th class="px-4 py-2 text-left">Parent</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $cat)
        <tr class="border-b border-gray-700">
            <td class="px-4 py-2">{{ $cat->cate_name }}</td>
            <td class="px-4 py-2 text-gray-400">{{ $cat->slug }}</td>
            <td class="px-4 py-2">{{ $cat->parent?->cate_name ?? '-' }}</td>
            <td class="px-4 py-2 space-x-2">
                <a href="{{ route('categories.show', $cat) }}" class="text-blue-400">View</a>
                <a href="{{ route('categories.edit', $cat) }}" class="text-yellow-400">Edit</a>
                <form action="{{ route('categories.destroy', $cat) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-400" onclick="return confirm('Delete category?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</x-app-layout>
