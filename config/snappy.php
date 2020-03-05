<?php

return [



    'pdf' => [
        'enabled' => true,
        'binary'  => base_path('"vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64"'), //env('WKHTML_PDF_BINARY', '/usr/local/bin/wkhtmltopdf'),
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],

    'image' => [
        'enabled' => true,
        'binary'  => '"vendor/h4cc/wkhtmltoimage-amd64/wkhtmltoimage"', // env('WKHTML_IMG_BINARY', '/usr/local/bin/wkhtmltoimage'),
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],

];
