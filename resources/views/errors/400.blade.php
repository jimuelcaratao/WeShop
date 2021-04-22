@extends('errors::illustrated-layout') 

@section('title', __('Bad Request'))
@section('code', '400')
@section('message', __("You've Sent A Bad Request!"))

@section('image')
 <img src="{{ asset('images/badrequest.svg') }}" style="width: 80%;" alt="400 error">
@endsection
