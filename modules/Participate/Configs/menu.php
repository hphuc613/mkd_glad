<?php
return [
    'name' => trans('Participate Store'),
    'route' => route('get.participate.list'),
    'sort' => 2,
    'active'=> TRUE,
    'id'=> 'participate',
    'icon' => '<i class="fas fa-handshake" style="display: inline-flex; align-items: center"></i>',
    'middleware' => ['participate'],
    'group' => []
];
