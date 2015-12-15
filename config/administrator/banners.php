<?php

return [
    'title' => 'Баннеры',
    'single' => 'banner',
    'model' => 'App\Banner',
    'columns' => [
        'id' => ['title' => 'Идентификатор'],
        'title'  => ['title' => 'Название'],
        'weight' => ['title' => 'Позиция'],
        'img' => [
            'output' => '<img src="/uploads/banners/thumbs/small/(:value)">',
            'title' => 'Изображение'
        ]
    ],
    'edit_fields' => [
        'title' => [
            'type' => 'text',
            'title' => 'Название',
            'limit' => 255,
        ],
        'description' => [
            'type' => 'text',
            'title' => 'Текст',
            'limit' => 255,
        ],
        'time' => [
            'type' => 'number',
            'title' => 'Время появления, мс',
        ],
        'weight' => [
            'type' => 'number',
            'title' => 'Позиция',
        ],
        'img' => [
            'type' => 'image',
            'title' => 'Изображение',
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