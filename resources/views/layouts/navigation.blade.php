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
                    <a href="{{ route('blog-categories.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition {{ request()->routeIs('blog-categories.*') ? 'border-indigo-500 text-gray-900' : '' }}">
                        {{ __('messages.blog') }} {{ __('messages.categories') }}
                    </a>
                </div>
            </div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="ml-3 relative">
                    <div class="relative">
                        <button id="language-button" class="text-sm text-gray-500 hover:text-gray-700 focus:outline-none">
                            {{ __( app()->getLocale()) }}
                            <svg class="w-4 h-4 inline-block fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div id="language-dropdown" class="absolute z-10 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="language-button">
                                <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'en' ? 'font-bold' : '' }}" role="menuitem">
                                    English
                                </a>
                                <a href="{{ route('language.switch', 'es') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'es' ? 'font-bold' : '' }}" role="menuitem">
                                    Español
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        const languageButton = document.getElementById('language-button');
                        const languageDropdown = document.getElementById('language-dropdown');
                    
                        languageButton.addEventListener('click', () => {
                            languageDropdown.classList.toggle('hidden');
                        });
                    
                        // Close dropdown when clicking outside
                        document.addEventListener('click', (event) => {
                            if (!languageButton.contains(event.target) && !languageDropdown.contains(event.target)) {
                                languageDropdown.classList.add('hidden');
                            }
                        });
                    </script>
{{--                     <div class="flex space-x-4 py-4">
                        <a href="{{ route('language.switch', 'en') }}" class="text-sm text-gray-500 hover:text-gray-700 {{ app()->getLocale() == 'en' ? 'font-bold' : '' }}">
                            English
                        </a>
                        <a href="{{ route('language.switch', 'es') }}" class="text-sm text-gray-500 hover:text-gray-700 {{ app()->getLocale() == 'es' ? 'font-bold' : '' }}">
                            Español
                    </div> --}}
                </div>
            <div>
            </div>
        </div>
    </div>
</nav>