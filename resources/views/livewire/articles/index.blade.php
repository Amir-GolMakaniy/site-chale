<div>
    <div class="mb-4 grid grid-cols-4 gap-4">
        @foreach($articles as $article)
            <livewire:articles.article :article="$article"/>
        @endforeach
    </div>
    {{ $articles->links() }}
</div>
