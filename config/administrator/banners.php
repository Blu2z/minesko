<?php

return [
    'title' => 'Banners',
    'single' => 'banner',
    'model' => 'App\Banner',
    'columns' => [
        'id',
        'title',
        'weight',
        'url',
        'img' => [
            'output' => '<img src="/uploads/banners/thumbs/small/(:value)">'
        ]
    ],
    'edit_fields' => [
        'title' => [
            'type' => 'text',
            'title' => 'Title',
            'limit' => 255,
        ],
        'weight' => [
            'type' => 'number',
            'title' => 'Weight',
        ],
        'url' => [
            'type' => 'text',
            'title' => 'URL',
            'limit' => 255,
        ],
        'img' => [
            'type' => 'image',
            'title' => 'Image',
            'location' => public_path() . '/uploads/banners/originals/',
            'naming' => 'random',
            'length' => 64,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/banners/thumbs/small/', 100),
                array(220, 138, 'landscape', public_path() . '/uploads/banners/thumbs/medium/', 100),
                array(383, 276, 'fit', public_path() . '/uploads/banners/thumbs/full/', 100)
            )
        ],
    ],
    'rules' => [
        'title' => 'required|max:255|unique:banners,title',
        'weight' => 'required|integer|unique:banners,weight',
        'url' => 'required|max:255|regex:([a-z0-9])|unique:banners,url',
        'img' => 'required|unique:banners,img',
    ],
    'form_width' => 400,
];