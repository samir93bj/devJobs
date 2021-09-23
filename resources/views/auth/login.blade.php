@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                
                <div class="flex flex-col break-words bg-white border border-2 shadow-md">
                    <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6 mb-0">
                        {{__('Login')}}
                    </div>

                    <form class="py-10 px-5" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-800 text-md mb-2">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="p-3 bg-gray-300 rounded form-input w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" novalidate autocomplete="email" autofocus>

                            @error('email')
                                <span class="bg-red-100 bordero-l-4 bordero-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password" class="block text-gray-700 text-md mb-2">{{ __('Password') }}</label>

                                <input id="password" type="password" class="p-3 bg-gray-300 rounded form-input w-full @error('password') is-invalid @enderror" name="password" novalidate autocomplete="current-password">

                                @error('password')
                                    <span class="bg-red-100 bordero-l-4 bordero-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="flex flex-wrap">                           
                                <button type="submit" class="bg-gray-700 w-full hover:bg-gray-400 hover:text-gray-900 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="text-sm text-gray-500 mt-5 text-center w-full" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
