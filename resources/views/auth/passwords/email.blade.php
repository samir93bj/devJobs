@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex flex-wrap justify-center">

        <div class="w-full max-w-sm">
           
                <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6 mb-0">{{ __('Reset Password') }}</div>

                <div class="flex flex-col break-words bg-white border border-2 shadow-md">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6 mx-3">
                            <label for="email" class="block text-gray-800 text-md mb-2 uppercase mt-5">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="p-3 bg-gray-300 rounded form-input w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" novalidate autocomplete="email" autofocus>

                                @error('email')
                                    <span class="bg-red-100 bordero-l-4 bordero-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="flex flex-wrap">
                                <button type="submit" class="text-sm bg-gray-700 w-full hover:bg-gray-400 hover:text-gray-900 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>
</div>
@endsection
