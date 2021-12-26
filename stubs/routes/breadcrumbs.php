<?php

collect(glob(base_path('/routes/breadcrumbs/*.php')))
    ->each(function ($path) {
        require $path;
    });
