<?php

return [
    'title' => 'Администраторы',
    'single' => 'administrator',
    'model' => 'App\User',
    'columns' => [
        'id' => ['title' => 'Идентификатор'],
        'email' => ['title' => 'Почта'],
        'firstname' => ['title' => 'Имя'],
        'lastname' => ['title' => 'Фамилия']
    ],
    'edit_fields' => [
        'email' => [
            'type' => 'text',
            'title' => 'Email',
            'limit' => 50,
        ],
        'firstname' => [
            'type' => 'text',
            'title' => 'Имя',
            'limit' => 25,
        ],
        'lastname' => [
            'type' => 'text',
            'title' => 'Фамилия',
            'limit' => 25,
        ],
        'password' => [
            'type' => 'password',
            'title' => 'Пароль',
            'limit' => 25,
        ],
        'birth' => [
            'type' => 'date',
            'title' => 'Дата рождения',
            'date_format' => 'yyyy-mm-dd',
        ],
    ],
];