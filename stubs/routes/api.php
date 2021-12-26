<?php

collect(glob(base_path('/routes/api/*.php')))
    ->each(function ($path) {
        require $path;
    });
