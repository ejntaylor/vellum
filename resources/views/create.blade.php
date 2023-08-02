@extends('vellum::layouts.layout-markdown')

@push('title')
    Create a Post
@endpush

@push('additional-content')
    <div class="mt-2 md:flex md:items-center md:justify-between">
        <div class="mt-4 flex flex-shrink-0 md:ml-4 md:mt-0">
            <button onclick="document.getElementById('post-create').submit();"
                    class="ml-3 inline-flex items-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                Publish
            </button>
        </div>
    </div>
@endpush

@section('content')
    <form action="/vellum/posts/update" method="POST" id="post-create">
        @csrf

        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Post Slug</label>
            <div class="mt-2">
                <input type="text" name="slug" id="slug"
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                       placeholder="my-first-post">
            </div>
        </div>


        <div class="col-span-full">
            <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Post Content</label>
            <div class="mt-2">
                <textarea id="content" name="content" rows="3"
                          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Go on! Write a few sentences.</p>
        </div>

    </form>
@endsection
