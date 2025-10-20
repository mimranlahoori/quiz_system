<x-app-layout>
    <h2 class="text-2xl font-semibold mb-4">Edit Category</h2>

<form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-lg">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1">Category Name</label>
        <input type="text" name="cate_name" value="{{ $category->cate_name }}" class="w-full bg-gray-700 p-2 rounded">
    </div>

    <div>
        <label class="block mb-1">Slug</label>
        <input type="text" name="slug" value="{{ $category->slug }}" class="w-full bg-gray-700 p-2 rounded">
    </div>

    <div>
        <label class="block mb-1">Parent Category</label>
        <select name="cate_parent_id" class="w-full bg-gray-700 p-2 rounded">
            <option value="">-- None --</option>
            @foreach($categories as $parent)
                <option value="{{ $parent->id }}" {{ $category->cate_parent_id == $parent->id ? 'selected' : '' }}>
                    {{ $parent->cate_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1">Category Link</label>
        <input type="text" name="cate_link" value="{{ $category->cate_link }}" class="w-full bg-gray-700 p-2 rounded">
    </div>

    <button type="submit" class="bg-yellow-600 px-4 py-2 rounded hover:bg-yellow-700">Update</button>
</form>
</x-app-layout>
