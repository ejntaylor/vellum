@extends('vellum::layouts.layout-markdown')

@push('title')
    Edit: {{$slug}}
@endpush

@push('additional-content')
    <div class="mt-2 md:flex md:items-center md:justify-between">
        <div class="mt-4 flex flex-shrink-0 md:ml-4 md:mt-0">
            <a href="/{{$slug}}" target="_blank"
               class="inline-flex items-center rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-white/20">View</a>
            <button onclick="document.getElementById('post-delete').submit();"
                    class="ml-3 inline-flex items-center rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">
                Delete
            </button>
            <button onclick="document.getElementById('post-edit').submit();"
                    class="ml-3 inline-flex items-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                Publish
            </button>
        </div>
    </div>
@endpush


@section('content')

    <form action="/vellum/posts/delete/" method="POST" id="post-delete" onsubmit="return confirm('Are you sure you want to delete this post?');">
        @method('DELETE')
        @csrf
        <input type="hidden" name="slug" value="{{$slug}}">
    </form>

    <form action="/vellum/posts/update" method="POST" id="post-edit">
        @csrf

        <div id="tabs-1-panel-1" class="-m-0.5 rounded-lg p-0.5" aria-labelledby="tabs-1-tab-1" role="tabpanel"
             tabindex="0">
            <label for="content" class="sr-only">Comment</label>
            <div>
                <input type="hidden" name="slug" value="{{$slug}}">
                <textarea name="content" id="content"
                          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                          placeholder="Add your content...">{{$content}}</textarea>

                <label for="front-matter">Front Matter</label>
                <textarea name="front-matter" id="front-matter"
                          class="mb-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                          placeholder="Add your front matter...">{{$frontMatter}}</textarea>
            </div>
        </div>

    </form>

@endsection
