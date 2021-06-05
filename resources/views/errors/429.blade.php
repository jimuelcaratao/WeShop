@extends('errors::illustrated-layout')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests!'))

@section('image')
 <img src="{{ asset('images/toomanyrequest.svg') }}" style="width: 80%;" alt="429s error">
@endsection
