@extends('_layouts.master')

@push('meta')
    <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">
@endpush

@section('body')
    <header class="flex items-center h-20 py-4 shadow" role="banner">
        <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
            <div class="flex items-center">
                <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                    <h1 class="text-lg md:text-xl text-blue-900 font-semibold hover:text-blue-600 my-0 pr-4">{{ $page->siteName }}</h1>
                </a>
            </div>

            <div id="vue-search" class="flex flex-1 justify-end items-center">
                <search></search>

                {{--                    @include('_nav.menu')--}}

                {{--                    @include('_nav.menu-toggle')--}}
            </div>
        </div>
    </header>

    {{--        @include('_nav.menu-responsive')--}}

    <main role="main" class="container mx-auto px-6 md:px-8 py-8 flex-auto">
        @yield('main')
    </main>

@endsection
