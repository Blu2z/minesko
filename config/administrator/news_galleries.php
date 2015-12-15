<?php

return [
    'title' => 'Галерея новостей',
    'single' => 'news photo',
    'model' => 'App\NewsGallery',
    'columns' => [
        'id' => [
            'title' => 'Идентификатор',
            'select' => '(:table).id',
        ],
        'collection_title' => [
            'title' => 'Название новости',
            'relationship' => 'news',
            'select' => '(:table).title',
        ],
        'weight' => [
            'title' => 'Очередность',
            'select' => '(:table).weight',
        ],
        'img' => [
            'title' => 'Изображение',
            'output' => '<img src="/uploads/news/thumbs/small/(:value)">'
        ]
    ],
    'edit_fields' => [
        'news' => [
            'type' => 'relationship',
            'title' => 'Новость',
            'name_field' => 'title'
        ],
        'weight' => [
            'type' => 'number',
            'title' => 'Очередность',
        ],
        'img' => [
            'type' => 'image',
            'title' => 'Изображение',
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
        'img' => 'required|unique:news_gallery,img',
        'alt' => 'max:255',
    ],
    'form_width' => 800,
];