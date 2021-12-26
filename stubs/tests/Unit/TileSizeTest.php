<?php

test('it can return correct tile size', function () {
    $data = [
        'sm' => 'w-1/4',
        'quarter' => 'w-1/4',
        'md' => 'w-1/3',
        'one-third' => 'w-1/3',
        'lg' => 'w-1/2',
        'half' => 'w-1/2',
        'full' => 'w-full',
    ];

    foreach ($data as $size => $class) {
        expect(tile_size($size) == $class)
            ->toBeTrue();
    }
});
