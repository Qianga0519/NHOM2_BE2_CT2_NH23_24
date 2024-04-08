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
    ],



];
