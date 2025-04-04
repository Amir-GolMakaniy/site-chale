<div>
    <div class="flex flex-col justify-center bg-zinc-100 p-4 mb-4 rounded-md space-y-4">
        <div class="">
            <img src="{{ asset('img/1.png') }}" class="rounded-lg w-full">
        </div>
        <div class="">
            <h1 class="text-4xl font-bold">{{ $article->title }}</h1>
        </div>
        <div class="">
            <p class="text-2xl">{{ $article->body }}</p>
        </div>
    </div>
</div>