<?php

return
[
    'login_form' => [
        'fields' => [
            'login', 'password'
        ],
        'rules' => [
            'not_empty' => [
                'login', 'password'
            ],
            'min_leight' => [
                'login' => [5],
                'password' =>[8]
            ],
            'max_leight' => [
                'login' => [20],
                'password' => [20]
            ],

        ]
    ],
    'signup_form' => [
        'fields' => [
            'login', 'password', 'email'
        ],
        'rules' => [
            'not_empty' => [
                'login', 'password', 'email'
            ],
            'min_leight' => [
                'login' => [5],
                'password' =>[8],
                'email' => [5]
            ],
            'max_leight' => [
                'login' => [20],
                'password' => [20],
                'email' => [35]
            ],
        ]
    ]
];