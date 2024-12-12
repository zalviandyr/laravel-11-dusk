<?php

use Laravel\Dusk\Browser;

test('register new user with valid data', function () {
    $user = [
        'name' => 'test',
        'email' => 'test@laravel.com',
        'password' => '12345678',
    ];

    $this->browse(function (Browser $browser) use ($user) {
        $browser->visit('/register')
                ->type('name', $user['name'])
                ->type('email', $user['email'])
                ->type('password', $user['password'])
                ->type('password_confirmation', $user['password'])
                ->press('Register')
                ->assertPathIs('/login');
    });
});

test('register new user with invalid data', function () {
    $user = [
        'name' => 'test',
        'email' => 'test@laravel.com',
        'password' => '1234',
    ];

    $this->browse(function (Browser $browser) use ($user) {
        $browser->visit('/register')
                ->type('name', $user['name'])
                ->type('email', $user['email'])
                ->type('password', $user['password'])
                ->type('password_confirmation', $user['password'])
                ->press('Register')
                ->assertPathIs('/register')
                ->assertVisible('.alert.alert-danger');
    });
});
