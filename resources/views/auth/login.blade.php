@extends('layouts.app' , [
    'title' => 'FlexNews | Login',
    'description' => 'expore the latest news around the world today
                      for free such as sport,education,health and more..
                     '     
      ])

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:my-8">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="flex pt-3 justify-center">
                     <img 
                          class="h-[80px] w-[80px] md:w-[80px] md:h-[80px] rounded-full mt-2"
                          src="{{ asset('images/avatar.jpg') }}" alt="avatar"
                      >
                </header>

                <form class="w-full px-6 space-y-4 sm:px-10 sm:space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Email Address') }}:
                        </label>

                        <input id="email" type="email" name="email"
                            class="form-input border border-gray-300 focus:shadow-none w-full @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Password') }}:
                        </label>

                        <input id="password" type="password" name="password"
                            class="form-input border border-gray-300 focus:shadow-none w-full @error('password') border-red-500 @enderror" name="password"
                            required>

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <label class="inline-flex items-center text-sm text-gray-700" for="remember">
                            <input 
                                  type="checkbox" 
                                  name="remember" 
                                  id="remember" 
                                  class="form-checkbox border border-blue-900 focus:shadow-none"
                                {{ old('remember') ? 'checked' : '' }}>
                            <span class="ml-2">{{ __('Remember Me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                        <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto"
                            href="{{ route('login') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-500 hover:bg-red-700 sm:py-4">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('register'))
                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{ __("Don't have an account?") }}
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </p>
                        @endif
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
