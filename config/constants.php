<?php
return [
    'status' => [
        'active' => 1,
        'in_active' => 0,
        'cancel' => 2,
    ],
    'tour_types' => [
        'all' => 'Tất cả',
        'adventure' => 'Mạo hiểm',
        'combining' => 'Phối hợp',
        'sporting' => 'Thể thao',
        'domestic' => 'Nội địa'
    ],
    'blog_types' => [
        '1' => 'Tips',
        '2' => 'Blog',
        '3' => 'Slider',
    ],
    'app_settings' => [
        [
            'key' => 'app_name',
            'field' => 'Tên website',
            'desc' => 'Tên cho website',
            'value' => '',
            'type' => 'text'
        ],
        [
            'key' => 'logo',
            'field' => 'Logo',
            'desc' => 'Logo dành cho website',
            'value' => '',
            'type' => 'file'
        ],
        [
            'key' => 'phone',
            'field' => 'Số điện thoại',
            'desc' => 'Số điện thoại để liên hệ',
            'value' => '',
            'type' => 'text'
        ],
        [
            'key' => 'email',
            'field' => 'Email',
            'desc' => 'Địa chỉ email liên hệ',
            'value' => '',
            'type' => 'text'
        ],
        [
            'key' => 'address',
            'field' => 'Địa chỉ',
            'desc' => 'Địa chỉ văn phòng hoặc nơi làm việc',
            'value' => '',
            'type' => 'text'
        ]
    ]
];
