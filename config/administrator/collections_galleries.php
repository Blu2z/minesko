<?php

return [
    'title' => 'Collections Gallery',
    'single' => 'image',
    'model' => 'App\CollectionsGallery',
    'columns' => [
        'id',
        'collection_title' => [
            'title' => 'Collection',
            'relationship' => 'collection',
            'select' => '(:table).title',
        ],
        'active',
        'weight',
        'img' => [
            'output' => '<img src="/uploads/collections/thumbs/small/(:value)">'
        ]
    ],
    'edit_fields' => [
        'collection' => [
            'type' => 'relationship',
            'title' => 'Collection',
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
        'collection' => 'required|exists:collections,id',
        'active' => 'required|boolean',
        'weight' => 'required|integer|unique:collections_gallery,weight',
        'img' => 'required|unique:collections_gallery,img',
        'alt' => 'max:255',
    ],
    'form_width' => 700,
];