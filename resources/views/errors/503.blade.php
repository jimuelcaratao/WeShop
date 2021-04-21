@extends('errors::illustrated-layout') 

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable'))
@section('subMessage', __("Don't worry though, there is always a way to go back home."))

@section('image')
 <img src="{{ asset('images/notavailable.svg') }}" style="width: 80%;" alt="503 error">
@endsection
