<?php

return [
    'title' => 'Collections',
    'single' => 'collection',
    'model' => 'App\Collection',
    'columns' => [
        'id' => [
            'title' => 'Идентификатор',
            'select' => '(:table).id',
        ],
        'title' => [
            'title' => 'Название',
            'select' => '(:table).title',
        ],
        'img' => [
            'title' => 'Главное изображение',
            'output' => '<img src="/uploads/collections/thumbs/small/(:value)">'
        ]
    ],
    'edit_fields' => [
        'title' => [
            'type' => 'text',
            'title' => 'Название',
            'limit' => 255,
        ],
        'text' => [
            'type' => 'wysiwyg',
            'title' => 'Текст',
        ],
        'keywords' => [
            'type' => 'text',
            'title' => 'Ключевые слова',
            'limit' => 100,
        ],
        'description' => [
            'type' => 'text',
            'title' => 'Короткое описание',
            'limit' => 150,
        ],
        'img' => [
            'type' => 'image',
            'title' => 'Главное изображение',
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
        'title'  => 'required|max:255|unique:collections,title',
        'keywords' => 'max:100',
        'description' => 'max:150',
        'img' => 'unique:collections,img',
        'alt' => 'max:255',
    ],
    'form_width' => 700,
];