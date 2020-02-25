@extends('_layouts.master')

@section('nav-toggle')
    @include('_nav.menu-toggle')
@endsection

@section('body')
    <section class="container max-w-8xl mx-auto px-6 md:px-8 py-4">
        <div class="flex flex-col lg:flex-row">
            <nav id="js-nav-menu" class="nav-menu hidden lg:block">
                @include('_nav.menu', ['items' => $page->navigation])
            </nav>

            <div class="DocSearch-content w-full lg:w-3/5 break-words pb-16 lg:pl-4" v-pre>
                <h1 class="mb-0">{{ $page->title }}</h1>
                <h2 class="text-2xl font-medium mt-1 mb-2">{{ $page->description }}</h2>
                <p class="font-bold text-sm mt-2">
                    Author:
                    @if(!is_null($page->author_link))
                        <a href="{{ $page->author_link }}" class="text-blue-500">{{ $page->author }}</a>
                    @else
                        <span class="text-blue-500">{{ $page->author }}</span>
                    @endif

                    <span class="ml-2">
                    Posted On: <span class="text-blue-500">{{ date('F j, Y', $page->date) }}</span>
                </span>
                </p>
                @yield('content')
            </div>
        </div>
    </section>
@endsection
