<?php

use Ejntaylor\Vellum\Http\Controllers\VellumController;

it('has a route for index', function () {
    $this->get(action([VellumController::class, 'index']))
        ->assertStatus(200)
        ->assertSee('this is the view');
});
