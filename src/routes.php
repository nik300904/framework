<?php

return [
    '~^$~' => [src\Controllers\MainController::class, 'main'],
    '~^articles/(\d+)$~' => [src\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [src\Controllers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [src\Controllers\ArticlesController::class, 'add'],
    '~articles/delete/(\d+)~' => [src\Controllers\ArticlesController::class, 'delete'],
];
