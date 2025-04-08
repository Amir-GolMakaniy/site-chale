<div>
    <form action="{{ route('articles.index') }}" class="hidden lg:flex items-center">
        <flux:button type="submit" class="cursor-pointer">
            <flux:icon.magnifying-glass class=""/>
        </flux:button>
        <flux:input wire:model.live="search" class="" placeholder="دنبال چی میگردی؟"/>
    </form>

    @if(!empty($articles))
        <flux:navlist>
            @foreach($articles as $article)
                <flux:button-or-link href="{{ route('articles.show',$article->slug) }}">
                    <flux:navlist.item>
                        {{ $article->title }}
                    </flux:navlist.item>
                </flux:button-or-link>
            @endforeach
        </flux:navlist>
    @endif
</div>