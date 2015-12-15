<?php

return [
    'title' => 'Banners',
    'single' => 'banner',
    'model' => 'App\Banner',
    'columns' => [
        'id',
        'title',
        'weight',
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
        'description' => [
            'type' => 'text',
            'title' => 'Text',
            'limit' => 255,
        ],
        'time' => [
            'type' => 'number',
            'title' => 'Time',
        ],
        'weight' => [
            'type' => 'number',
            'title' => 'Weight',
        ],
        'img' => [
            'type' => 'image',
            'title' => 'Image',
            'location' => public_path() . '/uploads/banners/originals/',
            'naming' => 'random',
            'length' => 64,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/banners/thumbs/small/', 100)
            )
        ],
    ],
    'rules' => [
        'title' => 'required|max:255|unique:banners,title',
        'description' => 'required|max:255',
        'time' => 'integer|max:9999',
        'weight' => 'required|integer|unique:banners,weight',
        'img' => 'required|unique:banners,img',
    ],
    'form_width' => 400,
];