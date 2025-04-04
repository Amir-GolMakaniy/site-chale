<div>
    <div class="mt-10 flex items-center">
        <h1 class="text-6xl font-bold">یه مهارت پول ساز یاد بگیر</h1>
        <img class="w-9/12 rounded-2xl border-4 border-zinc-900 dark:border-zinc-100" src="{{ asset('img/1.png') }}">
    </div>
    <div class="mt-50">
        <div class="flex items-center space-x-4">
            <flux:icon.book-open-text/>
            <h1 class="mb-2 text-2xl font-bold">آخرین مقالات</h1>
        </div>
        <hr>
        <div class="mt-10 grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach(App\Models\Article::query()->orderByDesc('id')->paginate(4) as $article)
                <livewire:articles.article :article="$article"/>
            @endforeach
        </div>
    </div>
</div>