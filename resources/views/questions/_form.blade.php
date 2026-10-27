<div class="mb-4">
    <label class="block text-xs font-medium text-purple-200 mb-1">Título</label>
    <input type="text" name="title" class="w-full p-2 bg-purple-900/30 border border-purple-700/50 rounded-md text-sm text-purple-100 focus:outline-none focus:border-orange-500 placeholder-purple-400" value="{{ old('title', $question->title ?? '') }}" />
    
    @error('title')<div class="text-orange-400 text-xs mt-1">{{ $message }}</div>@enderror
</div>

<div class="mb-4">
    <label class="block text-xs font-medium text-purple-200 mb-1">Categoría</label>
    <select name="category_id" class="w-full p-2 bg-purple-900/30 border border-purple-700/50 rounded-md text-sm text-purple-100 focus:outline-none focus:border-orange-500">
        <option value="" class="bg-purple-950 text-purple-300">Seleccione una categoría</option>

        @foreach ($categories as $category)
            <option value="{{ $category->id }}" class="bg-purple-950 text-purple-100" @selected($category->id == old('category_id', $question->category_id ?? ''))>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    @error('category_id')<div class="text-orange-400 text-xs mt-1">{{ $message }}</div>@enderror
</div>

<div class="mb-4">
    <label class="block text-xs font-medium text-purple-200 mb-1">Descripción</label>
    <textarea name="description" rows="6" class="w-full p-2 bg-purple-900/30 border border-purple-700/50 rounded-md text-sm text-purple-100 focus:outline-none focus:border-orange-500 placeholder-purple-400">{{ old('description', $question->description ?? '') }}</textarea>

    @error('description')<div class="text-orange-400 text-xs mt-1">{{ $message }}</div>@enderror                
</div>