<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$config['acl'] = [
    // Global Actions
    [
        'auth/login' => 'Confirm',
        'auth/register' => 'Register',
        'auth/logout' => 'Logout',
        'stories/index'   => 'Stream',
    ],
    // Administrator Specific Actions
    [
        'sample/url'   => 'Dashboard'
    ],
    // Regular User Actions
    [
        'users/dashboard'   => 'Dashboard',
        'stories/index'     => 'Stream',
        'stories/create'    => 'Create Story',
        'stories/delete'    => 'Delete Story',
        'stories/vote'      => 'Vote Story',
        'stories/view'      => 'View Story'
    ]
];