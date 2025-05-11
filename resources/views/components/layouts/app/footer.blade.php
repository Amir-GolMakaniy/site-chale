<flux:footer
        class="p-10 mt-8 rounded-2xl bg-zinc-50 shadow-inner dark:bg-zinc-900 dark:border dark:border-zinc-700 mb-4">

    <div class="flex flex-col lg:flex-row justify-between items-center gap-6">

        <a href="{{ route('home') }}" class="flex items-center justify-center gap-2"
           wire:navigate.hover>
            <img src="{{ asset('img/BH_accretion_disk_viz_desktop.png') }}" alt=""
                 class="w-20 rounded-xl">
            <span class="hidden lg:flex text-md font-bold">سایت چاله</span>
        </a>

        <nav class="flex flex-wrap justify-center gap-4 text-md text-zinc-600 dark:text-zinc-300">
            <a href="{{ route('home') }}" class="dark:text-white text-black hover:text-zinc-500 transition"
               wire:navigate.hover>خانه</a>
            <a href="{{ route('articles.index') }}" class="dark:text-white text-black hover:text-zinc-500 transition"
               wire:navigate.hover>مقالات</a>
        </nav>
    </div>

    <div class="mt-6 text-center text-xs text-zinc-500 dark:text-zinc-400">
        © {{ now()->year }} SiteChale. همه حقوق محفوظ است.
    </div>
</flux:footer>

@fluxScripts()
</body>
</html>