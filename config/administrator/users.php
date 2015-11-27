<?php

return [
    'title' => 'Administrators',
    'single' => 'administrator',
    'model' => 'App\User',
    'columns' => [
        'id',
        'email',
        'firstname',
        'lastname'
    ],
    'edit_fields' => [
        'email' => [
            'type' => 'text',
            'title' => 'Email',
            'limit' => 50,
        ],
        'firstname' => [
            'type' => 'text',
            'title' => 'Name',
            'limit' => 25,
        ],
        'lastname' => [
            'type' => 'text',
            'title' => 'Last name',
            'limit' => 25,
        ],
        'password' => [
            'type' => 'password',
            'title' => 'Password',
            'limit' => 25,
        ],
        'birth' => [
            'type' => 'date',
            'title' => 'Birth date',
            'date_format' => 'yyyy-mm-dd',
        ],
    ],
];