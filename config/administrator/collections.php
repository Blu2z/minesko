<?php

return [
    'title' => 'Collections',
    'single' => 'collection',
    'model' => 'App\Collection',
    'columns' => [
        'id',
        'active',
        'title',
        'img' => [
            'output' => '<img src="/uploads/collections/thumbs/small/(:value)">'
        ]
    ],
    'edit_fields' => [
        'active' => [
            'type' => 'bool',
            'title' => 'Active',
        ],
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
        'img' => [
            'type' => 'image',
            'title' => 'Preview image',
            'location' => public_path() . '/uploads/collections/originals/',
            'naming' => 'random',
            'length' => 64,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/collections/thumbs/small/', 100),
                array(220, 138, 'landscape', public_path() . '/uploads/collections/thumbs/medium/', 100),
                array(383, 276, 'fit', public_path() . '/uploads/collections/thumbs/full/', 100)
            )
        ],
        'alt' => [
            'type' => 'text',
            'title' => 'About',
            'limit' => 255,
        ],
    ],
    'rules' => [
        'active' => 'boolean',
        'alias' => 'required|max:255|regex:([a-z0-9\-])|unique:collections,alias',
        'title'  => 'required|max:255|unique:collections,title',
        'keywords' => 'max:100',
        'description' => 'max:150',
        'img' => 'unique:collections,img',
        'alt' => 'max:255',
    ],
    'form_width' => 700,
];