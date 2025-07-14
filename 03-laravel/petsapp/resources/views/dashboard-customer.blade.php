@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
@include('layouts.navbar')

<!-- Authentication -->
<h1 class="text-6xl text-purple-200 mb-10">Welcome: Customer</h1>

<form method="POST" action="{{ route('logout') }}" class="text-purple-300">
    @csrf
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); this.closest('form').submit();"
       class="underline hover:text-purple-400 transition">
        Log Out
    </a>
</form>
@endsection
