<div>
    <div class="grid grid-cols-4">
        <flux:select wire:model.live="category">
            <flux:select.option value="">
                همه دسته‌ها
            </flux:select.option>
            @foreach(App\Models\Category::all() as $category)
                <flux:select.option value="{{ $category->id }}">
                    {{ $category->name }}
                </flux:select.option>
            @endforeach
        </flux:select>
    </div>

    <hr class="my-4">

    <div class="mb-4 grid grid-cols-4 gap-4">
        @foreach($articles as $article)
            <livewire:articles.article :$article :key="$article->id"/>
        @endforeach
    </div>
</div>
