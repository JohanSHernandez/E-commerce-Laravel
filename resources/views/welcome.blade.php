@extends('layouts.app')

@section('title', __('Welcome'))

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-3xl font-bold mb-4">{{ __('Welcome to our E-commerce & Blog') }}</h1>
                <p class="text-lg text-gray-600">{{ __('Browse our collection of products and read our informative articles.') }}</p>
                
                <div class="mt-6 flex space-x-4">
                    <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('messages.shop') }}
                    </a>
                    <a href="{{ route('articles.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
                        {{ __('messages.blog') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection