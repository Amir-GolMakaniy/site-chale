<div>
    <div class="mt-5 space-y-5">
        @foreach($comments as $comment)
            <div class="space-y-5">
                <div class="bg-zinc-700 rounded-xl p-1 flex items-center">
                    <h1 class="ml-5 p-3 rounded-md bg-zinc-800">{{ $comment->user->name }}</h1>
                    <h1>{{ $comment->comment }}</h1>
                </div>
            </div>
        @endforeach
        <form wire:submit.prevent="save" class="space-y-5">
            <flux:textarea wire:model.live="comment" placeholder="نظر خود را بنویسید"/>
            <flux:button type="submit">ثبت</flux:button>
        </form>
    </div>
</div>