<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;

test('login existed user', function () {
    User::create([
        'name' => 'test',
        'email' => 'test@laravel.com',
        'password' => Hash::make('12345678'),
    ]);

    $this->browse(function (Browser $browser) {
        $browser->visit('/login')
                ->type('email', 'test@laravel.com')
                ->type('password', '12345678')
                ->press('Login')
                ->assertPathIs('/book');
    });
});

test('login non-existed user', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/login')
                ->type('email', 'test@laravel.com')
                ->type('password', '12345678')
                ->press('Login')
                ->assertPathIs('/login')
                ->assertVisible('.alert.alert-danger');
    });
});
