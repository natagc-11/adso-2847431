<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Pet</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1 class="text-4xl mx-auto my-10 border-b border-purple-500 w-[fit-content] text-purple-300">Show Pet</h1>

    <div class="card card-side bg-[#2e1065] border border-purple-700 w-2/3 mx-auto text-purple-100">
        <figure>
            <img
                src="{{ asset('images/'.$pet->image) }}"
                alt="{{ $pet->name }}"
                class="max-h-[300px] object-cover"
            />
        </figure>
        <div class="card-body">
            <h2 class="card-title text-purple-300">{{ $pet->name }}</h2>
            <ul class="space-y-1">
                <li>
                    <strong>Kind: </strong>
                    @if ($pet->kind == 'Dog')
                        <div class="badge bg-purple-700 text-white border-none">{{ $pet->kind }}</div>
                    @else
                        <div class="badge bg-pink-700 text-white border-none">{{ $pet->kind }}</div>
                    @endif
                </li>
                <li><strong>Weight: </strong>{{ $pet->weight }}</li>
                <li><strong>Age: </strong>{{ $pet->age }}</li>
                <li><strong>Breed: </strong>{{ $pet->breed }}</li>
                <li><strong>Location: </strong>{{ $pet->location }}</li>
                <li>
                    <strong>Status: </strong>
                    @if ($pet->status == 0)
                        <div class="badge bg-violet-600 text-white border-none">Available</div>
                    @else
                        <div class="badge bg-rose-700 text-white border-none">Unavailable</div>
                    @endif
                </li>
            </ul>
            <strong class="mt-3">Description:</strong>
            <p>{{ $pet->description }}</p>

            <div class="card-actions justify-end">
                <a href="{{ url('view/blade') }}" class="btn bg-purple-700 hover:bg-purple-800 text-white border-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l1.22 1.22a.75.75 0 1 1-1.06 1.06l-2.5-2.5a.75.75 0 0 1 0-1.06l2.5-2.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>
</html>
