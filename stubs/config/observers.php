<?php


return [
    \CleaniqueCoders\LaravelObservers\Observers\ReferenceObserver::class => [],
    \CleaniqueCoders\LaravelObservers\Observers\HashidsObserver::class   => [],
    \CleaniqueCoders\LaravelObservers\Observers\UuidObserver::class   => [
        \App\Models\User::class,
    ],
];
