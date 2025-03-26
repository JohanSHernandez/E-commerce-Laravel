<footer class="bg-white border-t border-gray-100 py-6 mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <div>
                <h3 class="text-lg font-semibold">{{ config('app.name', 'Laravel') }}</h3>
                <p class="text-sm text-gray-600">{{ __('messages.footer_tagline') }}</p>
            </div>
            <div>
                <h4 class="text-md font-semibold mb-2">{{ __('messages.quick_links') }}</h4>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li><a href="{{ route('home') }}" class="hover:text-gray-900">{{ __('messages.home') }}</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-gray-900">{{ __('messages.shop') }}</a></li>
                    <li><a href="{{ route('articles.index') }}" class="hover:text-gray-900">{{ __('messages.blog') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-6 border-t border-gray-200 pt-4 text-center text-sm text-gray-600">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. {{ __('messages.all_rights_reserved') }}
        </div>
    </div>
</footer>