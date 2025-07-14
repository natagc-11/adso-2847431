@extends('layouts.app')
@section('title', 'Create Pet')

@section('content')
@include('layouts.navbar')

<h1 class="text-3xl pt-30 flex gap-2 items-center font-bold mb-10 pb-2 border-b-2"
    style="background-image: radial-gradient(ellipse at bottom, #a78bfa, #e9d5ff, #6d28d9); background-clip: text; -webkit-background-clip: text; color: transparent;">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="size-12 text-purple-600">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    Create Pet
</h1>

<form method="post" action="{{ route('pets.store') }}" class="pt-6 pb-20" enctype="multipart/form-data">
    @csrf

    <fieldset class="fieldset w-md bg-purple-100 border border-purple-300 p-6 rounded-box shadow">

        @if (count($errors->all()) > 0)
            <div class="flex flex-col gap-1 my-4">
                @foreach ($errors->all() as $message)
                    <div class="badge badge-error text-white gap-2 p-3 bg-red-400">
                        <svg class="size-[1em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g fill="currentColor">
                                <rect x="1.972" y="11" width="20.056" height="2"
                                    transform="translate(-4.971 12) rotate(-45)"></rect>
                                <path
                                    d="m12,23c-6.065,0-11-4.935-11-11S5.935,1,12,1s11,4.935,11,11-4.935,11-11,11Zm0-20C7.038,3,3,7.037,3,12s4.038,9,9,9,9-4.037,9-9S16.962,3,12,3Z">
                                </path>
                            </g>
                        </svg>
                        {{ $message }}
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Imagen --}}
        <div class="avatar max-auto flex flex-col gap-2 items-center">
            <div id="upload" class="mask mask-squircle w-36 cursor-pointer hover:scale-105 transition-transform border border-purple-300">
                <img id="preview" src="{{ asset('images/no-photo.png') }}" alt="No photo" />
            </div>
            <small class="flex items-center gap-2 text-sm text-purple-700">
                <img class="w-6 h-6" src="{{ asset('images/nuve.gif') }}" alt="">
                Upload photo
            </small>
        </div>
        <input type="file" name="image" id="image" class="hidden">

        {{-- Campos --}}
        <label class="fieldset-label mt-4 text-purple-800 font-semibold">Pet Name:</label>
        <input type="text" name="name" class="input rounded-full w-full" placeholder="Max" value="{{ old('name') }}" />

        <label class="fieldset-label mt-4 text-purple-800 font-semibold">Kind:</label>
        <select name="kind" class="select rounded-full w-full">
            <option value="">Select Kind...</option>
            <option value="Dog" @if(old('kind')=='Dog') selected @endif>Dog</option>
            <option value="Cat" @if(old('kind')=='Cat') selected @endif>Cat</option>
            <option value="Bird" @if(old('kind')=='Bird') selected @endif>Bird</option>
            <option value="Fish" @if(old('kind')=='Fish') selected @endif>Fish</option>
            <option value="Rabbit" @if(old('kind')=='Rabbit') selected @endif>Rabbit</option>
        </select>

        <label class="fieldset-label mt-4 text-purple-800 font-semibold">Weight (kg):</label>
        <input type="number" step="0.1" name="weight" class="input rounded-full w-full" placeholder="5.5" value="{{ old('weight') }}"/>

        <label class="fieldset-label mt-4 text-purple-800 font-semibold">Age (years):</label>
        <input type="number" name="age" class="input rounded-full w-full" placeholder="2" value="{{ old('age') }}"/>

        <label class="fieldset-label mt-4 text-purple-800 font-semibold">Breed:</label>
        <input type="text" name="breed" class="input rounded-full w-full" placeholder="Golden Retriever" value="{{ old('breed') }}"/>

        <label class="fieldset-label mt-4 text-purple-800 font-semibold">Location:</label>
        <input type="text" name="location" class="input rounded-full w-full" placeholder="Bogotá, Colombia" value="{{ old('location') }}"/>

        <label class="fieldset-label mt-4 text-purple-800 font-semibold">Description:</label>
        <textarea name="description" class="textarea w-full" rows="4" placeholder="Tell us about this pet...">{{ old('description') }}</textarea>

        <button class="btn mt-6 p-6 rounded-full text-white bg-purple-800 hover:bg-purple-700 w-full">Create Pet</button>
    </fieldset>
</form>
@endsection

@section('js')
<script>
    const upload = document.getElementById('upload');
    const image = document.getElementById('image');
    const preview = document.getElementById('preview');

    upload.addEventListener('click', function () {
        image.click();
    });

    image.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            preview.src = URL.createObjectURL(this.files[0]);
        }
    });
</script>
@endsection
