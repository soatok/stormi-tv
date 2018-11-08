<?php
$defaults= [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],
    ],
];

if (\is_readable(__DIR__ . '/../local/settings.php')) {
    $settings = require __DIR__ . '/../local/settings.php';

    // Morally equivalent to array_merge()
    return $settings + $defaults;
}
return $defaults;
