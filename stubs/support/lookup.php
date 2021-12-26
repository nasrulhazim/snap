<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

if (! function_exists('lookup')) {
    function lookup(string $key)
    {
        return Cache::remember('lookup-'.Str::kebab($key), 60, function () use ($key) {
            return \App\Models\Lookup::where('key', $key)
                ->orderBy('order')
                ->get();
        });
    }
}

if (! function_exists('lookupJson')) {
    function lookupJson(string $key, string $jsonKey, $value)
    {
        return Cache::remember('lookup-json-'.Str::kebab($key), 60, function () use ($key, $jsonKey) {
            return \App\Models\Lookup::where('key', $key)
                ->orderBy('order')
                ->whereJsonContains('value->'.$jsonKey, $value)
                ->get();
        });
    }
}
