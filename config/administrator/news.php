<?php

return [
    'title' => 'News',
    'single' => 'news',
    'model' => 'App\News',
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
            'output' => '<img src="/uploads/news/thumbs/small/(:value)">'
        ]
    ],
    'edit_fields' => [
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
            'title' => 'Главное изображение',
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
            'title' => 'Альтернативный текст',
            'limit' => 255,
        ],
    ],
    'rules' => [
        'title'  => 'required|max:255|unique:news,title',
        'keywords' => 'max:100',
        'description' => 'max:150',
        'text' => 'required',
        'img' => 'unique:news,img',
        'alt' => 'max:255',
    ],
    'form_width' => 800,
];