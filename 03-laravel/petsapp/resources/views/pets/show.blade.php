@extends('layouts.app')
@section('title', 'Show Pet')

@section('content')
@include('layouts.navbar')

<h1 class="text-3xl pt-30 flex gap-2 items-center font-bold mb-10 pb-2 border-b-2" 
    style="background-image: radial-gradient(ellipse at bottom, #a78bfa, #e9d5ff, #6d28d9); background-clip: text; -webkit-background-clip: text; color: transparent;">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
         stroke-width="1.5" stroke="currentColor" class="size-4 text-purple-600">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
    </svg>
    Show Pet
</h1>

<ul class="list bg-white rounded-box shadow-md text-purple-700">
    <div id="upload" class="mask mask-squircle w-30 flex justify-center items-center mx-auto p-2">
        <img src="{{ asset('images/'.$pet->image) }}" class="w-full h-auto object-cover rounded-lg border border-purple-300" />
    </div>

    <li class="list-row border-b border-purple-100 p-4">
        <div class="font-semibold">Name</div>
        <div class="text-xs uppercase font-bold text-purple-500">{{ $pet->name }}</div>
    </li>

    <li class="list-row border-b border-purple-100 p-4">
        <div class="font-semibold">Kind</div>
        <div class="text-xs uppercase font-bold text-purple-500">{{ $pet->kind }}</div>
    </li>

    <li class="list-row border-b border-purple-100 p-4">
        <div class="font-semibold">Weight</div>
        <div class="text-xs uppercase font-bold text-purple-500">{{ $pet->weight }}</div>
    </li>

    <li class="list-row border-b border-purple-100 p-4">
        <div class="font-semibold">Age</div>
        <div class="text-xs uppercase font-bold text-purple-500">{{ $pet->age }}</div>
    </li>

    <li class="list-row border-b border-purple-100 p-4">
        <div class="font-semibold">Breed</div>
        <div class="text-xs uppercase font-bold text-purple-500">{{ $pet->breed }}</div>
    </li>

    <li class="list-row border-b border-purple-100 p-4">
        <div class="font-semibold">Location</div>
        <div class="text-xs uppercase font-bold text-purple-500">{{ $pet->location }}</div>
    </li>

    <li class="list-row p-4">
        <div class="font-semibold">Description</div>
        <div class="text-xs uppercase font-bold text-purple-500">{{ $pet->description }}</div>
    </li>
</ul>

@endsection
