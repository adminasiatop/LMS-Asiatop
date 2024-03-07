@extends('layouts.frontend.master')

@section('title', 'Landing Page')

@section('hero')
    @include('layouts.frontend._hero')
@endsection

@section('content')
    @include('layouts.frontend._learning')
    @include('layouts.frontend._activity')
    @include('layouts.frontend._value')
    @include('layouts.frontend._video')
    @include('layouts.frontend._contactus')
    {{-- @include('layouts.frontend._footer') --}}

@endsection
