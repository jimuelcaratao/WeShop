@extends('errors::illustrated-layout') 

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Internal Server Error'))
@section('subMessage', __("We are working towards creating something better."))
@section('subMessage2', __("Won't be long..."))

@section('image')
 <img src="{{ asset('images/server.svg') }}" style="width: 80%;" alt="500 error">
@endsection


