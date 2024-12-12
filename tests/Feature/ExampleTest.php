<?php

it('data_get from array of object', function () {
    $chars = [
        ['value' => 'A'],
        ['value' => 'B'],
    ];

    expect(data_get($chars, '0.value'))->toBe('A');
    expect(data_get($chars, '1.value'))->toBe('B');
});
