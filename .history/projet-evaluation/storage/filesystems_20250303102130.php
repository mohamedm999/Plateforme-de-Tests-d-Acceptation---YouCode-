<?php

return [
    'disks' => [
        'private' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'visibility' => 'private',
        ],
    ],
];
