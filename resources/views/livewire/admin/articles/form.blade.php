<div>
    <form wire:submit="save" class="bg-zinc-100 dark:bg-zinc-900 p-10 rounded-md" wire:ignore>
        <h1 class="text-2xl mr-4">عکس</h1>
        <flux:input type="file" class="my-4" wire:model="form.image"/>

        <h1 class="text-2xl mr-4">دسته بندی</h1>
        <flux:select class="my-4" wire:model.live="form.category">
            @foreach(App\Models\Category::all() as $category)
                <flux:select.option value="{{ $category->id }}">
                    {{ $category->name }}
                </flux:select.option>
            @endforeach
        </flux:select>

        <h1 class="text-2xl mr-4">عنوان</h1>
        <flux:input class="my-4" wire:model.live="form.title" :clearable="true"/>

        <h1 class="text-2xl my-4 mr-4">متن</h1>
        <div id="editor" class="bg-zinc-100 dark:bg-zinc-900 text-black dark:text-white"></div>
        <script>
            const {
                ClassicEditor,
                Essentials,
                Bold,
                Italic,
                Font,
                Paragraph,
                Heading,
                BlockQuote,
                Link,
                List,
                Code,
                CodeBlock
            } = CKEDITOR;

            ClassicEditor
                .create(document.querySelector('#editor'), {
                    plugins: [
                        ClassicEditor,
                        Essentials,
                        Bold,
                        Italic,
                        Font,
                        Paragraph,
                        Heading,
                        BlockQuote,
                        Link,
                        List,
                        Code,
                        CodeBlock
                    ],
                    toolbar: [
                        'undo', 'redo', '|',
                        'heading', '|',
                        'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', '|',
                        'link', 'blockQuote', 'code', 'codeBlock', '|',
                        'bulletedList', 'numberedList'
                    ]
                }).then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.
                    set('form.content', editor.getData());
                })
            })
                .catch(error => {
                    console.error(error);
                });
        </script>

        <flux:button class="cursor-pointer mt-4 mr-4" type="submit">ساخت</flux:button>
    </form>
</div>