<?php

return [
    'app' => [
        'title' => 'General',
        'desc' => 'All the general settings for application.',
        'icon' => 'menu-icon tf-icons bx bx-cog',

        'elements' => [
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'app_name', // unique name for field
                'label' => 'Name', // you know what label it is
                'rules' => 'required|min:2|max:50', // validation rule of laravel
                'class' => '', // any class for input
                'value' => config('app.name') // default value if you want
            ],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'app_name_en', // unique name for field
                'label' => 'English Name', // you know what label it is
                'rules' => 'required|min:2|max:50', // validation rule of laravel
                'class' => '', // any class for input
                'value' => config('app.name') // default value if you want
            ],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'app_description', // unique name for field
                'label' => 'Description', // you know what label it is
                'rules' => 'nullable|min:2|max:50', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '' // default value if you want
            ],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'app_description_en', // unique name for field
                'label' => 'English Description', // you know what label it is
                'rules' => 'nullable|min:2|max:50', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '' // default value if you want
            ],
        ]
    ],

    'media' => [

        'title' => 'Socail Media',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'facebook',
                'label' => 'Facebook',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'twitter',
                'label' => 'Twitter',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'instagram',
                'label' => 'Instagram',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'whatsapp',
                'label' => 'Whatsapp',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'linkedin',
                'label' => 'linkedin',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'telegram',
                'label' => 'telegram',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'tiktok',
                'label' => 'tiktok',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'snapchat',
                'label' => 'snapchat',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
        ]
    ],

    'contact' => [

        'title' => 'Contact Account',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'email',
                'label' => 'Email',
                'rules' => 'nullable|string|email',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'phone',
                'label' => 'Phone Number',
                'rules' => 'nullable|integer',
                'class' => '',
                'value' => ''

            ]
        ]
    ],

    'logo' => [

        'title' => 'Logo',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'file',
                'data' => 'file',
                'name' => 'logo',
                'label' => 'Logo',
                'rules' => 'nullable|image',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'file',
                'data' => 'file',
                'name' => 'icon',
                'label' => 'Icon',
                'rules' => 'nullable|image',
                'class' => '',
                'value' => ''

            ]
        ]
    ],

    'footer' => [

        'title' => 'Footer',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'footer',
                'label' => 'Footer',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'footer_en',
                'label' => 'English Footer',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ]
        ]
    ],
];
