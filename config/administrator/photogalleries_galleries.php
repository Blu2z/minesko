<?php

return [
    'title' => 'Photogalleries Gallery',
    'single' => 'image',
    'model' => 'App\PhotogalleriesGallery',
    'columns' => [
        'id',
        'active',
        'weight',
        'img' => [
            'output' => '<img src="/uploads/photogalleries/thumbs/small/(:value)">'
        ]
    ],
    'edit_fields' => [
        'photogallery' => [
            'type' => 'relationship',
            'title' => 'Photogallery',
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
            'location' => public_path() . '/uploads/photogalleries/originals/',
            'naming' => 'random',
            'length' => 64,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/photogalleries/thumbs/small/', 100),
                array(220, 138, 'landscape', public_path() . '/uploads/photogalleries/thumbs/medium/', 100),
                array(600, 400, 'auto', public_path() . '/uploads/photogalleries/thumbs/full/', 100)
            )
        ],
        'alt' => [
            'type' => 'text',
            'title' => 'About',
            'limit' => 255,
        ],
    ],
    'rules' => [
//        'photogallery' => 'required|exists:photogalleries,id',
        'active' => 'required|boolean',
//        'weight' => 'required|integer|unique:photogalleries_gallery,weight',
        'img' => 'required|unique:collections_gallery,img',
        'alt' => 'max:255',
    ],
    'form_width' => 700,
];