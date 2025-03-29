@extends('layouts.app')

@section('title', __('Edit Article'))

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold mb-6">{{ __('Edit Article') }}: {{ $article->title }}</h2>
                
                <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('messages.article_title') }}:
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror">
                        @error('title')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('messages.article_content') }}:
                        </label>
                        <textarea name="content" id="content" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror">{{ old('content', $article->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="author" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('messages.article_author') }}:
                        </label>
                        <input type="text" name="author" id="author" value="{{ old('author', $article->author) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('author') border-red-500 @enderror">
                        @error('author')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="blog_category_id" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('messages.article_category') }}:
                        </label>
                        <select name="blog_category_id" id="blog_category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('blog_category_id') border-red-500 @enderror">
                            <option value="">{{ __('Select a category') }}</option>
                            @foreach($blogCategories as $category)
                                <option value="{{ $category->id }}" {{ old('blog_category_id', $article->blog_category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('blog_category_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="published_at" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('messages.published_at') }}:
                        </label>
                        <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at', $article->published_at->format('Y-m-d\TH:i')) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('published_at') border-red-500 @enderror">
                        @error('published_at')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('messages.article_image') }}:
                        </label>
                        @if($article->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-32 h-32 object-cover rounded">
                            </div>
                        @endif
                        <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror">
                        <p class="text-sm text-gray-600 mt-1">{{ __('Leave empty to keep current image') }}</p>
                        @error('image')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('messages.update') }}
                        </button>
                        <a href="{{ route('articles.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            {{ __('messages.cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection