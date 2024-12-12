<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Dusk\Browser;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('create a book', function () {
    $this->browse(function (Browser $browser) {
        $browser->loginAs($this->user->id)
                ->visit('/book/create')
                ->type('title', 'This is title')
                ->type('synopsis', 'This is synopsis')
                ->select('author_id', $this->user->id)
                ->press('Submit')
                ->assertPathIs('/book')
                ->assertVisible('.alert.alert-success');
    });
});
