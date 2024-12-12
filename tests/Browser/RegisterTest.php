<?php

use Laravel\Dusk\Browser;

test('register a new user', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/register')
                ->assertSee('Register');
    });
});
