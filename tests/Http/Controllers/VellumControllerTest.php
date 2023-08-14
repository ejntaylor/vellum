<?php

use Ejntaylor\Vellum\Http\Controllers\VellumController;
use Illuminate\Support\Facades\Auth;

test('confirm environment is set to testing', function () {
    expect(config('app.env'))->toBe('testing');
});
