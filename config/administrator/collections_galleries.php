<?php

return [
    'title' => 'Изображения коллекций',
    'single' => 'изображение',
    'model' => 'App\CollectionsGallery',
    'columns' => [
        'id' => [
            'title' => 'Идентификатор',
            'select' => '(:table).id',
        ],
        'collection_title' => [
            'title' => 'Название коллекции',
            'relationship' => 'collection',
            'select' => '(:table).title',
        ],
        'weight' => [
            'title' => 'Очередность',
            'select' => '(:table).weight',
        ],
        'img' => [
            'title' => 'Изображение',
            'output' => '<img src="/uploads/collections/thumbs/small/(:value)">'
        ]
    ],
    'edit_fields' => [
        'collection' => [
            'type' => 'relationship',
            'title' => 'Коллекция',
            'name_field' => 'title'
        ],
        'weight' => [
            'type' => 'number',
            'title' => 'Очередность',
        ],
        'img' => [
            'type' => 'image',
            'title' => 'Изображение',
            'location' => public_path() . '/uploads/collections/originals/',
            'naming' => 'random',
            'length' => 64,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/collections/thumbs/small/', 100),
                array(220, 138, 'landscape', public_path() . '/uploads/collections/thumbs/medium/', 100),
                array(600, 400, 'auto', public_path() . '/uploads/collections/thumbs/full/', 100)
            )
        ],
        'alt' => [
            'type' => 'text',
            'title' => 'Альтернативный текст',
            'limit' => 255,
        ],
    ],
    'rules' => [
        'img' => 'required|unique:collections_gallery,img',
        'alt' => 'max:255',
    ],
    'form_width' => 700,
];