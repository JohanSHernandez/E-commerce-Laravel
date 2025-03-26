@extends('layouts.app')

@section('title', __('messages.products'))

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold">{{ __('messages.products') }}</h2>
                    <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('messages.create') }}
                    </a>
                </div>

                <div class="mb-6">
                    <form action="{{ route('products.index') }}" method="GET" class="flex items-center">
                        <label for="category_id" class="mr-2">{{ __('messages.product_category') }}:</label>
                        <select name="category_id" id="category_id" class="rounded border-gray-300 mr-2">
                            <option value="">{{ __('All Categories') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Filter') }}
                        </button>
                    </form>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
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

                <div class="mt-6">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection