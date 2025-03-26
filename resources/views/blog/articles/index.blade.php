@extends('layouts.app')

@section('title', __('messages.articles'))

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold">{{ __('messages.articles') }}</h2>
                    <a href="{{ route('articles.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('messages.create') }}
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($articles as $article)
                        <div class="border rounded-lg overflow-hidden shadow hover:shadow-md transition-shadow">
                            <a href="{{ route('articles.show', $article) }}">
                                @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-500">{{ __('No image') }}</span>
                                    </div>
                                @endif
                            </a>
                            <div class="p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm text-gray-600">{{ $article->blogCategory->name }}</span>
                                    <span class="text-sm text-gray-600">{{ $article->published_at->format('M d, Y') }}</span>
                                </div>
                                <a href="{{ route('articles.show', $article) }}">
                                    <h3 class="text-xl font-semibold mb-2">{{ $article->title }}</h3>
                                </a>
                                <p class="text-gray-600 mb-4">{{ Str::limit($article->content, 150) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">{{ __('By') }} {{ $article->author }}</span>
                                    <a href="{{ route('articles.show', $article) }}" class="text-blue-500 hover:text-blue-700">
                                        {{ __('Read more') }} →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection