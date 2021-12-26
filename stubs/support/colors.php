<?php

if (! function_exists('color_variant')) {
    function color_variant($variant)
    {
        $class = '';

        switch ($variant) {
            case 'info':
            case 'blue':
            case 'primary':
                $class = 'bg-primary-1000 text-primary-50 border-primary-600';

                break;
            case 'success':
            case 'green':
                $class = 'bg-green-50 text-green-600 border-green-600';

                break;
            case 'warning':
            case 'yellow':
                $class = 'bg-yellow-50 text-yellow-600 border-yellow-600';

                break;
            case 'high':
            case 'orange':
                $class = 'bg-orange-50 text-orange-600 border-orange-600';

                break;
            case 'danger':
            case 'red':
                $class = 'bg-red-50 text-red-600 border-red-600';

                break;
            case 'indigo':
                $class = 'bg-indigo-50 text-indigo-600 border-indigo-600';

                break;
            case 'purple':
                $class = 'bg-purple-50 text-purple-600 border-purple-600';

                break;
            case 'pink':
                $class = 'bg-pink-50 text-pink-600 border-pink-600';

                break;
            default:
                $class = 'bg-gray-50 text-gray-600 border-gray-600';

                break;
        }

        return $class;
    }
}
