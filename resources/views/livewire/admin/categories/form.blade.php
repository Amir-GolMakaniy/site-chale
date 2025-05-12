<div>
    <form wire:submit="save" class="bg-zinc-100 dark:bg-zinc-900 p-10 rounded-md">

        <h1 class="text-2xl mr-4">عنوان</h1>
        <flux:input class="my-4" wire:model="form.name" :clearable="true"/>

        <flux:button class="cursor-pointer mt-4 mr-4" type="submit">ساخت</flux:button>
    </form>
</div>