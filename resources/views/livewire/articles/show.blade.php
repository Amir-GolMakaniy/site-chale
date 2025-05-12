<div>
    <div class="flex space-x-2">
        <div class="">
            <div class="flex flex-col justify-center bg-zinc-100 dark:bg-zinc-900 p-4 rounded-md space-y-10">
                {{--                @foreach($article->category as $category)--}}
                {{--                    <h1 class="text-4xl font-bold">{{ $category->name }}</h1>--}}
                {{--                @endforeach--}}
                <img src="{{ Storage::url($article->image->path) }}" class="rounded-lg w-full" alt="">
                <h1 class="text-4xl font-bold">{{ $article->title }}</h1>
                <p class="text-2xl">{!! $article->content !!}</p>
            </div>

            <livewire:comments.comment :commentable-type="\App\Models\Article::class" :commentable-id="$article->id"/>
        </div>

        <div class="">
            <livewire:layouts.sidebar/>
        </div>
    </div>
</div>