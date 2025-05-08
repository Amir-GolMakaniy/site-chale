<div>
    <form wire:submit="save" class="bg-zinc-900 py-4 rounded-md">
        <h1 class="text-2xl mr-4">عکس</h1>
        <flux:input type="file" class="my-4" wire:model="form.image"/>

        <h1 class="text-2xl mr-4">عنوان</h1>
        <flux:input class="my-4" wire:model="form.title" :clearable="true"/>

        <h1 class="text-2xl my-4 mr-4">متن</h1>
        <div wire:ignore>
            <script>
                tinymce.init({
                    selector: 'textarea',

                    setup: function (editor) {
                        editor.on('init change', function () {
                            editor.save();
                        });
                        editor.on('blur', function (e) {
                            @this.
                            set('form.content', editor.getContent());
                        });
                    },

                    plugins: [
                        // Core editing features
                        'anchor',
                        'autolink',
                        'charmap',
                        'codesample',
                        'emoticons',
                        'image',
                        'link',
                        'lists',
                        'media',
                        'searchreplace',
                        'table',
                        'visualblocks',
                        'wordcount',

                        // Your account includes a free trial of TinyMCE premium features
                        // Try the most popular premium features until May 22, 2025:
                        'checklist',
                        'mediaembed',
                        'casechange',
                        'formatpainter',
                        'pageembed',
                        'a11ychecker',
                        'tinymcespellchecker',
                        'permanentpen',
                        'powerpaste',
                        'advtable',
                        'advcode',
                        'editimage',
                        'advtemplate',
                        'ai',
                        'mentions',
                        'tinycomments',
                        'tableofcontents',
                        'footnotes',
                        'mergetags',
                        'autocorrect',
                        'typography',
                        'inlinecss',
                        'markdown',
                        'importword',
                        'exportword',
                        'exportpdf'
                    ],

                    toolbar: 'undo redo |' +
                        ' blocks fontfamily fontsize |' +
                        ' bold italic underline strikethrough |' +
                        ' link image media table mergetags |' +
                        ' addcomment showcomments |' +
                        ' spellcheckdialog a11ycheck typography |' +
                        ' align lineheight |' +
                        ' checklist numlist bullist indent outdent |' +
                        ' emoticons charmap |' +
                        ' removeformat',

                    language: 'fa',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [
                        {value: 'First.Name', title: 'First Name'},
                        {value: 'Email', title: 'Email'},
                    ],

                    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
                });
            </script>

            <textarea>{!! $article ? $article->content : '' !!}</textarea>
        </div>

        <flux:button class="cursor-pointer mt-4 mr-4" type="submit">ساخت</flux:button>
    </form>
</div>