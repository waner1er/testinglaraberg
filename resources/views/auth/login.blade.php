<x-guest-layout-no-container>
    <div class="h-screen w-full flex justify-center items-center bg-gradient-to-tr from-blue-900 to-blue-500">
        <div
            class="bg-image w-full sm:w-1/2 md:w-9/12 lg:w-1/2 mx-3 md:mx-5 lg:mx-0 shadow-md flex flex-col md:flex-row items-center rounded z-10 overflow-hidden bg-center bg-cover bg-blue-600">
            <div class="w-full md:w-1/2 flex flex-col justify-center items-center bg-opacity-25 bg-blue-600 backdrop">
                <h1 class="text-3xl md:text-4xl font-extrabold text-white my-2 md:my-0">
                    {{config('app.name')}}
                </h1>
                <p class="mb-2 text-white hidden md:block font-mono">
                    {{ 'toto' }}
                </p>
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center bg-white py-5 md:py-8 px-4">
                <h3 class="mb-4 font-bold text-3xl flex items-center text-blue-500">
                    {{__('Login')}}
                </h3>
                {{--        <form method="POST" action="{{ route('login') }}">--}}
                {{--        @csrf--}}
                <form method="post" action="{{ route('login') }}"
                      class="px-3 flex flex-col justify-center items-center w-full gap-3">
                    @csrf
                    <input
                        class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500 placeholder-opacity-50 focus:outline-none focus:border-blue-500"
                        id="email" type="email" name="email" placeholder="email" value="{{ old('email') }}"
                        autofocus>
                    <input id="password"
                           class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500 placeholder-opacity-50 focus:outline-none focus:border-blue-500"
                           type="password"
                           name="password"
                           placeholder="{{ __('password') }}"
                           autocomplete="current-password">

                    <button
                        class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white focus:outline-none focus:ring rounded px-3 py-1">
                        <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        <p class="ml-1 text-lg" type="submit">
                            {{__('login')}}
                        </p>
                    </button>
                </form>
                <p class="text-gray-700 text-sm mt-2">
                    {{__('don\'t have an account?')}}
                    <a href="{{ route('register') }}"
                       class="text-green-500 hover:text-green-600 mt-3 focus:outline-none font-bold underline">
                        register
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout-no-container>
