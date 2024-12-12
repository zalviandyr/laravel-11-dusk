<?php

use App\Models\Book;
use App\Models\User;
use Laravel\Dusk\Browser;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->book = Book::factory()->create();
});

test('edit a book', function () {
    $this->browse(function (Browser $browser) {
        $id = $this->book->id;

        $browser->loginAs($this->user->id)
                ->visit("/book/$id/edit")
                ->type('title', 'This is title (Edited)')
                ->type('synopsis', 'This is synopsis (Edited)')
                ->select('author_id', $this->user->id)
                ->press('Save')
                ->assertPathIs('/book')
                ->assertVisible('.alert.alert-success');
    });
});
