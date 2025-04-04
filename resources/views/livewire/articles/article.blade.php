<div>
    <div class="bg-zinc-50 dark:bg-zinc-900 rounded-xl flex flex-col pb-4">
        <div class="p-4">
            <a href="{{ route('article-show',$article->slug) }}" wire:navigate.hover>
                <img class="w-full object-cover duration-200 hover:scale-105 rounded-sm"
                     src="{{ asset('img/1.png') }}">
            </a>
        </div>
        <div class="px-4">
            <a href="{{ route('article-show',$article->slug) }}"
               class="text-2xl font-bold hover:text-zinc-500 line-clamp-2" wire:navigate.hover>{{ $article->title }}</a>
        </div>
        <div class="p-4">
            <a href="{{ route('article-show',$article->slug) }}"
               class="text-1xl font-bold hover:text-zinc-500 line-clamp-2" wire:navigate.hover>{{ $article->content }}</a>
        </div>
    </div>
</div>