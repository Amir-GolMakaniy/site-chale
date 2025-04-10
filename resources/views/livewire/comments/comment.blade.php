<div>
    @foreach($comments as $comment)
        <h1>{{ $comment->comment }}</h1>
    @endforeach
    <form wire:submit.prevent="save" class="">
        <flux:input wire:model.live="comment"/>
        <flux:button type="submit"/>
    </form>
</div>