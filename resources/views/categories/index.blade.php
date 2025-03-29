@extends('layouts.app')

@section('title', __('messages.categories'))

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold">{{ __('messages.categories') }}</h2>
                    <a href="{{ route('categories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('messages.create') }}
                    </a>
                </div>

                @if($categories->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($categories as $category)
                            <div class="border rounded-lg p-4 shadow hover:shadow-md transition-shadow">
                                <a href="{{ route('categories.show', $category) }}">
                                    <h3 class="text-lg font-semibold mb-2">{{ $category->name }}</h3>
                                    <p class="text-gray-600">{{ Str::limit($category->description, 100) }}</p>
                                    
                                    <div class="mt-4 text-sm text-gray-500">
                                        {{ $category->products_count ?? 0 }} {{ __('messages.products') }}
                                    </div>
                                </a>
                                
                                <div class="mt-4 flex space-x-2">
                                    <a href="{{ route('categories.edit', $category) }}" class="text-blue-500 hover:text-blue-700">
                                        {{ __('messages.edit') }}
                                    </a>
                                    
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            {{ __('messages.delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-6">
                        {{ $categories->links() }}
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-gray-500">{{ __('No categories found.') }}</p>
                        <a href="{{ route('categories.create') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Create your first category') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection