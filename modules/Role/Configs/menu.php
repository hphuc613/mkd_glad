<?php
return [
    'name' => trans('Role'),
    'route' => route('get.role.list'),
    'sort' => 1,
    'active'=> TRUE,
    'id'=> 'role',
    'icon' => '<i class="mdi mdi-account-key"></i>',
    'middleware' => ['role'],
    'group' => []
];
