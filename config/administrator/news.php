<?php

return [
    'title' => 'News',
    'single' => 'news',
    'model' => 'App\News',
    'columns' => [
        'id',
        'title',
        'description',
        'img' => [
            'output' => '<img src="/uploads/news/thumbs/small/(:value)">'
        ]
    ],
    'edit_fields' => [
        'title' => [
            'type' => 'text',
            'title' => 'Title',
            'limit' => 255,
        ],
        'alias' => [
            'type' => 'text',
            'title' => 'URL',
            'limit' => 255,
        ],
        'keywords' => [
            'type' => 'text',
            'title' => 'keywords',
            'limit' => 100,
        ],
        'description' => [
            'type' => 'text',
            'title' => 'description',
            'limit' => 150,
        ],
        'text' => [
            'type' => 'wysiwyg',
            'title' => 'Text',
        ],
        'img' => [
            'type' => 'image',
            'title' => 'Image',
            'location' => public_path() . '/uploads/news/originals/',
            'naming' => 'random',
            'length' => 64,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/news/thumbs/small/', 100),
                array(220, 138, 'landscape', public_path() . '/uploads/news/thumbs/medium/', 100),
                array(383, 276, 'fit', public_path() . '/uploads/news/thumbs/full/', 100)
            )
        ],
        'alt' => [
            'type' => 'text',
            'title' => 'About',
            'limit' => 255,
        ],
    ],
    'rules' => [
        'alias' => 'required|regex:([a-z0-9\-])|unique:news,alias',
        'title'  => 'required|max:255|unique:news,title',
        'keywords' => 'max:100',
        'description' => 'max:150',
        'text' => 'required',
        'img' => 'unique:news,img',
        'alt' => 'max:255',
    ],
    'form_width' => 800,
];