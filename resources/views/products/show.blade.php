@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/2 p-4">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded">
                        @else
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded">
                                <span class="text-gray-500">{{ __('No image') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="md:w-1/2 p-4">
                        <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                        <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                        
                        <div class="mb-4">
                            <span class="text-gray-700">{{ __('messages.product_category') }}:</span>
                            <span class="ml-2">{{ $product->category->name }}</span>
                        </div>
                        
                        <div class="mb-4">
                            <span class="text-2xl font-bold">${{ number_format($product->price, 2) }}</span>
                        </div>
                        
                        <div class="mb-6">
                            <span class="text-sm {{ $product->stock < 5 ? 'text-red-500' : 'text-green-500' }}">
                                {{ $product->stock > 0 ? $product->stock . ' in stock' : __('messages.out_of_stock') }}
                            </span>
                        </div>
                        
                        <div class="flex space-x-4">
                            <a href="{{ route('products.edit', $product) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('messages.edit') }}
                            </a>
                            
                            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('messages.delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection