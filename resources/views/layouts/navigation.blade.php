<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="logo" class="block h-15 w-auto">
                    </a>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition {{ request()->routeIs('home') ? 'border-indigo-500 text-gray-900' : '' }}">
                        {{ __('messages.home') }}
                    </a>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition {{ request()->routeIs('products.*') ? 'border-indigo-500 text-gray-900' : '' }}">
                        {{ __('messages.shop') }}
                    </a>
                    <a href="{{ route('categories.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition {{ request()->routeIs('categories.*') ? 'border-indigo-500 text-gray-900' : '' }}">
                        {{ __('messages.categories') }}
                    </a>
                    <a href="{{ route('articles.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition {{ request()->routeIs('articles.*') ? 'border-indigo-500 text-gray-900' : '' }}">
                        {{ __('messages.blog') }}
                    </a>
                </div>
 {{--            </div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="ml-3 relative">
                    <div class="flex space-x-4 py-4">
                        <a href="{{ route('language.switch', 'en') }}" class="text-sm text-gray-500 hover:text-gray-700 {{ app()->getLocale() == 'en' ? 'font-bold' : '' }}">
                            English
                        </a>
                        <a href="{{ route('language.switch', 'es') }}" class="text-sm text-gray-500 hover:text-gray-700 {{ app()->getLocale() == 'es' ? 'font-bold' : '' }}">
                            Español
                    </div>
                </div>
            <div> --}}
            </div>
        </div>
    </div>
</nav>