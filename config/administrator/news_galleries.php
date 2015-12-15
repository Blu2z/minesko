<?php

return [
    'title' => 'News Gallery',
    'single' => 'news photo',
    'model' => 'App\NewsGallery',
    'columns' => [
        'id',
        'active',
        'weight',
        'img' => [
            'output' => '<img src="/uploads/news/thumbs/small/(:value)">'
        ]
    ],
    'edit_fields' => [
        'news' => [
            'type' => 'relationship',
            'title' => 'News',
            'name_field' => 'title'
        ],
        'active' => [
            'type' => 'bool',
            'title' => 'Active'
        ],
        'weight' => [
            'type' => 'number',
            'title' => 'Foremost',
        ],
        'img' => [
            'type' => 'image',
            'title' => 'Image',
            'location' => public_path() . '/uploads/news/originals/',
            'naming' => 'random',
            'length' => 64,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/news/thumbs/small/', 100),
                array(220, 138, 'landscape', public_path() . '/uploads/news/thumbs/medium/', 100),
                array(400, 600, 'auto', public_path() . '/uploads/news/thumbs/full/', 100)
            )
        ],
        'alt' => [
            'type' => 'text',
            'title' => 'About',
            'limit' => 255,
        ],
    ],
    'rules' => [
        'active' => 'required|boolean',
        'img' => 'required|unique:news_gallery,img',
        'alt' => 'max:255',
    ],
    'form_width' => 800,
];