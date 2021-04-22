@extends('errors::illustrated-layout') 

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('subMessage', __("The page your're trying to access has restricted access."))
@section('subMessage2', __("Please refer to your system administrator."))

@section('image')
 <img src="{{ asset('images/forbidden.svg') }}" style="width: 80%;" alt="403 error">
@endsection

