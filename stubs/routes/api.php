<?php

collect(glob(base_path('/routes/web/*.php')))
    ->each(function ($path) {
        require $path;
    });
