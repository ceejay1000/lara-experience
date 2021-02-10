@extends('layouts.app')

@section('content')
    <div class="wrapper bg-gray-200 h-full w-full flex md:flex-row flex-col">
        <div class="img-section md:w-2/4 relative">
            <div class="absolute w-full h-full bg-blue-700 opacity-50"></div>
            <div class="absolute md:w-3/4 lg:w-full h-2/4 text-white text-center transform md:-translate-y-3/4 -translate-y-2/4 -translate-x-2/4 top-1/2 left-1/2 sm:px-5 px-10">
                <h1 class="font-rocker text-xl sm:text-3xl md:text-5xl lg:text-6xl sm:mb-4 lg:mb-6">Undago</h1>
                <p class="sm:text-sm md:text-lg lg:text-xl leading-normal tracking-wide">
                    Welcome to a community of like-minded people where experiences are shared and moments are relived. 
                    Feel free to share you nolstalgic moments by signing up. 
                </p>
                <p class="text-gray-600 font-semibold mt-3">
                    <span class="font-bold">Undergo ~ </span> Happiness at its peak.
                </p>
            </div>
            <img src="{{ asset('img/couple.jpg') }}" class="block h-full object-cover w-full" />
        </div>
        <div class="login-section p-5 md:w-2/4 flex flex-col justify-center items-center min-h-screen h-full">
            <h1 class="text-6xl mb-5">Login</h1>

            <form action="{{ route('login') }}" class="bg-white block shadow-md p-5 md:w-4/5 lg:w-3/5 mb-20 rounded-sm" method="POST">
                @csrf
                @error('invalid_credentials')
                    <p class="text-red-700">{{ $message }}</p>
                @enderror
                <div class="input-field mb-4">
                    <label for="email" class="text-xl mb-2 inline-block">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" class="text-lg p-1 block border-indigo-400 border-2 rounded-sm w-full" required/>
                    @error('email')
                        <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-field mb-2">
                    <label for="password" class="text-xl mb-2 inline-block">Password</label>
                    <input type="password" name="password" placeholder="Enter your password" class="text-lg p-1 block border-indigo-400 border-2 rounded-sm w-full" required/>
                </div>
                <p class="mb-2">
                   Don't have an account? <a href="{{ route('auth.register') }}" class="text-purple-800">Register here</a>
                </p>
                <input type="submit" value="Submit" class="bg-purple-500 hover:bg-purple-700 text-white text-lg cursor-pointer py-2 px-4"/>
            </form>
        </div>
    </div>
@endsection