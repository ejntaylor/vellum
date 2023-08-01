<?php

namespace Ejntaylor\Vellum\Http\Controllers;

use Illuminate\Contracts\View\View;

class VellumController
{

    public function index(): View
    {
        return view('vellum::vellumIndex');
    }

}
