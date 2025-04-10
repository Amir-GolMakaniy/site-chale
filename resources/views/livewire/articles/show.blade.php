<div>
    <div class="flex space-x-2">
        <div class="w-3/4">
            <div class="flex flex-col justify-center bg-zinc-100 dark:bg-zinc-900 p-4 rounded-md space-y-10">
                <div class="">
                    <img src="{{ asset('img/1.png') }}" class="rounded-lg w-full" alt="...">
                </div>
                <div class="">
                    <h1 class="text-4xl font-bold">{{ $article->title }}</h1>
                </div>
                <div class="">
                    <p class="text-2xl">{{ $article->content }}</p>
                </div>
            </div>
            <livewire:comments.comment :commentable-type="\App\Models\Article::class" :commentable-id="$article->id"/>
        </div>

        <div class="w-1/4">
            <livewire:layouts.sidebar/>
        </div>
    </div>
</div>