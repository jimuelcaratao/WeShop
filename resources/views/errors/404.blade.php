{{-- @extends('errors::minimal') --}}
{{-- @extends('errors::layout')  --}}
@extends('errors::illustrated-layout') 

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Page Not Found!'))
@section('subMessage', __("Sorry, the page you're looking for doesn't exist."))

@section('image')
 <img src="{{ asset('images/404.svg') }}" style="width: 80%;" alt="404 error">
@endsection
