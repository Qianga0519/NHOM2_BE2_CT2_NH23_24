<?php
return [
    [
        'name' => 'Dashboard',
        'icon' => 'fal fa-tachometer-alt',
        'route' => 'admin.dashboard'
    ],
    [
        'name' => 'Home',
        'icon' => 'fas fa-home',
        'route' => 'home'
    ],
    [
        'name' => 'Category manager',
        'route' => 'category.index',
        'icon' => 'fa-solid fa-layer-group',
        'items' => [
            [
                'name' => 'All Category',
                'route' => 'category.index',
            ],
            [
                'name' => 'Add Category',
                'route' => 'category.create'

            ]
        ]
    ],
    [
        'name' => 'Product manager',
        'route' => 'product.index',
        'icon' => 'fa-solid fa-layer-group',
        'items' => [
            [
                'name' => 'All Product',
                'route' => 'product.index',
            ],
            [
                'name' => 'Add Product',
                'route' => 'product.create'

            ]
        ]
    ], [
        'name' => 'Manufacture',
        'route' => 'manufacture.index',
        'icon' => 'far fa-industry',
        'items' => [
            [
                'name' => 'All manufacture',
                'route' => 'manufacture.index',
            ],
            [
                'name' => 'Add manufacture',
                'route' => 'manufacture.create'

            ]
        ]
    ],
    [
        'name' => 'Post',
        'route' => 'post.index',
        'icon' => 'fas fa-file-alt',
        'items' => [
            [
                'name' => 'All post',
                'route' => 'post.index',
            ],
            [
                'name' => 'Add post',
                'route' => 'post.create'

            ]
        ]
    ],
    [
        'name' => 'User & Role',
        'route' => 'user.index',
        'icon' => 'far fa-users',
        'items' => [
            [
                'name' => 'Users',
                'route' => 'user.index',
            ],
            [
                'name' => 'Roles',
                'route' => 'role.index'

            ]
        ]
    ],
    [
        'name' => 'Contact',
        'route' => 'contact.index',
        'icon' => 'fas fa-envelope',

    ],
    [
        'name' => 'Order',
        'route' => 'order.index',
        'icon' => 'fas fa-boxes',

    ],
    [
        'name' => 'Reviews',
        'route' => 'review.index',
        'icon' => 'far fa-star',

    ],

];
