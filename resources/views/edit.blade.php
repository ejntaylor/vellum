@extends('vellum::layouts.layout-markdown')

@section('title', 'Create Post')

@section('content')

    <form action="/vellum/posts/update" method="POST">
        @csrf


        <div class="-ml-4 -mt-2 mb-4 flex flex-wrap items-center justify-between sm:flex-nowrap">
            <div class="ml-4 mt-2">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Post Edit: {{$slug}}</h3>
            </div>
            <div class="ml-4 mt-2 flex-shrink-0">
                <button type="submit"
                        class="relative inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update
                </button>
            </div>
        </div>

        <div>
            <div class="mt-2">
                <div id="tabs-1-panel-1" class="-m-0.5 rounded-lg p-0.5" aria-labelledby="tabs-1-tab-1" role="tabpanel"
                     tabindex="0">
                    <label for="content" class="sr-only">Comment</label>
                    <div>
                        <input type="hidden" name="slug" value="{{$slug}}">
                        <textarea rows="5" name="content" id="content"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                  placeholder="Add your content...">{{$content}}</textarea>
                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection
