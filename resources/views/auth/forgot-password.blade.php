@extends('layouts.guest') @section('content')
Logo
Forgot Your Password?
{{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
@session('status')
{{ $value }}
@endsession @if ($errors->any())
@foreach ($errors->all() as $error)
{{ $error }}
@endforeach
@endif
@csrf
Email 
{{ __('Email Password Reset Link') }}
@endsection