<?php

return [
    'title' => 'Services',
    'single' => 'service',
    'model' => 'App\Service',
    'columns' => [
        'id',
        'title',
        'keywords',
        'description',
        'text',
        'img' => [
            'output' => '<img src="/uploads/services/thumbs/small/(:value)">'
        ]
    ],
    'edit_fields' => [
        'on_top' => [
            'type' => 'bool',
            'title' => 'Выводить на главную'
        ],
        'title' => [
            'type' => 'text',
            'title' => 'Название',
            'limit' => 255,
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
        'text' => [
            'type' => 'wysiwyg',
            'title' => 'Текст',
        ],
        'img' => [
            'type' => 'image',
            'title' => 'Изображение',
            'location' => public_path() . '/uploads/services/originals/',
            'naming' => 'random',
            'length' => 64,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/services/thumbs/small/', 100)
            )
        ],
        'alt' => [
            'type' => 'text',
            'title' => 'Альтернативное описание для изображения',
            'limit' => 255,
        ],
    ],
    'form_width' => 800,
];