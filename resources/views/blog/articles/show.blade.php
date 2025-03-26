@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <!-- Article Header -->
                <div class="mb-8">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-64 object-cover rounded mb-6">
                    @endif
                    
                    <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
                    
                    <div class="flex flex-wrap items-center text-gray-600 mb-4">
                        <span class="mr-4">{{ __('By') }} {{ $article->author }}</span>
                        <span class="mr-4">{{ $article->published_at->format('M d, Y') }}</span>
                        <span>{{ __('Category') }}: {{ $article->blogCategory->name }}</span>
                    </div>
                    
                    <div class="flex space-x-4">
                        <a href="{{ route('articles.edit', $article) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm">
                            {{ __('messages.edit') }}
                        </a>
                        
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">
                                {{ __('messages.delete') }}
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Article Content -->
                <div class="prose max-w-none mb-12">
                    {{ $article->content }}
                </div>
                
                <!-- Comments Section -->
                <div class="border-t pt-8">
                    <h3 class="text-xl font-semibold mb-6">{{ __('messages.comments') }} ({{ $article->comments->count() }})</h3>
                    
                    <!-- Comment Form -->
                    <div class="mb-8 bg-gray-50 p-4 rounded">
                        <h4 class="text-lg font-medium mb-4">{{ __('messages.add_comment') }}</h4>
                        
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">
                                        {{ __('messages.your_name') }}:
                                    </label>
                                    <input type="text" name="username" id="username" value="{{ old('username') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('username') border-red-500 @enderror">
                                    @error('username')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                        {{ __('messages.your_email') }}:
                                    </label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror">
                                    @error('email')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('messages.your_comment') }}:
                                </label>
                                <textarea name="content" id="content" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                                @error('content')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Submit Comment') }}
                            </button>
                        </form>
                    </div>
                    
                    <!-- Comments List -->
                    <div class="space-y-6">
                        @forelse($article->comments as $comment)
                            <div class="bg-gray-50 p-4 rounded">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h5 class="font-semibold">{{ $comment->username }}</h5>
                                        <p class="text-sm text-gray-600">{{ $comment->created_at->diffForHumans() }}</p>
                                    </div>
                                    
                                    <div class="flex space-x-2">
                                        <a href="{{ route('comments.edit', $comment) }}" class="text-blue-500 hover:text-blue-700">
                                            {{ __('messages.edit') }}
                                        </a>
                                        
                                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                {{ __('messages.delete') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                
                                <p class="text-gray-700">{{ $comment->content }}</p>
                            </div>
                        @empty
                            <p class="text-gray-600">{{ __('No comments yet. Be the first to comment!') }}</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection