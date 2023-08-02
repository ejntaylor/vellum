@extends('vellum::layout')

@section('title', 'Create Post')

@section('content')

    <h2 class="font-semibold mb-4">Create a Post</h2>

    <form action="/vellum/posts/update" method="POST">
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
            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save
            </button>
        </div>
    </form>
@endsection
