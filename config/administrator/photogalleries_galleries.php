<?php

return [
    'title' => 'Изображения фотогаллерей',
    'single' => 'изображение',
    'model' => 'App\PhotogalleriesGallery',
    'columns' => [
        'id' => [
            'title' => 'Идентификатор',
            'select' => '(:table).id',
        ],
        'collection_title' => [
            'title' => 'Название коллекции',
            'relationship' => 'photogallery',
            'select' => '(:table).title',
        ],
        'weight' => [
            'title' => 'Очередность',
            'select' => '(:table).weight',
        ],
        'img' => [
            'title' => 'Изображение',
            'output' => '<img src="/uploads/photogalleries/thumbs/small/(:value)">'
        ]
    ],
    'edit_fields' => [
        'photogallery' => [
            'type' => 'relationship',
            'title' => 'Фотогаллерея',
            'name_field' => 'title'
        ],
        'weight' => [
            'type' => 'number',
            'title' => 'Очередность',
        ],
        'img' => [
            'type' => 'image',
            'title' => 'Изображение',
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
            'title' => 'Альтернативный текст',
            'limit' => 255,
        ],
    ],
    'rules' => [
        'img' => 'required|unique:photogalleries_gallery,img',
        'alt' => 'max:255',
    ],
    'form_width' => 700,
];