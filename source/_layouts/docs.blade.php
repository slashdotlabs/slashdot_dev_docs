@extends('_layouts.master')

@push('meta')
    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <meta name="generator" content="tighten_jigsaw_doc">
    @endif

    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css"/>
    @endif
@endpush

@section('body')
    <header class="flex items-center shadow bg-white border-b h-20 mb-8 py-4" role="banner">
        <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
            <div class="flex items-center">
                <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                    <h1 class="text-lg md:text-xl text-blue-900 font-semibold hover:text-blue-600 my-0 pr-4">{{ $page->siteName }}</h1>
                </a>
            </div>

            <div class="flex flex-1 justify-end items-center text-right md:pl-10">
                @if ($page->docsearchApiKey && $page->docsearchIndexName)
                    @include('_nav.search-input')
                @endif
            </div>
        </div>

        @yield('nav-toggle')
    </header>

    <main role="main" class="w-full flex-auto">
        @yield('content')
    </main>
@endsection
