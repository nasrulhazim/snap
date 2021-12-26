<?php

if (! function_exists('tile_size')) {
    function tile_size($size)
    {
        $class = 'w-full';

        switch ($size) {
            case 'sm':
            case 'quarter':
                    $class = 'w-1/4';

                    break;

                break;
            case 'md':
            case 'one-third':
                    $class = 'w-1/3';

                    break;

                break;
            case 'lg':
            case 'half':
                    $class = 'w-1/2';

                    break;

                break;
            case 'full':
                    $class = 'w-full';

                    break;

                break;
        }

        return $class;
    }
}
