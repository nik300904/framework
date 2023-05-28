<?php

return [
    '~^$~' => [src\Controllers\MainController::class, 'main'],
    '~^articles/(\d+)$~' => [src\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [src\Controllers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [src\Controllers\ArticlesController::class, 'add'],
    '~articles/delete/(\d+)~' => [src\Controllers\ArticlesController::class, 'delete'],
    '~articles/(\d+)comments~' => [src\Controllers\CommentsController::class, 'view'],
    '~articles/(\d+)/comments$~' => [src\Controllers\CommentsController::class, 'add'],
    '~articles/(\d+)/comments/edit$~' => [src\Controllers\CommentsController::class, 'edit'],
];
