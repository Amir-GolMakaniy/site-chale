<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'سایت چاله' }}</title>
    @include('partials.head')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css"/>
    <script src="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.umd.js"></script>
</head>

<body class="bg-white dark:bg-zinc-800 mx-auto w-11/12 lg:w-9/12">
<flux:header
        class="p-10 mt-4 flex items-center justify-between rounded-2xl bg-zinc-50 shadow-xl dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>

    <a href="{{ route('home') }}" class="flex items-center justify-center gap-2"
       wire:navigate.hover>
        <img src="{{ asset('img/BH_accretion_disk_viz_desktop.png') }}" alt=""
             class="w-10 rounded-xl">
        <span class="hidden lg:flex text-md font-bold">سایت چاله</span>
    </a>

    <livewire:layouts.search/>

    <div class="flex space-x-1">
        <flux:button
                x-data="{
        themes: ['system', 'light', 'dark'],
        index: ['system', 'light', 'dark'].indexOf($flux.appearance)
    }"
                @click="index = (index + 1) % themes.length; $flux.appearance = themes[index]"
                class="cursor-pointer"
        >
            <template x-if="themes[index] == 'system'">
                <flux:icon.computer-desktop/>
            </template>
            <template x-if="themes[index] == 'light'">
                <flux:icon.sun/>
            </template>
            <template x-if="themes[index] == 'dark'">
                <flux:icon.moon/>
            </template>
        </flux:button>

        @guest
            <flux:button href="{{ route('register') }}" wire:navigate.hover>
                عضویت
                <flux:icon.user-plus/>
            </flux:button>
            <flux:button href="{{ route('login') }}" wire:navigate.hover>
                ورود
                <flux:icon.user-circle/>
            </flux:button>
        @endguest

        @auth
            <flux:dropdown position="top" align="end">
                <flux:profile
                        class="cursor-pointer"
                        :initials="auth()->user()->initials()"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator/>

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog"
                                        wire:navigate.hover>{{ __('تنظیمات') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator/>

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle"
                                        class="w-full cursor-pointer">
                            {{ __('خروج') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        @endauth
    </div>
</flux:header>

<div class="hidden lg:flex justify-center">
    <div class="bg-zinc-100 mb-4 dark:bg-zinc-950 w-11/12 rounded-ee-3xl rounded-es-3xl p-6 flex items-center justify-center">
        <nav class="hidden md:flex space-x-10">
            <a href="{{ route('home') }}" wire:navigate.hover
               class="dark:text-white text-black hover:text-zinc-500 transition">خانه</a>
            <a href="{{ route('articles.index') }}" wire:navigate.hover
               class="dark:text-white text-black hover:text-zinc-500 transition">مقالات</a>
            @role('admin|editor')
            <a href="{{ route('admin.articles.index') }}" wire:navigate.hover
               class="dark:text-white text-black hover:text-zinc-500 transition">مقالات ساخته شده</a>
            <a href="{{ route('admin.articles.create') }}" wire:navigate.hover
               class="dark:text-white text-black hover:text-zinc-500 transition">ساخت مقاله</a>
            <a href="{{ route('admin.categories.index') }}" wire:navigate.hover
               class="dark:text-white text-black hover:text-zinc-500 transition">دسته بندی ها</a>
            <a href="{{ route('admin.categories.create') }}" wire:navigate.hover
               class="dark:text-white text-black hover:text-zinc-500 transition">ساخت دسته بندی</a>
            @endrole
        </nav>
    </div>
</div>

<flux:sidebar stashable sticky
              class="lg:hidden border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark"/>

    <a href="{{ route('home') }}" class="flex items-center justify-center gap-2"
       wire:navigate.hover>
        <img src="{{ asset('img/BH_accretion_disk_viz_desktop.png') }}" alt=""
             class="w-10 rounded-xl">
        <span class="flex text-md font-bold">سایت چاله</span>
    </a>

    <flux:navlist variant="outline">
        <flux:navlist.item icon="home" :href="route('home')" wire:navigate.hover>
            خانه
        </flux:navlist.item>
        <flux:navlist.item icon="book-open-text" :href="route('articles.index')" wire:navigate.hover>
            مقالات
        </flux:navlist.item>
        @role('admin|editor')
        <flux:navlist.item icon="book-open-text" :href="route('admin.articles.index')" wire:navigate.hover>
            مقاله های ساخته شده
        </flux:navlist.item>
        <flux:navlist.item icon="book-open-text" :href="route('admin.articles.create')" wire:navigate.hover>
            ساخت مقاله
        </flux:navlist.item>
        <flux:navlist.item icon="book-open-text" :href="route('admin.categories.index')" wire:navigate.hover>
            دسته بندی ها
        </flux:navlist.item>
        <flux:navlist.item icon="book-open-text" :href="route('admin.categories.create')" wire:navigate.hover>
            ساخت دسته بندی
        </flux:navlist.item>
        @endrole
    </flux:navlist>

    <flux:spacer/>

    <flux:navlist variant="outline">
        <form action="{{ route('articles.index') }}" class="flex flex-row">
            <flux:button type="submit" class="cursor-pointer">
                <flux:icon.magnifying-glass class=""/>
            </flux:button>
            <flux:input wire:model.live="search" class="" placeholder="دنبال چی میگردی؟"/>
        </form>
    </flux:navlist>
</flux:sidebar>