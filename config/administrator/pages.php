<?php

return [
    'title' => 'Pages',
    'single' => 'page',
    'model' => 'App\Page',
    'columns' => [
        'id',
        'title'
    ],
    'edit_fields' => [
        'title' => [
            'type' => 'text',
            'title' => 'Title',
            'limit' => 100,
        ],
        'text' => [
            'type' => 'wysiwyg',
            'title' => 'Text',
        ]
    ],
    'form_width' => 1000,
];