@extends('errors::illustrated-layout') 

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('No Unauthorization Found!'))
@section('subMessage', __("Sorry, the page you're looking for doesn't exist."))
@section('subMessage2', __("To access it please login first."))

@section('image')
 <img src="{{ asset('images/authorized.svg') }}" style="width: 80%;" alt="401 error">
@endsection
