<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
        <table class="w-full text-sm text-left rtl:text-right text-zinc-500 dark:text-zinc-400">
            <thead class="text-xs text-zinc-700 uppercase bg-zinc-100 dark:bg-zinc-700 dark:text-zinc-400">
            <tr class="">
                <th scope="col" class="px-6 py-3">
                    عکس
                </th>
                <th scope="col" class="px-6 py-3">
                    اسم
                </th>
                <th scope="col" class="px-6 py-3">
                    نویسنده
                </th>
                <th scope="col" class="px-6 py-3">
                    ویرایش
                </th>
                <th scope="col" class="px-6 py-3">
                    حذف
                </th>
            </tr>
            </thead>
            <tbody class="">
            @foreach($articles as $article)
                <tr class="bg-white border-b dark:bg-zinc-800 dark:border-zinc-700 border-zinc-200 hover:bg-zinc-50 dark:hover:bg-zinc-600">
                    <td class="px-6 py-4 font-medium text-zinc-900 whitespace-nowrap dark:text-white">
                        <img class="w-15" src="{{ Storage::url($article->image->path) }}" alt="">
                    </td>
                    <td class="px-6 py-4 font-medium text-zinc-900 whitespace-nowrap dark:text-white">
                        {{ $article->title }}
                    </td>
                    <td class="px-6 py-4 font-medium text-zinc-900 whitespace-nowrap dark:text-white">
                        {{ $article->user->name }}
                    </td>
                    <td class="flex items-center px-6 py-4">
                        <flux:link href="{{ route('admin.articles.edit',$article->slug) }}">
                            <flux:icon.pencil-square/>
                        </flux:link>
                    </td>
                    <td class="px-6 py-4">
                        <flux:icon.x-mark wire:click="delete({{ $article->id }})" class="cursor-pointer"/>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>