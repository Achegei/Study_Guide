{{-- resources/views/profile/show.blade.php --}}
@extends('layouts.guest') {{-- Or your main app layout if this is for logged-in users --}}

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">{{ __('User Profile') }}</h1>

    {{-- Success/Error Messages --}}
    @if (session('status'))
        <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-800 rounded shadow-sm">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-800 rounded shadow-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Update Password Form --}}
    <div class="bg-white shadow-xl rounded-lg p-6 mb-8 border border-gray-200">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('Update Password') }}</h3>
        <p class="text-gray-600 mb-6">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>

        <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @method('PUT') {{-- IMPORTANT: This is crucial for the PUT request --}}

            <div class="mb-4">
                <label for="current_password" class="block text-sm font-medium text-gray-700">{{ __('Current Password') }}</label>
                <input id="current_password" type="password" name="current_password" required autocomplete="current-password"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                @error('current_password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">{{ __('New Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Save Changes') }}
                </button>
            </div>
        </form>
    </div>

    {{-- You can add other profile sections here if needed, e.g., Update Profile Information --}}
    {{-- Example:
    <div class="bg-white shadow-xl rounded-lg p-6 mb-8 border border-gray-200">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('Update Profile Information') }}</h3>
        <form method="POST" action="{{ route('user-profile-information.update') }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" value="{{ Auth::user()->name }}" required autofocus
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
            </div>
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
            </div>
            <div class="flex items-center justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Save Profile') }}
                </button>
            </div>
        </form>
    </div>
    --}}

</div>
@endsection
