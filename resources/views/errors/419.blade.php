@extends('errors::illustrated-layout') 

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
@section('subMessage', __("Sorry, your session has expired."))
@section('subMessage2', __("Please refresh and try again."))

@section('image')
 <img src="{{ asset('images/expire.svg') }}" style="width: 80%;" alt="419 error">
@endsection

