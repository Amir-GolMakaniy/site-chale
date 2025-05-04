<div>
    <form wire:submit="save" class="bg-zinc-900 py-4 rounded-md">
        <h1 class="text-2xl mr-4">عکس</h1>
        <flux:input type="file" class="my-4" wire:model="form.image"/>

        <h1 class="text-2xl mr-4">عنوان</h1>
        <flux:input class="my-4" wire:model="form.title" :clearable="true"/>

        <h1 class="text-2xl my-4 mr-4">متن</h1>
        <flux:textarea class="mt-4" wire:model="form.content"/>

        <flux:button class="cursor-pointer mt-4 mr-4" type="submit">ساخت</flux:button>
    </form>
</div>