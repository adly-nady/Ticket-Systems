@extends('layouts.app')

@section('content')
    <div class="container">
        <router-view :user="{{ Auth::user() }}"></router-view>
    </div>
@endsection
