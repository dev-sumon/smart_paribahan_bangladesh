@extends('forntend.layouts.master', ['page_slug' => 'dashboard'])
@section('title', 'Stand Manager Dashboard')
@section('content')
    <div class="conatiner">
        <h1 class="text-center">Hello Manager</h1>
    <form action="{{ route('stand_manager.logout') }}" method="POST">
        @csrf
        <input type="submit" value="Logout">
    </form>
    </div>
@endsection