<flux:footer
        class="p-10 mt-8 rounded-2xl bg-zinc-50 shadow-inner dark:bg-zinc-900 dark:border dark:border-zinc-700">

    <div class="flex flex-col lg:flex-row justify-between items-center gap-6">

        {{-- لوگو و نام برند --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2" wire:navigate.hover>
            <x-app-logo class="h-6 w-6"/>
        </a>

        {{-- لینک‌های سریع --}}
        <nav class="flex flex-wrap justify-center gap-4 text-sm text-zinc-600 dark:text-zinc-300">
            <a href="{{ route('home') }}" class="hover:text-primary-500 transition" wire:navigate.hover>درباره ما</a>
            <a href="{{ route('home') }}" class="hover:text-primary-500 transition" wire:navigate.hover>تماس</a>
            <a href="{{ route('articles-index') }}" class="hover:text-primary-500 transition"
               wire:navigate.hover>مقالات</a>
            <a href="{{ route('home') }}" class="hover:text-primary-500 transition" wire:navigate.hover>سؤالات
                متداول</a>
        </nav>
    </div>

    {{-- کپی‌رایت --}}
    <div class="mt-6 text-center text-xs text-zinc-500 dark:text-zinc-400">
        © {{ now()->year }} SiteChale. همه حقوق محفوظ است.
    </div>
</flux:footer>

@fluxScripts()
</body>
</html>