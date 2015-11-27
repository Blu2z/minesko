<?php

return [
    'title' => 'Photogalleries',
    'single' => 'photogallery',
    'model' => 'App\Photogallery',
    'columns' => [
        'id',
        'active',
        'title',
        'img' => [
            'output' => '<img src="/uploads/photogalleries/thumbs/small/(:value)">'
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
            'title' => 'Alias',
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
            'location' => public_path() . '/uploads/photogalleries/originals/',
            'naming' => 'random',
            'length' => 64,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/photogalleries/thumbs/small/', 100),
                array(220, 138, 'landscape', public_path() . '/uploads/photogalleries/thumbs/medium/', 100),
                array(383, 276, 'fit', public_path() . '/uploads/photogalleries/thumbs/full/', 100)
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
        'alias' => 'required|max:255|regex:([a-z0-9\-])|unique:photogalleries,alias',
        'title'  => 'required|max:255|unique:photogalleries,title',
        'keywords' => 'max:100',
        'description' => 'max:150',
        'img' => 'unique:photogalleries,img',
        'alt' => 'max:255',
    ],
    'form_width' => 700,
];