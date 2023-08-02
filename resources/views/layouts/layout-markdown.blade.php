@extends('vellum::layouts.layout')

@push('styles')
    <link href="{{ asset('vendor/ejntaylor/vellum/css/app.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script>
        window.onload = function () {
            var simplemde = new SimpleMDE({element: document.getElementById("content")});
        }
    </script>
@endpush
