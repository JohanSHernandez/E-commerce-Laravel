@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6">
                    <h1 class="text-3xl font-bold mb-2">{{ $category->name }}</h1>
                    <p class="text-gray-600">{{ $category->description }}</p>
                </div>
                
                <div class="flex space-x-4 mb-8">
                    <a href="{{ route('categories.edit', $category) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('messages.edit') }}
                    </a>
                    
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('messages.delete') }}
                        </button>
                    </form>
                </div>
                
                <h2 class="text-2xl font-semibold mb-4">{{ __('Products in this category') }}</h2>
                
                @if($category->products->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($category->products as $product)
                            <div class="border rounded-lg p-4 shadow hover:shadow-md transition-shadow">
                                <a href="{{ route('products.show', $product) }}">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4 rounded">
                                    @else
                                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center mb-4 rounded">
                                            <span class="text-gray-500">{{ __('No image') }}</span>
                                        </div>
                                    @endif
                                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                                    <p class="text-gray-600 mb-2">{{ Str::limit($product->description, 100) }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-xl font-bold">${{ number_format($product->price, 2) }}</span>
                                        <span class="text-sm {{ $product->stock < 5 ? 'text-red-500' : 'text-green-500' }}">
                                            {{ $product->stock > 0 ? $product->stock . ' in stock' : __('messages.out_of_stock') }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-gray-500">{{ __('No products in this category yet.') }}</p>
                        <a href="{{ route('products.create') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Add a product') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection