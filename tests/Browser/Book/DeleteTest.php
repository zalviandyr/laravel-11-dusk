<?php

use App\Models\Book;
use App\Models\User;
use Laravel\Dusk\Browser;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->book = Book::factory()->create();
});

test('delete a book', function () {
    $this->browse(function (Browser $browser) {
        $browser->loginAs($this->user->id)
                ->visit('/book')
                ->press('Hapus')
                ->assertSee('List Book')
                ->assertVisible('.alert.alert-success');
    });
});
