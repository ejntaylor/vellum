<?php

namespace Ejntaylor\Vellum\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class VellumController
{
    private $viewsPath = 'views/pages/';

    public function dashboard(): View
    {
        return view('vellum::dashboard');
    }

    public function index(): View
    {
        $files = glob(resource_path($this->viewsPath . '*.blade.php'));
        $posts = [];

        foreach ($files as $file) {
            $fileName = basename($file, '.blade.php');

            $posts[] = [
                'name' => $fileName,
                'created_at' => date("F d Y H:i:s.", filectime($file)),
                'updated_at' => date("F d Y H:i:s.", filemtime($file)),
            ];
        }

        $saved = session('saved', false);

        return view('vellum::index', [
            'files' => $files,
            'posts' => $posts,
            'saved' => $saved
        ]);
    }

    public function create(): View
    {
        return view('vellum::create');
    }

    public function edit(string $slug): View
    {
        $filePath = resource_path($this->viewsPath . $slug . '.blade.php');

        if (!File::exists($filePath)) {
            abort(404, 'File not found.');
        }

        $content = File::get($filePath);

        return view('vellum::edit', [
            'file' => $filePath,
            'content' => $content,
            'slug' => $slug,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $content = $request->input('content');
        $slug = $request->input('slug');
        $filePath = resource_path($this->viewsPath . $slug . '.blade.php');

        if (File::put($filePath, $content) === false) {
            abort(500, 'Error writing to file.');
        }

        return Redirect::route('vellum.index')
            ->with('saved', [
                'slug' => $slug,
            ]);
    }

    public function post(): View
    {
        return view('vellum::post');
    }

    public function categories(): View
    {
        return view('vellum::categories');
    }
}
