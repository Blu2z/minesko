<?php

return [
    'title' => 'Services',
    'single' => 'service',
    'model' => 'App\Service',
    'columns' => [
        'id',
        'title',
        'keywords',
        'description',
        'img' => [
            'output' => '<img src="/uploads/services/thumbs/small/(:value)">'
        ],
        'text'
    ],
    'edit_fields' => [
        'title' => [
            'type' => 'text',
            'title' => 'Title',
            'limit' => 255,
        ],
        'alias' => [
            'type' => 'text',
            'title' => 'URL',
            'limit' => 255,
        ],
        'keywords' => [
            'type' => 'text',
            'title' => 'keywords',
            'limit' => 100,
        ],
        'description' => [
            'type' => 'text',
            'title' => 'description',
            'limit' => 150,
        ],
        'text' => [
            'type' => 'wysiwyg',
            'title' => 'Text',
        ],
        'img' => [
            'type' => 'image',
            'title' => 'Image',
            'location' => public_path() . '/uploads/services/originals/',
            'naming' => 'random',
            'length' => 64,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/services/thumbs/small/', 100),
                array(220, 138, 'landscape', public_path() . '/uploads/services/thumbs/medium/', 100),
                array(383, 276, 'fit', public_path() . '/uploads/services/thumbs/full/', 100)
            )
        ],
        'alt' => [
            'type' => 'text',
            'title' => 'About',
            'limit' => 255,
        ],
    ],
    'form_width' => 800,
];